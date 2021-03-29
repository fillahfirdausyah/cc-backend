<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Models\Bengkel;
use App\Models\Merchandise;
use App\Models\Region;
use App\Models\MessageShowroom;
use App\Models\SR;
use App\Models\Comments_SR;
use App\Models\Tenant;
use App\Models\Transaksi;

class TenantController extends Controller
{
    public function index()
    {
        // User tenant
        $tenant = Tenant::where('user_id', Auth::id())->where('verified', 'yes')->first();

        // asset
        $SR = SR::where('user_id', Auth::id())->get();      
        $merchan = Merchandise::whereHas('user', function(Builder $q){
                        $q->where('user_id', Auth::id());
                    })->get();
        $bengkel = Bengkel::whereHas('user', function(Builder $q){
                        $q->where('user_id', Auth::id());
                    })->get();

        $transaksi = Transaksi::whereHas('seller', function(Builder $q){
                        $q->where('seller_id', Auth::id());
                    })->with(['buyer', 'item'])->paginate(10);

        return view('showroom2.tenant.tenant', compact('tenant', 'SR', 'merchan', 'bengkel', 'transaksi'));
    }

    public function car()
    {
        $convSR = [];
        $collectCar = []; 

        $SR = SR::where('user_id', Auth::id())->get();
        if($SR != NULL){
            foreach ($SR as $sr) {
                 $convSR[] = json_decode($sr->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectCar[] = $convSR[$i][0];
            }
        }

        return view('showroom2.tenant.tenant-cars', compact('SR', 'collectCar'));
    }

    public function merchandise()
    {
        $convM = [];
        $collectM = [];

        $merchan = Merchandise::whereHas('user', function(Builder $q){
                        $q->where('user_id', Auth::id());
                    })->get();
        if($merchan != NULL){
            foreach ($merchan as $m) {
                 $convM[] = json_decode($m->gambar);
            }

            $count = count($convM);
            for ($i=0; $i < $count; $i++) { 
                $collectM[] = $convM[$i][0];
            }
        }

        return view('showroom2.tenant.tenant-merchandise', compact('merchan', 'collectM'));
    }

    public function autoshop()
    {
        $convB = [];
        $collectB = [];

        $bengkel = Bengkel::whereHas('user', function(Builder $q){
                        $q->where('user_id', Auth::id());
                    })->get();
        if($bengkel != NULL){
            foreach ($bengkel as $b) {
                $convB[] = json_decode($b->gambar);
            }

            $count = count($convB);
            for ($i=0; $i < $count; $i++) { 
                $collectB[] = $convB[$i][0];
            }
        }
        return view('showroom2.tenant.tenant-autoshop', compact('bengkel', 'collectB'));
    }

    public function create()
    {
        $tenant = Tenant::where('user_id', Auth::id())->first();
        if ($tenant != NULL && $tenant->verified == 'yes') {
            return redirect('/tenant');
        }else if($tenant != NULL && $tenant->verified == NULL){
            return view('showroom2.tenant.tenant-register', compact('tenant'))->with('status', 'silahkan tunggu verifikasi dari Admin terlebih dahulu'); 
        }else{
            $user = Auth::user();
        
            return view('showroom2.tenant.tenant-register', compact('user', 'tenant'));
        }
        
    }

    public function store(Request $request)
    {
        $tenant = Tenant::where('user_id', $request->user_id)->first();
        if ($tenant == NULL) {
            $input_data = $request->all();

            $validator = Validator::make($input_data, [
                'nama' => 'required',
                'telepon' => 'required | numeric | digits_between: 10,13',
                'email' => 'required | email',
                'rekening' => 'required | numeric',
                'bank' => 'required',
                'pemilik' => 'required',
                'user_id' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('/tenant/register')
                            ->withErrors($validator)
                            ->withInput();
            }

            $t = new Tenant();
            $t->tenant_id = "MIG-".$request->user_id;
            $t->nama = $request->nama;
            $t->user_id = $request->user_id;
            $t->email = $request->email;
            $t->telepon = $request->telepon;
            $t->rekening = $request->rekening;
            $t->pemilik_rekening = $request->pemilik;
            $t->bank = strtoupper($request->bank); 
            $t->save();

            return redirect()->back()->with('status', 'silahkan tunggu verifikasi dari Admin terlebih dahulu');
        } else {
            return redirect()->back()->withErrors('Anda Sudah terdaftar sebagai tenant/Anda Belum diverifikasi oleh Admin');
        }
    }

    public function show(Tenant $tenant)
    {
        //
    }

    public function edit($id)
    {
        $tenant = Tenant::find($id);
        $user = Auth::user();

        return view('showroom2.tenant.edit-tenant', compact('tenant', 'user'));
    }
    public function update(Request $request)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
            'nama' => 'required',
            'telepon' => 'required | numeric | digits_between: 10,13',
            'email' => 'required | email',
            'rekening' => 'required | numeric',
            'bank' => 'required',
            'pemilik' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/tenant/register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $t = Tenant::find($request->id);
        $t->nama = $request->nama;
        $t->user_id = $request->user_id;
        $t->email = $request->email;
        $t->telepon = $request->telepon;
        $t->rekening = $request->rekening;
        $t->pemilik_rekening = $request->pemilik;
        $t->bank = strtoupper($request->bank); 
        $t->save();

        return redirect()->back()->with('status', 'Edit Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}

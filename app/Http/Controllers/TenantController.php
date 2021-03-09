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
use App\Models\SR;
use App\Models\Comments_SR;
use App\Models\Tenant;

class TenantController extends Controller
{
    public function index()
    {
        $tenant = Tenant::where('user_id', Auth::id())->where('verified', 'yes')->first();
        $convSR = [];
        $collectSR = [];        
        $convB = [];
        $collectB = [];
        $convM = [];
        $collectM = [];



        $SR = SR::where('user_id', Auth::id())->get();
        if($SR != NULL){
            foreach ($SR as $sr) {
                 $convSR[] = json_decode($sr->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectSR[] = $convSR[$i][0];
            }
        }

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


        return view('showroom2.tenant', compact('tenant', 'SR', 'collectSR', 'bengkel', 'collectB', 'merchan', 'collectM'));
    }

    public function create()
    {
        $tenant = Tenant::where('user_id', Auth::id())->first();
        if ($tenant != NULL && $tenant->verified == 'yes') {
            return redirect('/tenant');
        }else if($tenant != NULL && $tenant->verified == NULL){
            return view('showroom2.tenant-register', compact('tenant'))->with('status', 'silahkan tunggu verifikasi dari Admin terlebih dahulu'); 
        }else{
            $user = Auth::user();
        
            return view('showroom2.tenant-register', compact('user', 'tenant'));
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
                'user_id' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('/tenant/register')
                            ->withErrors($validator)
                            ->withInput();
            }

            $t = new Tenant();
            $t->nama = $request->nama;
            $t->user_id = $request->user_id;
            $t->email = $request->email;
            $t->telepon = $request->telepon;
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

        return view('showroom2.edit-tenant', compact('tenant', 'user'));
    }
    public function update(Request $request)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
            'nama' => 'required',
            'telepon' => 'required | numeric | digits_between: 10,13',
            'email' => 'required | email',
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
        $t->save();

        return redirect()->back()->with('status', 'Edit Berhasil!');
    }

    public function list() {
        $data = Tenant::with('user')->get();

        return view('admin.tenant.Tenant', compact('data'));
    }

    public function verify($id) {
        $data = Tenant::find($id);

        $data->verified = 'yes';
        $data->save();

        return redirect()->back()->with('success', 'User Tenant Terverifikasi');
    }

    public function destroy(Tenant $tenant)
    {
        //
    }
}

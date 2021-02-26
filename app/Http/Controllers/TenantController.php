<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Bengkel;
use App\Models\Region;
use App\Models\SR;
use App\Models\Comments_SR;
use App\Models\Tenant;

class TenantController extends Controller
{
    public function index()
    {
        $tenant = Tenant::where('user_id', Auth::id())->where('verifaction', true)->get();
        $SR = SR::where('user_id', Auth::id())->get();
        $bengkel = Bengkel::where('user_id', Auth::id())->get();

        return view('showroom2.tenant');
    }

    public function create()
    {
        $user = Auth::user();

        return view('showroom2.tenant-register', compact('user'));
    }

    public function store(Request $request)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
            'nama' => 'required | min: 8',
            'telepon' => 'required | numeric | digits_between: 10,13',
            'email' => 'required | email',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/showroom/upload')
                        ->withErrors($validator)
                        ->withInput();
        }

        $t = new Tenant();
        $t->nama = $request->nama;
        $t->user_id = $request->user_id;
        $t->email = $request->email;
        $t->telepon = $request->telepon;
        $t->save();

        return redirect('/showroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
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

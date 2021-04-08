<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use App\Models\Tenant;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('tenant')->get();
        $userVerified = User::where('verified', NULL);

        return view('admin.user.User', compact('data', 'userVerified'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.CreateUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required | email',
            'password'  => 'required | min:8',
        ]);

        $user = New User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->role     = $request->role;
        $user->save();

        return redirect('/admin/user/list')->with('success', 'Data Berhasil Ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = User::find($id);

       return view(admin.Profile)->middleware('cekrole');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);

        return view('admin.user.EditUser', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required | email',
        ]);

        $user = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role     = $request->role;
        $user->save();

        return redirect('/admin/user/list')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/user/list')->with('info', 'Data Berhasil Dihapus');
    }

    public function showData($id) {

        $user = User::find($id);

        if($user->profile == null) {
            return 0;
        }

        $data = $user->load('profile', 'keuangan', 'region');

        return response()->json($data);
    }

    public function verify($id)
    {
        $user = User::find($id);
        $user->verified = 'yes';
        $user->save();

        return redirect('/admin/user/list')->with('success', 'User Terverifikasi');
    }
}

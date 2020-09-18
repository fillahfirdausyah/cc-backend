<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;

class UserControllers extends Controller
{    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $users = Member::all()->except('password');

        return view('auth/admin_manage/User/user', ['users' => $users]);
    }

    public function edit($id)
    {
        $users = Member::find($id);

        return view('/auth/admin_manage/User/changeuser',['users' => $users]); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique|max:255',
            'aset' => 'required|image|mimes:jpg,png,jpeg|max:5120',
            'role' => 'required|string',  
        ]);

        $files = $request->file('aset');
        $destinationPath = '/public/image';
        $image_name = 'image_U'. rand(0000,9999).".".$files->getClientOriginalExtension();
        $files->move($destinationPath, $image_name);

        $user = Member::find($id);
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->aset = $image_name;
        $user->save();

        return redirect('/admin/user');       
    }

    public function destroy($id)
    {
        $user = Member::find($id);
        $user->delete();
        return redirect('/admin/user');
    }
}

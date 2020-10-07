<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Models\User;

class MemberController extends Controller
{
    

    public function index() {
        $user    = Auth::user();
        $post    = $user->post()->get();

        return view('member.Home', compact('user', 'post'));
    }

    public function about() {
        $user = Auth::user();

        return view('member.About', compact('user'));
    }

    public function galery() {
        $user = Auth::user();

        return view('member.Galery', compact('user'));
    }

    public function friend() {
        $user = Auth::user();
        $friends = User::where('id', '!=', $user->id)->get();

        return view('member.Friend', compact('user', 'friends'));
    }

    public function profile() {
        $user = Auth::user();
        return view('member.Profile', compact('user'));
    }
}

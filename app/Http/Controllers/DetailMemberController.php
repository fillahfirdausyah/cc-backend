<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;
use App\Models\User;

class DetailMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detail($username) {
        $auth = Auth::user();
        $user = User::where('username', $username)->first();
        $post = $auth->post()->get();

        return view('member.Detail', compact('user', 'post', 'auth'));
    }
}

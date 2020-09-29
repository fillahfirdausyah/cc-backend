<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MemberController extends Controller
{
    

    public function index() {
        $user = Auth::user();
        return view('member.Home', compact('user'));
    }

    public function about() {
        $user = Auth::user();
        return view('member.About', compact('user'));
    }
}

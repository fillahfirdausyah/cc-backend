<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;
use App\Models\User;

class DetailMemberController extends Controller
{
    
    public function friendDetail($username) {
        
        $user    = Auth::user();
        $friends = User::where('username', $username)->get();
        $data    = User::find($friends[0]->id);
        $post    = $data->post()->get();
        $like    = $data->like();

        return view('member.Detail', compact('user', 'friends', 'post', 'like'));
    }

    public function friendProfileDetails($username) {
        $user = Auth::user();
        $friends = User::where('username', $username)->get();
        return view('member.FriendDetails', compact('user', 'friends'));
    }

    public function friendGallery($username) {
        $user = Auth::user();
        $friends = User::where('username', $username)->get();
        $gallery = User::find($friends[0]->id)->post()->get();
        return view('member.FriendGallery', compact('user', 'friends','gallery'));
    }
}

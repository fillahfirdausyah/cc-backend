<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Region;
use App\Models\User;
use App\Models\Post;
use App\Models\CommentPost;

class MemberController extends Controller
{
    public function index() {
        
        $user = User::with('post')->get();
        $pp = User::with('profile')->get();

        // dd($pp);
        
        // foreach ($user as $p) {
        //    dd( $p->profile->foto_profile); 
        // }

        return view('member.Home', compact('user', 'pp'));
    }

    public function about() {
        $user = Auth::user();
        $userRegion = Auth::user()->region()->get();

        return view('member.About', compact('user', 'userRegion'));
    }

    public function galery() {
        $user = Auth::user();
        $userRegion = Auth::user()->region()->get();

        return view('member.Galery', compact('user', 'userRegion'));
    }

    public function friend($id) {
        $user = Auth::user();
        $region = Region::all();
        $userRegion = Auth::user()->region()->get();
        $friends = User::whereHas('region', function($q) use($id){
                        $q->where('region_id', $id);
                    })
                    ->where('id', '!=', $user->id)->get();
                    
        return view('member.Friend', compact('user', 'userRegion', 'friends', 'region'));
    }

    public function profile() {
        $user    = Auth::user();
        $userRegion = Auth::user()->region()->get();
        $region = Region::all();
        $post = Auth::user()->post()->with(['comments', 'comments.child', 'comments.user'])->get();
        $like    = $user->like();

        return view('member.Profile', compact('user', 'post', 'like', 'userRegion', 'region'));
    }
}

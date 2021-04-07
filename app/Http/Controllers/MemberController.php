<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Region;
use App\Models\Keuangan;
use App\Models\BuktiIuran;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use App\Models\News;
use App\Models\CommentPost;

class MemberController extends Controller
{

    // protected $user2;
    // protected $userRegion2;

    // public function __construct() {
    //    $this->middleware('verifyAdmin');
    // }

    public function verify() {
        
        $user = Auth::user()->profile;
        $region = Region::all();
        if($user == null) {
            return view('auth.verifyAdmin', compact('user', 'region'));
        }

        $alert = alert()->info('Data Diterima', 'Silahkan tunggu sampai Admin Verfikasi.');

        return view('auth.verifyAdmin', compact('alert', 'user', 'region'));
    }

    public function verifyStore(Request $request) {

        // dd($request->region);
         $validator = Validator::make($request->all(), [
             'nama'     => 'required',
             'email'    => 'required | email',
             'region'   => 'required',
             'stnk'     => 'required | mimes:jpeg,jpg,png',
             'jumlah'   => 'required | numeric',
             'bukti'    => 'required | mimes:jpeg,jpg,png'

         ]);

         if($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0]);
         }

         $imgName =  'STNK-' . $request->uid . '-' . time() . '.' . $request->stnk->extension();
         $request->stnk->move(public_path('image/Member/Profile/Stnk'), $imgName);
         
         $buktiIuran =  'BUKTI-' . $request->uid . '-' . time() . '.' . $request->bukti->extension();
         $request->bukti->move(public_path('image/Member/Keuangan/'), $buktiIuran);

         $user = User::find($request->uid);
         $user->nopung = 'G#-' . $request->uid;
         $user->save();

         $region = DB::table('region_user')->insert(['user_id' => $request->uid, 'region_id' => $request->region]);

         $keuangan = new Keuangan;
         $keuangan->region_id = $request->region;
         $keuangan->user_id = $request->uid;
         $keuangan->email = $request->email;
         $keuangan->nama = $request->nama;
         $keuangan->jumlah = $request->jumlah;
         $keuangan->kategori = 'Iuran Pertama';
         $keuangan->status = 'pending';
         $keuangan->bukti = $buktiIuran;
         $keuangan->save();

         $profile = new Profile;
         $profile::find($request->uid);
         $profile->user_id = $request->uid;
         $profile->foto_stnk = $imgName;
         $profile->save();
        
         return redirect('/member/home');

    }

    public function index() {
        $user = Auth::user();
        $userRegion = Auth::user()->region()->get();
        $post = Post::with('user')->latest()->get();
        $news = News::all();
        $region = Region::all();

        return view('member.Home', compact('post', 'news', 'region', 'userRegion'));
    }

    public function about() {
        $user = Auth::user();
        $userRegion = Auth::user()->region()->get();

        return view('member.About', compact('user', 'userRegion'));
    }

    public function galery() {
        $user = Auth::user();
        $userRegion = Auth::user()->region()->get();
        $gallery = $user->post()->get();

        return view('member.Galery', compact('user', 'userRegion', 'gallery'));
    }

    public function friend(Request $request, $id) {


        $user = Auth::user();
        $region = Region::all();
        $userRegion = Auth::user()->region()->get();
        $friends = User::whereHas('region', function($q) use($id){
                        $q->where('region_id', $id);
                    })->where('id', '!=', $user->id)->get();

        if($request->ajax()) {
            return response()->json($friends->load('profile'), 200);
        }

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

    public function profile_details() {
        $user    = Auth::user();
        $userRegion = Auth::user()->region()->get();

        return view('member.ProfileDetails', compact('user', 'userRegion'));
    }

    public function editProfile(Request $request, $id) {
        $user    = User::find($id);
        $profile = $user->profile;

        if($request->foto_profile != null) {
         $imgName = 'profile-' . $request->username . time() . '.' . $request->foto_profile->extension();
         $request->foto_profile->move(public_path('image/Member/Profile'), $imgName);
         $profile->foto_profile = $imgName;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->save();
        $profile->alamat = $request->alamat;
        $profile->pekerjaan = $request->pekerjaan;
        $profile->hobi = $request->hobi;
        $profile->save();
        
        return redirect()->back()->with('success', 'Profile Berhasil Disimpan');
    }
}

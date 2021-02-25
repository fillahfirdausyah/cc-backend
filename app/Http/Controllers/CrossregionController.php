<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Region;

class CrossregionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userRegion = Auth::User()->region()->get();
        $region = Region::all();
        
        return view('member.Region', compact('userRegion', 'region', 'user'));
        
    }

    public function create(Request $request)
    {
        $user_id = $request->uid;
        $region_id = $request->region;
        $user_region = DB::table("region_user")->where([['user_id', $user_id],['region_id',$region_id]])->get();

        if($user_region->count() <= 0){
	        $Crossregion = DB::table("region_user")->insert(['user_id' => $user_id, 'region_id' => $region_id]);
	        return redirect()->back()->with('success', 'Berhasil Tambah Daerah');
        }else{
        	return redirect()->back()->with('error', "You are already a member in this region!");
        }
    }

    public function delete(Request $request)
    {
        $user_id = $request->uid;
        $region_id = $request->region;

        $user_region = DB::table("region_user")->where([['user_id', $user_id],['region_id',$region_id]])->delete();

        return redirect()->back()->with("success", "Delete region successed");
    }

}

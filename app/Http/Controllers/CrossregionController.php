<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class CrossregionController extends Controller
{
    public function create(Request $request)
    {
        $user_id = $request->uid;
        $region_id = $request->region;

        $Crossregion = DB::table("region_user")
                            ->insert(['user_id' => $user_id, 'region_id' => $region_id]);

        return redirect()->back();
    }

}

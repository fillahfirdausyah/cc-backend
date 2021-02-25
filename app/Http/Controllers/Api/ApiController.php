<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    public function news(Request $request)
    {
        $data = new News;
        $data::find(2)->users()->post()-get();

        return response()->json(['success', $data], 200); 
    }
}

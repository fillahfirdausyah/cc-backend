<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    
    

    

    

    public function news()
    {
        $data = News::all();
        $success["data"] = $data;
        return response()->json(['success' => $success], 200);

        // return response()->json(['Error' => 'Error Bro']);
    }
}

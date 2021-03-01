<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UndianController extends Controller
{
    public function index() 
    {
        return view('admin.undian.Undian');
    }
}

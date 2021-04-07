<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UndianController extends Controller
{
    public $userVerified;
    function __construct() {
        $this->userVerified = User::where('verified', NULL);
    }

    public function index() 
    {
        $userVerified = $this->userVerified;
        return view('admin.undian.Undian', compact('userVerified'));
    }
}

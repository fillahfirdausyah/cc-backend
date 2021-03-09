<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\News;
use App\Models\Event;
use App\Models\Region;
use App\Models\SR;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cekrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $convSR = [];
        $collectSR = [];

        $news     = News::count();
        $event    = Event::count();
        $user     = User::count();
        $region   = Region::all();
        $showroom = SR::where('verified', NULL)->get();
        if($showroom != NULL){
            foreach ($showroom as $sr) {
                 $convSR[] = json_decode($sr->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectSR[] = $convSR[$i][0];
            }
        }

        
        return view('admin.Dashboard', compact('news', 'event', 'user', 'region', 'showroom', 'collectSR'));
    }
}

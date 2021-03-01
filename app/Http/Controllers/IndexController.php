<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Event;
class IndexController extends Controller
{
    public function index() {
        $news  = News::latest()->limit(3)->get();
        $event = Event::latest()->limit(2)->get();

        return view('index', compact('news', 'event'));
    }

    public function more() {

    }

    public function news($slug) {
        $news = News::where('slug', $slug)->first();
        $random = News::all()->random(3);
        return view('news', compact('news', 'random'));
    }
}

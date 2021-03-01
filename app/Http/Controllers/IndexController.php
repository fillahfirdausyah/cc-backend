<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
class IndexController extends Controller
{
    public function index() {
        $news    = News::latest()->limit(3)->get();
        $event   = Event::latest()->limit(2)->get();
        $gallery = Gallery::all();

        return view('index', compact('news', 'event','gallery'));
    }

    public function more() {

    }

    public function news($slug) {
        $news = News::where('slug', $slug)->first();
        $random = News::all()->random(3);
        return view('news', compact('news', 'random'));
    }
}

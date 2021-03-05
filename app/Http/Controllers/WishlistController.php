<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use App\Models\Merchandise;
use App\Models\Wishlist;
use App\Models\Bengkel;
use App\Models\SR;

class WishlistController extends Controller
{
    public function index()
    {
        $convSR = [];
        $collectSR = [];
        $convB = [];
        $collectB = [];
        $convM = [];
        $collectM = [];

        $SR = Wishlist::whereHas('user', function(Builder $q){
                                    $q->where('user_id', Auth::id());
                                })->with('car')
                                ->where('jenis','car')
                                ->get();

        $bengkel = Wishlist::whereHas('user', function(Builder $q){
                                    $q->where('user_id', Auth::id());
                                })->with('autoshop')
                                ->where('jenis', 'autoshop')
                                ->get();

        $merchan = Wishlist::whereHas('user', function(Builder $q){
                                    $q->where('user_id', Auth::id());
                                })->with('merchandise')
                                ->where('jenis', 'merchandise')
                                ->get();
        if($SR != NULL){
            foreach ($SR as $sr) {
                 $convSR[] = json_decode($sr->car->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectSR[] = $convSR[$i][0];
            }
        }

        if($bengkel != NULL){
            foreach ($bengkel as $b) {
                $convB[] = json_decode($b->autoshop->gambar);
            }

            $count = count($convB);
            for ($i=0; $i < $count; $i++) { 
                $collectB[] = $convB[$i][0];
            }
        }

        if($merchan != NULL){
            foreach ($merchan as $m) {
                 $convM[] = json_decode($m->merchandise->gambar);
            }

            $count = count($convM);
            for ($i=0; $i < $count; $i++) { 
                $collectM[] = $convM[$i][0];
            }
        }

        return view('showroom2.wishlist', compact('SR', 'bengkel', 'merchan', 'collectB', 'collectM', 'collectSR'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $w = new Wishlist();
        $w->user_id = $request->user_id;
        $w->produk_id = $request->produk_id;
        $w->jenis = $request->jenis;
        $w->save();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $wishlist = Wishlist::find($request->wishlist_id);
        $wishlist->delete();
    }
}

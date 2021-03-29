<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\CommentBengkel;
use App\Models\LikeBengkel;
use App\Models\Wishlist;
use App\Models\Bengkel;
use App\Models\User;
use App\Models\Region;

class AutoshopController extends Controller
{
    public function index()
    {
        $convB = [];
        $collectB = [];

        $bengkel = Bengkel::with('daerah')->paginate(20);
        if($bengkel != NULL){
            foreach ($bengkel as $b) {
                $convB[] = json_decode($b->gambar);
            }

            $count = count($convB);
            for ($i=0; $i < $count; $i++) { 
                $collectB[] = $convB[$i][0];
            }
        }
        return view('showroom2.autoshop.autoshops',compact('bengkel', 'collectB'));
    }

    public function show($id, $slug)
    {
        $user = Auth::user();
        //show picts
        $bengkel = Bengkel::find($id)->where('slug', $slug)->first();

        //show comment
        $comment = Bengkel::with(['comment', 'comment.user'])->where('id', $id)->first();
        $wishlist = Wishlist::where('produk_id', $id)
                            ->where('user_id', Auth::id())
                            ->where('jenis', 'autoshop')
                            ->first();

        //show like
        $like = LikeBengkel::select('like')->where('post_id', '=', $id)->get();
        $likes = count($like);

        return view('showroom2.autoshop.autoshop-detail', compact( 'bengkel', 'comment', 'likes', 'user', 'wishlist'));  
    }

    public function create()
    {
        $user = Auth::id();
        $region = Region::all();

        return view('showroom2.autoshop.upload-autoshop',compact('user', 'region'));
    }

    public function store(Request $request)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
            'nama' => 'required',
            'user_id' => 'required',
            'region_id' => 'required',
            'kontak' => 'required | numeric | digits_between:10,13',
            'waktu_buka' => 'required',
            'waktu_tutup' => 'required',
            'hari' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,png,jpeg',
            'alamat' => 'required | max:100',
            'layanan' => 'required | max:200'
        ]);

        if ($validator->fails()) {
            return redirect('/showroom/upload/autoshop')
                        ->withErrors($validator)
                        ->withInput();
        }

        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'assets/vendor/showroom/assets/images/'; 
            $profileImage ="imageBengkel-".Str::slug($request->nama, '-').rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $bengkel = new Bengkel();
        $bengkel->nama = $request->nama;
        $bengkel->user_id = $request->user_id;
        $bengkel->region_id = $request->region_id;
        $bengkel->kontak = $request->kontak;
        $bengkel->waktu_buka = $request->waktu_buka;
        $bengkel->waktu_tutup = $request->waktu_tutup;
        $bengkel->hari = $request->hari;
        $bengkel->alamat = $request->alamat;
        $bengkel->layanan = json_encode(explode(",", $request->layanan));
        $bengkel->gambar = json_encode($name);
        $bengkel->slug = Str::slug($request->nama, '-');
        $bengkel->save();

        return redirect()->back()->with('status', 'Data berhasil ditambahkan!');
    }

    public function edit($id) 
    {
        $user = Auth::id();
        $bengkel = Bengkel::find($id);
        if (! Gate::allows('ud-bengkel', $bengkel)) {
            abort(403);
        }
        $region = Region::all();

        return view('showroom2.autoshop.edit-autoshop',compact('user', 'region', 'bengkel'));
    }

    public function update(Request $request)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
            'nama' => 'required',
            'user_id' => 'required',
            'region_id' => 'required',
            'kontak' => 'required | numeric | digits_between:10,13',
            'waktu_buka' => 'required',
            'waktu_tutup' => 'required',
            'hari' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,png,jpeg',
            'alamat' => 'required | max:100',
            'layanan' => 'required | max:300'
        ]);

        if ($validator->fails()) {
            return redirect('/showroom/upload/autoshop')
                        ->withErrors($validator)
                        ->withInput();
        }

        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'assets/vendor/showroom/assets/images/'; 
            $profileImage ="imageBengkel-".Str::slug($request->nama, '-').rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $bengkel = Bengkel::find($request->id);

        if (! Gate::allows('ud-bengkel', $bengkel)) {
            abort(403);
        }

        $bengkel->nama = $request->nama;
        $bengkel->user_id = $request->user_id;
        $bengkel->region_id = $request->region_id;
        $bengkel->kontak = $request->kontak;
        $bengkel->waktu_buka = $request->waktu_buka;
        $bengkel->waktu_tutup = $request->waktu_tutup;
        $bengkel->hari = $request->hari;
        $bengkel->alamat = $request->alamat;
        $bengkel->layanan = json_encode(explode(",", $request->layanan));
        $bengkel->gambar = json_encode($name);
        $bengkel->slug = Str::slug($request->nama, '-');
        $bengkel->save();

        return redirect()->back()->with('status', 'Berhasil Diedit!');
    }

    public function destroy($id)
    {

        $bengkel = Bengkel::find($id);
        if (! Gate::allows('ud-bengkel', $bengkel)) {
            abort(403);
        }
        $bengkel->delete();

        return redirect('/showroom');
    }

    public function search(Request $request)
    {
        $convB = [];
        $collectB = [];
        $search = $request->search;

        $bengkel = Bengkel::whereHas('daerah', function(Builder $q) use($search){
                        $q->where('region', 'LIKE', $search);
                    })->orWhere('nama', 'LIKE', $search)
                    ->paginate(20);

        if($bengkel != NULL){
            foreach ($bengkel as $b) {
                $convB[] = json_decode($b->gambar);
            }

            $count = count($convB);
            for ($i=0; $i < $count; $i++) { 
                $collectB[] = $convB[$i][0];
            }
        }
        return view('showroom2.autoshop.autoshops',compact('bengkel', 'collectB'));
    }
    // public function createPromo($id)
    // {
    //     $bengkel = Bengkel::find($id);

    //     return view('showroom.PromoBengkel', compact('bengkel'));
    // }

    // public function storePromo(Request $request, $id, SR $sr)
    // {
    //     if (! Gate::allows('update-sr', $sr)) {
    //         $input_data = $request->all();

    //         $validator = Validator::make($input_data, [
    //             'promo' => 'required | integer'
    //         ]);

    //         $bengkel = Bengkel::find($id);
    //         $bengkel->promo = $request->promo;
    //         $bengkel->save();

    //         return redirect()->back()->with('success', 'Promo berhasil Ditambahkan silahkan kembali!');
    //     }
    // }

    public function comment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

            $comment = new CommentBengkel();
            $comment->post_id = $request->post_id;
            $comment->user_id = $request->user_id;
            $comment->comment = $request->comment;
            $comment->save();

        return redirect()->back();   
    } 

    public function deleteComment($id)
    {
        $comment = CommentBengkel::find($id);
        $comment->delete();

        return redirect()->back();   
    } 

    // public function like(Request $request)
    // {
    //     if (LikeBengkel::where('post_id', $request->get('post_id'))->where('user_id', $request->get('user_id'))->count() < 1) {
    //         $like = new LikeBengkel();
    //         $like->like = $request->get('like');
    //         $like->user_id = $request->get('user_id');
    //         $like->post_id = $request->get('post_id');
    //         $like->save(); 
    //     }else{
    //         $like = LikeBengkel::where('post_id', $request->get('post_id'))->where('user_id', $request->get('user_id'));
    //         $like->delete();
    //     }

    //     $like = LikeBengkel::select('like')->where('post_id', '=', $request->get('post_id'))->get();
    //     $likes = count($like);

    //     echo $likes;  
    // }
}

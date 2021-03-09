<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\Comments_SR;
use App\Models\Wishlist;
use App\Models\Region;
use App\Models\Like_SR;
use App\Models\User;
use App\Models\SR;


class ShowroomController extends Controller
{
    public function index()
    {
        $convSR = [];
        $collectSR = [];
        $SR = SR::where('verified', 'yes')->take(20)->get();
        if($SR != NULL){
            foreach ($SR as $sr) {
                 $convSR[] = json_decode($sr->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectSR[] = $convSR[$i][0];
            }
        }

        return view('showroom2.showroom', compact('collectSR', 'SR'));
    }

    public function show()
    {
        $convSR = [];
        $collectCar = [];
        $SR = SR::where('verified', 'yes')->paginate(20);
        if($SR != NULL){
            foreach ($SR as $sr) {
                 $convSR[] = json_decode($sr->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectCar[] = $convSR[$i][0];
            }
        }

        return view('showroom2.cars', compact('collectCar', 'SR'));
    }

    public function list()
    {

        $convSR = [];
        $collectCar = [];
        $SR = SR::whereHas('user', function($q){
            $q->where('user_id', Auth::id());
        })->paginate(20);

        if($SR != NULL){
            foreach ($SR as $sr) {
                 $convSR[] = json_decode($sr->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectCar[] = $convSR[$i][0];
            }
        }

        return view('showroom2.list-cars', compact('collectCar', 'SR'));
    }

    public function detail($id, $slug)
    {
        // User
        $user = SR::find($id)->user()->first();
        
        //show picts
        $SR = SR::find($id)->where('slug', $slug)->first();

        //Seller User
        $tenant = SR::with(['user.tenant'])->where('id', $id)->first();
        $wishlist = Wishlist::where('produk_id', $id)
                            ->where('user_id', Auth::id())
                            ->where('jenis', 'car')
                            ->first();

        return view('showroom2.car-details', compact('SR', 'user', 'tenant', 'wishlist'));
    }

    // Showroom
    public function create()
    {
        $user = Auth::user();

        return view('showroom2.upload-car', compact('user'));
    }

    public function store(Request $request)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
        'user_id' => 'required',
        'judul' => 'required',
        'deskripsi' => 'required',
        'jenis' => 'required',
        'stok' => 'required',
        'harga' => 'required|integer',
        'kondisi' => 'required',
        'mesin' => 'required',
        'tahun' => 'required | numeric | min:1900 | max:2100',
        'bahan_bakar' => 'required',
        'tenaga' => 'required',
        'transmisi' => 'required',
        'warna' => 'required',
        'gambar' => 'required',
        'gambar.*' => 'mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect('/showroom/upload')
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->fitur != NULL){
            $fitur = explode(",", $request->fitur);
        } else {
            $fitur = NULL;
        }

        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'assets/vendor/showroom/assets/images/'; 
            $profileImage ="imageCar-".$request->judul."-".Str::slug($request->judul, '-').rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $SR = new SR();
        $SR->user_id = $request->user_id;
        $SR->judul = $request->judul;
        $SR->stok = $request->stok;
        $SR->deskripsi = $request->deskripsi;
        $SR->jenis = $request->jenis;
        $SR->harga = $request->harga;
        $SR->kondisi = $request->kondisi;
        $SR->mesin = $request->mesin;
        $SR->tahun = $request->tahun;
        $SR->fitur = json_encode($fitur);
        $SR->bahan_bakar = $request->bahan_bakar;
        $SR->tenaga = $request->tenaga;
        $SR->transmisi = $request->transmisi;
        $SR->warna = $request->warna;
        $SR->gambar = json_encode($name);
        $SR->slug = Str::slug($request->judul, '-');
        $SR->save();

        return redirect()->back()->with('status', 'data sudah berhasil ditambahkan!');
    }

    public function edit($id, SR $sr)
    {
        $SR = SR::find($id);
        if (! Gate::allows('ud-sr', $SR)) {
            abort(403);
        }else {
        $user = Auth::user();

        return view('showroom2.edit-car', compact('user', 'SR'));
        }
    }

    public function update(Request $request)
    {
        $sr = SR::find($request->id);
        if (! Gate::allows('ud-sr', $sr)) {
            abort(403);
        } 

        $input_data = $request->all();

        $validator = Validator::make($input_data, [
        'user_id' => 'required',
        'judul' => 'required',
        'deskripsi' => 'required',
        'jenis' => 'required',
        'stok' => 'required',
        'harga' => 'required|integer',
        'kondisi' => 'required',
        'mesin' => 'required',
        'tahun' => 'required | numeric | min:1900 | max:2100',
        'bahan_bakar' => 'required',
        'tenaga' => 'required',
        'transmisi' => 'required',
        'warna' => 'required',
        'gambar' => 'required',
        'gambar.*' => 'mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect('/upload')
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->fitur != NULL){
            $fitur = explode(",", $request->fitur);
        } else {
            $fitur = NULL;
        }

        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'assets/vendor/showroom/assets/images/'; 
            $profileImage ="imageCar-".$request->judul."-".Str::slug($request->judul, '-').rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $SR = SR::find($request->id);
        $SR->user_id = $request->user_id;
        $SR->judul = $request->judul;
        $SR->stok = $request->stok;
        $SR->deskripsi = $request->deskripsi;
        $SR->jenis = $request->jenis;
        $SR->harga = $request->harga;
        $SR->kondisi = $request->kondisi;
        $SR->mesin = $request->mesin;
        $SR->tahun = $request->tahun;
        $SR->fitur = json_encode($fitur);
        $SR->bahan_bakar = $request->bahan_bakar;
        $SR->tenaga = $request->tenaga;
        $SR->transmisi = $request->transmisi;
        $SR->warna = $request->warna;
        $SR->gambar = json_encode($name);
        $SR->slug = Str::slug($request->judul, '-');
        $SR->save();

        
        return redirect()->back()->with('status', 'data sudah berhasil di Edit!');
    }

    public function destroy($id)
    {
        $sr = SR::find($id);
        if (! Gate::allows('ud-sr', $sr)) {
            abort(403);
        }

        $sr->delete();

        return redirect('/showroom');
    }

    public function comment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

            $comment = new Comments_SR();
            $comment->post_id = $request->id;
            $comment->user_id = $request->user_id;
            $comment->comment = $request->comment;
            $comment->save();

        return redirect()->back();   
    }

    public function like(Request $request)
    {
        if (Like_SR::where('post_id', $request->get('post_id'))->where('user_id', $request->get('user_id'))->count() < 1) {
            $like = new Like_SR();
            $like->like = $request->get('like');
            $like->user_id = $request->get('user_id');
            $like->post_id = $request->get('post_id');
            $like->save(); 
        }else{
            $like = Like_SR::where('post_id', $request->get('post_id'))->where('user_id', $request->get('user_id'));
            $like->delete();
        }

        $like = Like_SR::select('like')->where('post_id', '=', $request->get('post_id'))->get();
        $likes = count($like);

        echo $likes;  
    }

    public function search(Request $request)
    {
        $convSR = [];
        $collectCar = [];
        $search = $request->search;

        $SR = SR::where('judul', 'LIKE', $search)->orWhere('jenis', 'LIKE', $search)->paginate(20);

        if($SR != NULL){
            foreach ($SR as $sr) {
                 $convSR[] = json_decode($sr->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectCar[] = $convSR[$i][0];
            }
        }

        return view('showroom2.cars', compact('collectCar', 'SR'));
    }

    public function accept($id) {
        $data = SR::find($id);

        $data->verified = 'yes';
        $data->save();

        return response()->json($id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Region;
use App\Models\Merchandise;
use App\Models\SR;
use App\Models\Like_SR;
use App\Models\Comments_SR;


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

    public function detail($id)
    {
        // Authenticated User
        $user = Auth::user();
        
        //show picts
        $SR = SR::find($id);
        //Seller User
        $tenant = SR::with(['user.tenant'])->where('id', $id)->first();

        // show like
        // $like = Like_SR::select('like')->where('post_id', '=', $id)->get();
        // $likes = count($like);

        // return view('showroom2.car-details', compact('SR','comment', 'likes','recomendations','user'));
        return view('showroom2.car-details', compact('SR', 'user', 'tenant'));
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
            $profileImage ="imageCar-".$request->judul."-".Str::slug($request->judul, '-').".".$file->extension();
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
            $profileImage ="imageCar-".$request->judul."-".Str::slug($request->judul, '-').".".$file->extension();
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
            $comment->parent_id = $request->parent_id !='' ? $request->parent_id:NULL;
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
        $search = $request->get('query');
        if ($search != "") {
            $data = DB::table('show_room')->where('judul', 'LIKE', "%{$search}%")
                ->take(5)->get();
            $output = "<ul class='list-group'>";
            foreach($data as $row)
            {
            $output .= "<a href='/showroom/".$row->id."-".$row->slug."'><li class='list-group-item text-center' style='width=200px;'>".$row->judul."</li></a>";
            }
            $output .= ".</ul>";
        }else{
            $output = NULL;
        }

        return $output;
    }

    public function createPromo($id)
    {
        $SR = SR::find($id);

        return view('showroom.PromoSR', compact('SR'));
    }

    public function promo(Request $request, $id, SR $sr)
    {
        if (! Gate::allows('update-sr', $sr)) {
            $input_data = $request->all();

            $validator = Validator::make($input_data, [
                'promo' => 'required | integer'
            ]);

            $SR = SR::find($id);
            $SR->promo = $request->promo;
            $SR->save();

            return redirect()->back()->with('success', 'Promo berhasil Ditambahkan silahkan kembali!');
        }
    }

    public function stock(Request $request,$id)
    {

        $input_data = $request->all();

        $validator = Validator::make($input_data, [
            'stok' => 'required'
        ]);

        $SR = SR::find($id);
        $SR->stok = $request->stok;
        $SR->save();

        return redirect()->back();
    }


}

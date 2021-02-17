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
use App\Models\Bengkel;
use App\Models\Region;
use App\Models\SR;
use App\Models\Comments_SR;


class ShowroomController extends Controller
{
    public function moreSR()
    {
        $convSR = [];
        $collectSR = [];

        $SR = SR::paginate(20);
        if($SR != NULL){
            foreach ($SR as $sr) {
                 $convSR[] = json_decode($sr->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectSR[] = $convSR[$i][0];
            }
        }

        return view('.Showroom.MoreSR', compact('collectSR', 'SR'));
    }

    public function show()
    {
        $convSR = [];
        $collectSR = [];
        $convB = [];
        $collectB = [];

        $bengkel = Bengkel::with('daerah')->take(20)->get();
        if($bengkel != NULL){
            foreach ($bengkel as $b) {
                $convB[] = json_decode($b->gambar);
            }

            $count = count($convB);
            for ($i=0; $i < $count; $i++) { 
                $collectB[] = $convB[$i][0];
            }
        }

        $SR = SR::take(20)->get();
        if($SR != NULL){
            foreach ($SR as $sr) {
                 $convSR[] = json_decode($sr->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectSR[] = $convSR[$i][0];
            }
        }

        return view('showroom/ShowRoom', compact('bengkel','collectB','collectSR', 'SR'));
    }

    // Showroom
    public function create()
    {
        $user = Auth::id();

        return view('showroom/uploadSR', compact('user'));
    }

    public function store(Request $request)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
        'user_id' => 'required',
        'judul' => 'required',
        'deskripsi' => 'required',
        'kategori' => 'required',
        'stok' => 'required',
        'harga' => 'required|integer',
        'gambar' => 'required',
        'gambar.*' => 'mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect('/showroom/upload')
                        ->withErrors($validator)
                        ->withInput();
        }

        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'public/image'; 
            $profileImage ="image-".$request->judul."-".rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $SR = new SR();
        $SR->user_id = $request->user_id;
        $SR->judul = $request->judul;
        $SR->stok = $request->stok;
        $SR->deskripsi = $request->deskripsi;
        $SR->kategori = $request->kategori;
        $SR->harga = $request->harga;
        $SR->gambar = json_encode($name);
        $SR->slug = Str::slug($request->judul, '-');
        $SR->save();

        return redirect('/showroom')->with('status', 'data sudah berhasil ditambahkan!');
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
    
     public function category(Request $request)
    {
        $category = $request->get('query');
        
        if($category == "All"){
            $SR = SR::paginate(20);    
        }else{
            $SR = DB::table('show_room')->where('kategori', 'LIKE', "%{$category}%")->get();
        }
        
        foreach ($SR as $sr) {
             $conv[] = json_decode($sr->gambar);
        }
        $count = count($conv);
        for ($i=0; $i < $count; $i++) { 
            $collect[] = $conv[$i][0];
        }

        $output = "<div class='row'>";
        foreach($SR as $sr => $key){
            $output .= "<div class='col-md-4 card-group'><div class='card' style='padding: 5px; margin-top:10px;'><img class='card-img-top' src='../../../public/image/".$collect[$sr]."' width='250' height='180'><div class='card-body'><h4 class='card-title'><a href='/showroom/".$key->id."-".$key->slug."'> ".$key->judul." </a></h4><p class='card-text'><strong>Rp. ".$key->harga." </strong></p><p class='card-text'><small class='text-muted'>Updated on ".$key->created_at."</small></p></div></div></div>";   
        }
        $output .= "<div>";

    return $output;
    }

    public function edit($id)
    {
        $SR = SR::find($id);
        $user = Auth::user();

        return view('showroom/editSR', compact('user', 'SR'));
    }

    public function update(Request $request, $id, SR $sr)
    {
        if (! Gate::allows('update-sr', $sr)) {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
        'judul' => 'required',
        'user_id' => 'required',
        'deskripsi' => 'required',
        'stok' => 'required',
        'kategori' => 'required',
        'harga' => 'required|integer',
        'gambar' => 'required',
        'gambar.*' => 'mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect('/upload')
                        ->withErrors($validator)
                        ->withInput();
        }

        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'public/image'; 
            $profileImage ="image-".$request->judul."-".rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $SR = SR::find($id);
        $SR->user_id = $request->user_id;
        $SR->judul = $request->judul;
        $SR->stok = $request->stok;
        $SR->deskripsi = $request->deskripsi;
        $SR->kategori = $request->kategori;
        $SR->harga = $request->harga;
        $SR->gambar = json_encode($name);
        $SR->slug = Str::slug($request->judul, '-');
        $SR->save();
        
        return redirect('/showroom')->with('status', 'data sudah berhasil di Edit!');
        }
    }

    public function createPromo($id)
    {
        $SR = SR::find($id);

        return view('Showroom.PromoSR', compact('SR'));
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

    public function searchSR(Request $request)
    {
        $search = $request->search;

        $convSR = [];
        $collectSR = [];

        $SR = SR::where('judul', 'like', $search)->paginate(20);
        if($SR != NULL){
            foreach ($SR as $sr) {
                 $convSR[] = json_decode($sr->gambar);
            }

            $count = count($convSR);
            for ($i=0; $i < $count; $i++) { 
                $collectSR[] = $convSR[$i][0];
            }
        }

        return view('.Showroom.MoreSR', compact('collectSR', 'SR'));
    }

    public function destroy($id)
    {
        $SR = SR::find($id);
        $SR->delete();

        return redirect('/showroom');
    }

    // Bengkel
    public function moreBengkel()
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

        return view('.Showroom.MoreBengkel',compact('bengkel', 'collectB'));
    }

    public function createBengkel()
    {
        $user = Auth::id();
        $region = Region::all();

        return view('/Showroom/uploadBengkel',compact('user', 'region'));
    }

    public function storeBengkel(Request $request)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
            'nama' => 'required',
            'user_id' => 'required',
            'region_id' => 'required',
            'kontak' => 'required | unique:App\Models\Bengkel,kontak | numeric | digits_between:10,13',
            'waktu_buka' => 'required',
            'waktu_tutup' => 'required',
            'hari' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,png,jpeg',
            'alamat' => 'required | max:100',
            'layanan' => 'required | max:200'
        ]);

        if ($validator->fails()) {
            return redirect('/showroom/upload/bengkel')
                        ->withErrors($validator)
                        ->withInput();
        }

        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'public/image'; 
            $profileImage ="image-".$request->nama."-".rand(0000,9999).".".$file->extension();
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
        $bengkel->layanan = $request->layanan;
        $bengkel->gambar = json_encode($name);
        $bengkel->slug = Str::slug($request->nama, '-');
        $bengkel->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function createBengkelPromo($id)
    {
        $bengkel = Bengkel::find($id);

        return view('.Showroom.PromoBengkel', compact('bengkel'));
    }

    public function BengkelPromo(Request $request, $id, SR $sr)
    {
        if (! Gate::allows('update-sr', $sr)) {
            $input_data = $request->all();

            $validator = Validator::make($input_data, [
                'promo' => 'required | integer'
            ]);

            $bengkel = Bengkel::find($id);
            $bengkel->promo = $request->promo;
            $bengkel->save();

            return redirect()->back()->with('success', 'Promo berhasil Ditambahkan silahkan kembali!');
        }
    } 

    public function editBengkel($id) 
    {
        $user = Auth::id();
        $bengkel = Bengkel::find($id);
        $region = Region::all();

        return view('/Showroom/editBengkel',compact('user', 'region', 'bengkel'));
    }

    public function updateBengkel(Request $request, $id)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
            'nama' => 'required',
            'user_id' => 'required',
            'region_id' => 'required',
            'kontak' => 'required | numeric | unique:App\Models\Bengkel,kontak | digits_between:10,13',
            'waktu_buka' => 'required',
            'waktu_tutup' => 'required',
            'hari' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,png,jpeg',
            'alamat' => 'required | max:100',
            'layanan' => 'required | max:200'
        ]);

        if ($validator->fails()) {
            return redirect('/showroom/upload/bengkel')
                        ->withErrors($validator)
                        ->withInput();
        }

        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'public/image'; 
            $profileImage ="image-".$request->nama."-".rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $bengkel = Bengkel::find($id);
        $bengkel->nama = $request->nama;
        $bengkel->user_id = $request->user_id;
        $bengkel->region_id = $request->region_id;
        $bengkel->kontak = $request->kontak;
        $bengkel->waktu_buka = $request->waktu_buka;
        $bengkel->waktu_tutup = $request->waktu_tutup;
        $bengkel->hari = $request->hari;
        $bengkel->alamat = $request->alamat;
        $bengkel->layanan = $request->layanan;
        $bengkel->gambar = json_encode($name);
        $bengkel->slug = Str::slug($request->nama, '-');
        $bengkel->save();

        return redirect()->back();
    }

    public function searchBengkel(Request $request)
    {
        $search = $request->search;

        $convB = [];
        $collectB = [];

        $bengkel = Bengkel::Where('nama', 'LIKE', $search)
                    ->orWhereHas('daerah', function($q) use($search){
                        $q->where('region', 'LIKE', $search);
                    })->paginate(20);
        if($bengkel != NULL){
            foreach ($bengkel as $b) {
                $convB[] = json_decode($b->gambar);
            }

            $count = count($convB);
            for ($i=0; $i < $count; $i++) { 
                $collectB[] = $convB[$i][0];
            }
        }

        return view('.Showroom.MoreBengkel',compact('bengkel', 'collectB'));
    }

    public function destroyBengkel($id)
    {
        $bengkel = Bengkel::find($id);
        $bengkel->delete();

        return redirect('/showroom');
    }

}

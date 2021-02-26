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
    public function show()
    {
        $convSR = [];
        $collectSR = [];
        $convB = [];
        $collectB = [];

        $bengkel = Bengkel::with('daerah')->take(9)->get();
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

        return view('showroom2.showroom', compact('bengkel','collectB','collectSR', 'SR'));
    }
    public function moreCar()
    {
        $SR = SR::paginate(20);
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
            $profileImage ="imageCar-".$request->judul."-".rand(0000,9999).".".$file->extension();
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
            $profileImage ="imageCar-".$request->judul."-".rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $SR = SR::find($id);
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

        return view('showroom.MoreBengkel',compact('bengkel', 'collectB'));
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
            $destinationPath = 'public/assets/vendor/showroom/assets/images/'; 
            $profileImage ="imageBengkel-".$request->nama."-".rand(0000,9999).".".$file->extension();
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

        return view('showroom.PromoBengkel', compact('bengkel'));
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

        return view('/Showroom/uploadBengkel',compact('user', 'region', 'bengkel'));
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
            $destinationPath = 'public/assets/vendor/showroom/assets/images/'; 
            $profileImage ="imageBengkel-".$request->nama."-".rand(0000,9999).".".$file->extension();
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

    public function destroyBengkel($id)
    {
        $bengkel = Bengkel::find($id);
        $bengkel->delete();

        return redirect('/showroom');
    }

}

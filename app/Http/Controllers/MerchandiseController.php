<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Merchandise;
use App\Models\Region;

class MerchandiseController extends Controller
{
	public function index()
	{
        $convM = [];
        $collectM = [];

		$merchan = Merchandise::paginate(20);
        if($merchan != NULL){
            foreach ($merchan as $m) {
                 $convM[] = json_decode($m->gambar);
            }

            $count = count($convM);
            for ($i=0; $i < $count; $i++) { 
                $collectM[] = $convM[$i][0];
            }
        }

		return view('showroom2.merchandise', compact('merchan', 'collectM'));
	}

	public function show($id)
	{
		$merchan = Merchandise::find($id)->with('user.tenant')->first();

		return view('showroom2.merchandise-detail', compact('merchan'));
	}

    public function create()
    {
    	$user = Auth::id();
    	$region = Region::all();
    	return view('showroom2.upload-merchandise', compact('user', 'region')); 
    }

    public function store(Request $request)
    {

        $input_data = $request->all();
        $validator = Validator::make($input_data, [
            'np' => 'required',
            'user_id' => 'required',
            'region_id' => 'required',
            'kategori' => 'required',
            'stok' => 'required | numeric',
            'kondisi' => 'required',
            'deskripsi' => 'required | min:50',
            'harga' => 'required | numeric',
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,png,jpeg'
        ]);

        if ($validator->fails()) {
            return redirect('/showroom/upload/merchandise')
                        ->withErrors($validator)
                        ->withInput();
        }

        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'assets/vendor/showroom/assets/images/'; 
            $profileImage ="imageMerchandise-".Str::slug($request->nama, '-').rand(00000,99999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $merchan = new Merchandise();
        $merchan->nama_produk = $request->np;
        $merchan->user_id = $request->user_id;
        $merchan->region_id = $request->region_id;
        $merchan->kategori = $request->kategori;
        $merchan->kondisi = $request->kondisi;
        $merchan->stok = $request->stok;
        $merchan->deskripsi = $request->deskripsi;
        $merchan->harga = $request->harga;
        $merchan->gambar = json_encode($name);
        $merchan->slug = Str::slug($request->np, '-');
        $merchan->save();

        return redirect()->back()->with('status', 'Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = Auth::id();
        $region = Region::all();
        $merchan = Merchandise::find($id);
        if (! Gate::allows('ud-merchan', $merchan)) {
            abort(403);
        }

        return view('showroom2.edit-merchandise', compact('user', 'region', 'merchan')); 
    }

    public function update(Request $request, Merchandise $merchan)
    {
        $input_data = $request->all();
        $validator = Validator::make($input_data, [
            'np' => 'required',
            'user_id' => 'required',
            'region_id' => 'required',
            'kategori' => 'required',
            'stok' => 'required | numeric',
            'kondisi' => 'required',
            'deskripsi' => 'required | min:50',
            'harga' => 'required | numeric',
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,png,jpeg'
        ]);

        if ($validator->fails()) {
            return redirect('/showroom/upload/merchandise')
                        ->withErrors($validator)
                        ->withInput();
        }

        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'assets/vendor/showroom/assets/images/'; 
            $profileImage ="imageMerchandise-".Str::slug($request->nama, '-').rand(00000,99999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $merchan = Merchandise::find($request->id);
        if (! Gate::allows('ud-merchan', $merchan)) {
            abort(403);
        }
        $merchan->nama_produk = $request->np;
        $merchan->user_id = $request->user_id;
        $merchan->region_id = $request->region_id;
        $merchan->kategori = $request->kategori;
        $merchan->kondisi = $request->kondisi;
        $merchan->stok = $request->stok;
        $merchan->deskripsi = $request->deskripsi;
        $merchan->harga = $request->harga;
        $merchan->gambar = json_encode($name);
        $merchan->slug = Str::slug($request->np, '-');
        $merchan->save();

        return redirect()->back()->with('status', 'Berhasil diedit');
    }

    public function destroy($id)
    {
        $merchan = Merchandise::find($id);
        if (! Gate::allows('ud-merchan', $merchan)) {
            abort(403);
        }
        $merchan->delete();

        return redirect('/showroom');
    }

}

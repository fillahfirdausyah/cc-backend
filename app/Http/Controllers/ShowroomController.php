<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\SR;
use App\Models\Comments_SR;


class ShowroomController extends Controller
{
    public function index(){}

    public function create(){}

    public function search(Request $request)
    {
        $search = $request->get('query');
        $data = DB::table('show_room')->where('judul', 'LIKE', "%{$search}%")
            ->get();
        $output = "<ul class='list-group'>";
        foreach($data as $row)
        {
        $output .= "<a href='/showroom/".$row->id."-".$row->slug."'><li class='list-group-item text-center' style='width=200px;'>".$row->judul."</li></a>";
        }
        $output .= ".</ul>";

        return $output;
    }
    
     public function category(Request $request)
    {
        $category = $request->get('query');
        
        if($category == "All"){
            $SR = SR::paginate(20);    
        }else{
            $SR = DB::table('show_room')->where('dagangan', 'LIKE', "%{$category}%")->get();
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
            $output .= "<div class='col-md-4 card-group'><div class='card' style='padding: 5px; margin-top:10px;'><img class='card-img-top' src='../../../public/image/".$collect[$sr]."' width='250' height='180'><div class='card-body'><h4 class='card-title'><a href='/showroom/".$key->id."-".$key->slug."'> ".$key->judul." </a></h4><p class='card-text'><strong>Rp. ".$key->harga." </strong></p><p class='card-text'>".$key->deskripsi."</p><p class='card-text'><small class='text-muted'>Updated on ".$key->created_at."</small></p></div></div></div>";   
        }
        $output .= "<div>";

    return $output;
    }

    public function store(Request $request)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
        'judul' => 'required',
        'deskripsi' => 'required',
        'dagangan' => 'required',
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
            $profileImage ="image".rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $SR = new SR();
        $SR->judul = $request->judul;
        $SR->deskripsi = $request->deskripsi;
        $SR->dagangan = $request->dagangan;
        $SR->harga = $request->harga;
        $SR->gambar = json_encode($name);
        $SR->slug = Str::slug($request->judul, '-');
        $SR->save();

        return redirect('/showroom')->with('status', 'data sudah berhasil ditambahkan!');
    }

    public function show()
    {
        $SR = DB::table('show_room')->paginate(20);
        if($SR != NULL){
            foreach ($SR as $sr) {
                 $conv[] = json_decode($sr->gambar);
            }
            $count = count($conv);
            for ($i=0; $i < $count; $i++) { 
                $collect[] = $conv[$i][0];
            }

            return view('showroom/ShowRoom',['SR' => $SR], compact('collect'));
        }else{
            return view('showroom/ShowRoom');
        }
    }

    public function edit($id)
    {
        $SR = SR::find($id);

        return view('showroom/editSR',['SR' => $SR]);
    }

    public function update(Request $request, $id)
    {
        $input_data = $request->all();

        $validator = Validator::make($input_data, [
        'judul' => 'required',
        'deskripsi' => 'required',
        'dagangan' => 'required',
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
            $profileImage ="image".rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
            $name[] = $profileImage;
        }

        $SR = SR::find($id);
        $SR->judul = $request->judul;
        $SR->deskripsi = $request->deskripsi;
        $SR->dagangan = $request->dagangan;
        $SR->harga = $request->harga;
        $SR->gambar = json_encode($name);
        $SR->slug = Str::slug($request->judul, '-');
        $SR->save();
        
        return redirect('/showroom')->with('status', 'data sudah berhasil di Edit!');
    }

    public function destroy($id)
    {
        $SR = SR::find($id);
        $SR->delete();

        return redirect('/showroom');
    }
}

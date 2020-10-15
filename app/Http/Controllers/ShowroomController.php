<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\SR;


class ShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->get('query');
        $data = DB::table('show_room')->where('judul', 'LIKE', "%{$search}%")
            ->get();
        foreach($data as $row)
        {
        $output =   "<div class='col-md-4 card-group'>".
                        "<div class='card' style='padding: 5px;'>".
                            "<div class='card-body'>".
                                "<h5 class='card-title'><a href='/visit/".$row->id."'>".$row->judul."</a></h5>".
                                "<p class='card-text'><strong>Rp.".$row->harga."</strong></p>".
                                "<p class='card-text'>".$row->deskripsi."</p>".
                                "<p class='card-text'><small class='text-muted'>Updated on ". $row->created_at."</small></p>".
                            "</div>".
                        "</div>".
                    "</div>";
            
        }
        echo $output;
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'judul' => 'required',
        'deskripsi' => 'required',
        'dagangan' => 'required',
        'harga' => 'required|integer',
        ]);

        $count = count($request->file('gambar'));
        
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
        $SR->save();

        // dd($SR->gambar);
        
        return redirect('/')->with('status', 'data sudah berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $SR = SR::all();
        $conv = [];
        $conv[] = $SR[0]->gambar;
        $picts = implode(", ", $conv);
        $takePict = trim($picts, '[%22]"');
        $takePict2 = preg_replace("/[^a-zA-Z0-9.,]/", '', $takePict);
        $explode = explode(",", $takePict2);
        $show[] = $explode[0];


        return view('layouts/ShowRoom',['SR' => $SR], compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SR = Showroom::find($id);

        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
        'judul' => 'required',
        'deskripsi' => 'required',
        'dagangan' => 'required',
        'harga' => 'required|integer',
        ]);

        $count = count($request->file('gambar'));
        
        foreach ($request->file('gambar') as $file) { 
            $destinationPath = 'public/image'; 
            $profileImage ="image".rand(0000,9999).".".$file->extension();
            $file->move($destinationPath, $profileImage);
        }

        $SR = SR::find($id);
        $SR->judul = $request->judul;
        $SR->deskripsi = $request->deskripsi;
        $SR->dagangan = $request->dagangan;
        $SR->harga = $request->harga;
        $SR->gambar = $profileImage;
        $SR->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SR = SR::find($id);
        $SR->delete();

        return redirect('/');
    }
}

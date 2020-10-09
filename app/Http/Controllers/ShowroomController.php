<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\News;


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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'judul' => 'required',
        'deskripsi' => 'required',
        'dagangan' => 'required',
        'harga' => 'required|integer'
        'gambar' => 'required|min:3|max:6|mimes:jpg,jpeg,png|max:5120',
        ]);

        if($validator->fails()){
            return view('/upload');
        }else{
            $files[] = $request->file('gambar');
            $total = count($files);
            for($i = 0; i<$total; i++){
                $destinationPath = 'public/image';  //upload path
                $profileImage[$i] ="image".rand(0000,9999).".".$file[$i]->getClientOriginalExtension();
                $file[$i]->move($destinationPath, $profileImage);
                Showroom::create(array(
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'dagangan' => $request->dagangan,
                    'harga' => $request->harga,
                    'gambar' => $profileImage[$i]
                ));
            }
        }

        return view('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SR = Showroom::all();

        return view('/',['SR' = $SR]);
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

        return view('/upload');
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
        'harga' => 'required|integer'
        'gambar' => 'required|min:3|max:6',
        ]);

        if($validator->fails()){
            return view('/upload')
        }else{
            $files[] = $request->file('gambar');
            $total = count($files);
            for($i = 0; i<$total; i++){
                $destinationPath = 'public/image';  //upload path
                $profileImage[$i] ="image".rand(0000,9999).".".$file[$i]->getClientOriginalExtension();
                $file[$i]->move($destinationPath, $profileImage);
                $SR = Showroom::find($id)
                    $SR->judul => $request->judul;
                    $SR->deskripsi => $request->deskripsi;
                    $SR->dagangan => $request->dagangan;
                    $SR->harga => $request->harga;
                    $SR->gambar => $profileImage[$i];
                $SR->save();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SR = Showroom::find($id);
        $SR->delete();

        return redirect('/');
    }
}

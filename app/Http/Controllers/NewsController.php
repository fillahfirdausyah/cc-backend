<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = News::all();
        return view('admin.news.News', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.CreateNews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->validate($request, [
            'judul'     => 'required',
            'deskripsi' => 'required | min:8 | max:15',
            'kategori'  => 'required',
            'content'   => 'required',
       ]);

       $data = new News;
       $data->judul     = $request->judul;
       $data->deskripsi = $request->deskripsi;
       $data->kategori  = $request->kategori;
       $data->content   = $request->content;
       $data->save();

       return redirect('/admin/news/list')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = News::find($id);

        return view('admin.news.EditNews', compact('data'));
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
        $this->validate($request, [
            'judul'     => 'required',
            'kategori'  => 'required',
            'content'   => 'required'
        ]);

        $data = News::find($id);
        $data->judul    = $request->judul;
        $data->kategori = $request->kategori;
        $data->content  = $request->content;
        $data->save();

        return redirect('/admin/news/list')->with('success', 'Data Berhasil Diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = News::find($id);
        $data->delete();

        return redirect('/admin/news/list')->with('info', 'Data Berhasil Dihapus');
    }
}

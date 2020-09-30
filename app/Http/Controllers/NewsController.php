<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        // dd($request->gambar->extension());
        // dd();

       $this->validate($request, [
            'judul'     => 'required',
            'deskripsi' => 'required | min:8 | max:25',
            'kategori'  => 'required',
            'cover'     => 'required | mimes:jpeg,jpg,png,svg',
            'content'   => 'required',
       ]);

       $imgName = 'image/Admin/News/' . $request->cover->getClientOriginalName() . '-' . time() . '.' . $request->cover->extension();
       $request->cover->move(public_path('image/Admin/News'), $imgName);

       $data = new News;
       $data->judul     = $request->judul;
       $data->deskripsi = $request->deskripsi;
       $data->kategori  = $request->kategori;
       $data->cover     = $imgName;
       $data->content   = $request->content;
       $data->slug      = Str::slug($request->judul);
       $data->save();

       return redirect('/admin/news/list')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = News::where('slug', $slug)->first();

        return view('admin.news.Show', compact('data'));
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
        // dd($request->cover->extension());
        $this->validate($request, [
            'judul'     => 'required',
            'deskripsi' => 'required | min:8 | max:25',
            'kategori'  => 'required',
            'cover'     => 'mimes:jpeg,jpg,png,svg',
            'content'   => 'required',
        ]);

        if($request->file('cover')){

            $imgName = 'image/Admin/News/' . $request->cover->getClientOriginalName() . '-' . time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('image/Admin/News'), $imgName);

            $data = News::find($id);
            $data->judul     = $request->judul;
            $data->deskripsi = $request->deskripsi;
            $data->kategori  = $request->kategori;
            $data->cover     = $imgName;
            $data->content   = $request->content;
            $data->save();

        }    

        $data = News::find($id);
        $data->judul     = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->kategori  = $request->kategori;
        $data->content   = $request->content;
        $data->save();
        
        // return response($data);
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

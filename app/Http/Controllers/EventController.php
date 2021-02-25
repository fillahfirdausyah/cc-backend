<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('privilege');
    }

    public function index()
    {   
        $data = Event::all();
        return view('admin.event.Event', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.CreateEvent');
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
            'tanggal'   => 'required',
            'cover'     => 'required | mimes:jpeg,jpg,png,svg',
            'content'   => 'required',
        ]);

        $imgName = 'image/Admin/Event/' . $request->cover->getClientOriginalName() . '-' . time() . '.' . $request->cover->extension();
        $request->cover->move(public_path('image/Admin/Event'), $imgName);

        $data = new Event;
        $data->judul    = $request->judul;
        $data->cover    = $imgName;
        $data->kategori = $request->kategori;
        $data->content  = $request->content;
        $data->tanggal  = $request->tanggal;
        $data->slug      = Str::slug($request->judul);
        $data->save();

        return redirect('/admin/event/list')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = Event::find($id);

        return view('admin.event.EditEvent', compact('data'));
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
            'content'   => 'required',
        ]);

        $data = Event::find($id);
        $data->judul   = $request->judul;
        $data->content = $request->content;
        $data->save();

        return redirect('/admin/event/list')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Event::find($id);
        $data->delete();

        return redirect('/admin/event/list')->with('info', 'Data Berhasil Dihapus');
    }
}

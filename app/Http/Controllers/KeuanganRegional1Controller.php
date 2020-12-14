<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Regional1;

class KeuanganRegional1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Regional1::latest()->get();
        return view('admin.keuangan.Region1', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = "/admin/keuangan/store/regional1";
        return view('admin.keuangan.CreateKeuangan', compact('route'));
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
            'nama'      => 'required',
            'jumlah'    => 'required | numeric',
            'kategori'  => 'required'
        ]);

        $data = new Regional1;
        $data->nama     = $request->nama;
        $data->jumlah   = $request->jumlah;
        $data->kategori = $request->kategori;
        $data->save();

        return redirect('/admin/keuangan/regional1')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {

            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        if(request()->kategori == "Semua") {
            $data = Regional1::latest()->whereBetween('created_at', [$start, $end])->get();
        }else {
            $data = Regional1::latest()->where('kategori', request()->kategori)->whereBetween('created_at', [$start, $end])->get();
        }
        return view('admin.keuangan.Region1', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Regional1::find($id);

        return view('admin.keuangan.EditKeuangan', compact('data'));
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
            'nama'   => 'required',
            'jumlah' => 'required | numeric'
        ]);

        $data = Regional1::find($id);
        $data->nama     = $request->nama;
        $data->jumlah   = $request->jumlah;
        $data->kategori = $request->kategori;
        $data->save();

        return redirect('/admin/keuangan')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Regional1::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}

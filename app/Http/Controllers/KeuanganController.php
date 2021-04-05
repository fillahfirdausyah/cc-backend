<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Models\TotalKeuangan;
use App\Models\User;
use App\Models\Region;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

// class Saldo {
//     var $total = [];
// }

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $dataPemasukan = Region::addSelect(['totalPendapatan' => Keuangan::selectRaw('sum(jumlah) as total')->whereColumn('region_id', 'regions.id')
        ->Where('status', 'Lunas')->where('tipe_transaksi', 'pemasukan')->groupBy('region_id')])->orderBy('totalPendapatan', 'DESC')->get();
        $dataPengeluaran = Region::addSelect(['totalPengeluaran' => Keuangan::selectRaw('sum(jumlah) as total')->whereColumn('region_id', 'regions.id')
        ->where('tipe_transaksi', 'pengeluaran')->groupBy('region_id')])->orderBy('totalPengeluaran', 'DESC')->get();   

        $saldo = Region::addSelect(['Saldo' => Keuangan::selectRaw('jumlah')] ,'')->orderBy('Saldo', 'DESC')->get();

        dd($saldo);
        $chart  = $dataPemasukan->toArray();
       
        

    //    $saldo = new Saldo;

    //    foreach($dataPengeluaran as $index => $p) {
    //            $saldo->total[$index] = ['region' => $p->region, 'saldo' => $p->totalPengeluaran];
    //            // $l = $p->totalPengeluaran;
    //     }

    //    for($i = 0; $i < 5; $i++) {
    //     $saldo->total[$i] = ['region' => 3 + $i, 'saldo' => 900 + $i];
    //    }

    //    dd($saldo);


        return view('admin.keuangan.Keuangan', compact('chart', 'dataPemasukan', 'dataPengeluaran'));
    }

    public function create()
    {

        $region = Region::all();
        return view('admin.keuangan.CreateKeuangan', compact('region'));
    }

    public function filter_name(Request $request)
    {
        $region_id = $request->id;
        if($region_id != "kosong"){
            $user = Region::find($region_id)->user()->get();
            $html = ["<option value='kosong'>Pilih....</option>"];
            foreach ($user as $u) {
                array_push($html, "<option value='".$u->id."'>".$u->name."</option>");
            }
        }else{
            $html[] = NULL;
        }

        return $html;
    }

    public function getEmail(Request $request)
    {

        $userID = $request->id;
        if($userID != 'kosong') {
            $email = User::find($userID)->email;
        }else {
            $email = '';
        }
        

        return response()->json($email);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jumlah'    => 'required | numeric',
            'kategori'  => 'required',
            'nama'      => 'required',
            'region'    => 'required',
            'status'    => 'required'
        ]);

        $user = User::where('email', $request->email)->get();

        foreach ($user as $u) {
            $id    = $u->id;
            $name  = $u->name;
        }

        $data = new Keuangan;
        $data->region_id        = $request->region; 
        $data->user_id          = $id;
        $data->tipe_transaksi   = 'pemasukan';
        $data->nama             = $name;
        $data->jumlah           = $request->jumlah;
        $data->status           = $request->status;
        $data->kategori         = $request->kategori;
        $data->email            = $request->email;
        $data->save();

        return redirect('/admin/keuangan/pemasukan')->with('success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $region = Region::all();
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if ($request->date != '') {

            $date = explode(' - ' ,$request->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        if($request->region == 0 && $request->kategori == "Semua") {
            $data = Keuangan::latest()->whereBetween('created_at', [$start, $end])->where('tipe_transaksi', 'pemasukan')->get();
        }else if($request->region == 0 && $request->kategori == $request->kategori) {
            $data = Keuangan::latest()->where('kategori', $request->kategori)->whereBetween('created_at', [$start, $end])->where('tipe_transaksi', 'pemasukan')->get();
        }
        else if($request->region == $request->region && $request->kategori == "Semua") {
            $data = Keuangan::latest()->where('region_id', $request->region)->whereBetween('created_at', [$start, $end])->where('tipe_transaksi', 'pemasukan')->get();
        }else {
            $data = Keuangan::latest()->where('kategori', $request->kategori)->where('region_id', $request->region)->whereBetween('created_at', [$start, $end])->where('tipe_transaksi', 'pemasukan')->get();
        }

        return view('admin.keuangan.Pemasukan', compact('data', 'region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Keuangan::find($id);
        $region = Region::all();

        return view('admin.keuangan.EditKeuangan', compact('data', 'region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $regid)
    {

        $this->validate($request, [
            'jumlah'    => 'required | numeric',
            'kategori'  => 'required',
            'nama'      => 'required',
            'region'    => 'required',
            'status'    => 'required'
        ]);

        $user = User::where('email', $request->email)->get();

        foreach ($user as $u) {
            $uid    = $u->id;
            $name  = $u->name;
        }

        $data = Keuangan::find($id);
        $data->region_id = $request->regid; 
        $data->user_id   = $uid;
        $data->nama      = $name;
        $data->jumlah    = $request->jumlah;
        $data->status    = $request->status;
        $data->kategori  = $request->kategori;
        $data->email     = $request->email;
        $data->save();

        return redirect('/admin/keuangan/pemasukan')->with('success', 'Data Berhasil Disimpan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Keuangan::find($id);
        $total = TotalKeuangan::where('keuangan_id', $data->id)->delete();
        $data->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    public function pemasukanIndex() {
        $data   = Keuangan::whereBetween('created_at', 
        [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth()])->where('tipe_transaksi', 'pemasukan')->latest()->get();
        $region = Region::all();
        return view('admin.keuangan.Pemasukan', compact('data', 'region'));
    }

    public function pemasukanShow($id) {
        $keuangan = Keuangan::find($id);

        $data = $keuangan->load('region');

        return response()->json($data);
    }

    public function pemasukanVerify($id, $regid) {
        $data = Keuangan::find($id);

        $data->status = 'Lunas';
        $data->save();

        return redirect()->back()->with('success', 'Berhasil Diverifikasi');
    }

    // Pengeluaran

    public function pengeluaranIndex() {

        $data = Keuangan::where('tipe_transaksi', 'pengeluaran')->get();

        return view('admin.keuangan.pengeluaran.Pengeluaran', compact('data'));
    }

    public function pengeluaranAdd() {
        $region = Region::all();

        return view('admin.keuangan.pengeluaran.Create', compact('region'));
    }

    public function getSaldo(Request $request) {
        
        $region = Region::find($request->id);

        $data = $region->total()->get();

        return response()->json($data);

    }

    public function pengeluaranStore(Request $request) {
        $this->validate($request, [
            'nama'      => 'required',
            'region'    => 'required',
            'jumlah'    => 'required | numeric',
            'kategori'  => 'required',
        ]);

        $data = new Keuangan;
        $data->region_id        = $request->region;
        $data->tipe_transaksi   = 'pengeluaran';
        $data->nama             = $request->nama;
        $data->jumlah           = $request->jumlah;
        $data->kategori         = $request->kategori;
        $data->save();

        return redirect('/admin/keuangan/pengeluaran')->with('success', 'Data Berhasil Ditambahkan');
    }

}

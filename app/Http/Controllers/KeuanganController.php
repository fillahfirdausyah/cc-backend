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


class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = TotalKeuangan::with('region')->groupBy('region_id')->selectRaw('sum(jumlah) as total, region_id')->pluck('total', 'region_id');
        // $data   = TotalKeuangan::with('region')->get();
        dd($data);
        return view('admin.keuangan.Keuangan', compact('data'));
    }

    public function graphic()
    {

        $event_money = Keuangan::select(
                    DB::raw('sum(jumlah) as amount_event'),
                    DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
                        )
                        ->where("kategori", "Event")
                        ->where("created_at", ">", \Carbon\Carbon::now()->subMonths(1))
                        ->groupBy('months')
                        ->orderBy('created_at', 'asc')
                        ->get();

        $mingguan_money = Keuangan::select(
                        DB::raw("sum(jumlah) as amount_mingguan"),
                        DB::raw("DATE_FORMAT(created_at,'%M %Y') as month")
                        )
                        ->where("kategori", "Mingguan")
                        ->where("created_at", ">", \Carbon\Carbon::now()->subMonths(1))
                        ->groupBy("month")
                        ->get();

        return response()->json(["data1" => $event_money, "data2" => $mingguan_money], 200);
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
        $data->region_id = $request->region; 
        $data->user_id   = $id;
        $data->nama      = $name;
        $data->jumlah    = $request->jumlah;
        $data->status    = $request->status;
        $data->kategori  = $request->kategori;
        $data->email     = $request->email;

        if($data->status == 'Lunas') {
            $data->save();
            $total = new TotalKeuangan;
            $total->region_id = $request->region;
            $total->keuangan_id = $data->id;
            $total->jumlah = $request->jumlah;
            $total->save();
            return redirect('/admin/keuangan/pemasukan')->with('success', 'Data Berhasil Ditambahkan');
        }else {
            $data->save();
            return redirect('/admin/keuangan/pemasukan')->with('success', 'Data Berhasil Ditambahkan');
        }

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
            $data = Keuangan::latest()->whereBetween('created_at', [$start, $end])->get();
        }else if($request->region == 0 && $request->kategori == $request->kategori) {
            $data = Keuangan::latest()->where('kategori', $request->kategori)->whereBetween('created_at', [$start, $end])->get();
        }
        else if($request->region == $request->region && $request->kategori == "Semua") {
            $data = Keuangan::latest()->where('region_id', $request->region)->whereBetween('created_at', [$start, $end])->get();
        }else {
            $data = Keuangan::latest()->where('kategori', $request->kategori)->where('region_id', $request->region)->whereBetween('created_at', [$start, $end])->get();
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
        

        if($data->status == 'Lunas') {
            $data->save();
            $total = new TotalKeuangan;
            $total->region_id = $regid;
            $total->keuangan_id = $data->id;
            $total->jumlah = $request->jumlah;
            $total->save();
        }

        return redirect('/admin/pemasukan/keuangan')->with('success', 'Data Berhasil Disimpan');

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
        $total = TotalKeuangan::find($data->id);
        $data->delete();
        $total->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    public function pemasukanIndex() {
        $data   = Keuangan::whereBetween('created_at', 
        [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->latest()->get();
        $region = Region::all(); 

        return view('admin.keuangan.Pemasukan', compact('data', 'region'));
    }

    public function pengeluaranIndex() {


        return view('admin.keuangan.Pengeluaran');
    }
}

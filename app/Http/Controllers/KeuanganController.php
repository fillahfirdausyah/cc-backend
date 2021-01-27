<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Keuangan;
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
        $data   = Keuangan::latest()->get();
        $region = Region::all(); 


        return view('admin.keuangan.Keuangan', compact('data', 'region'));
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
                  ->get();

        $mingguan_money = Keuangan::select(
                        DB::raw("sum(jumlah) as amount_mingguan"),
                        DB::raw("DATE_FORMAT(created_at,'%M %Y') as month")
                        )
                        ->where("kategori", "Mingguan")
                        ->where("created_at", ">", \Carbon\Carbon::now()->subMonths(1))
                        ->groupBy("month")
                        ->get();

        return response()->json(["data1" => $event_money, "data2" => $mingguan_money]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = "/admin/keuangan/store/";
        $region = Region::all();
        return view('admin.keuangan.CreateKeuangan', compact('region'));
    }

    public function filter_name(Request $request)
    {
        $region_id = $request->id;
        if($region_id != "kosong"){
            $user = Region::find($region_id)->user()->get();
            foreach ($user as $u) {
                $html[] = "<option value='".$u->email."'>".$u->email."</option>";
            }
        }else{
            $html[] = NULL;
        }

        return $html;
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
            'jumlah'    => 'required | numeric',
            'kategori'  => 'required',
            'email'     => 'required | email',
            'region'    => 'required'
        ]);

        $name = User::select('name')->where('email', $request->email)->get();
        foreach ($name as $n) {
            $nama = $n->name;
        }

        $data = new Keuangan;
        $data->region_id = $request->region; 
        $data->nama      = $nama;
        $data->jumlah    = $request->jumlah;
        $data->kategori  = $request->kategori;
        $data->email     = $request->email; 
        $data->save();

        return redirect('/admin/keuangan/')->with('success', 'Data Berhasil Ditambahkan');
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
        }else if($request->region == $request->region && $request->kategori == "Semua") {
            $data = Keuangan::latest()->where('region_id', $request->region)->whereBetween('created_at', [$start, $end])->get();
        }else {
            $data = Keuangan::latest()->where('kategori', $request->kategori)->where('region_id', $request->region)->whereBetween('created_at', [$start, $end])->get();
        }
        return view('admin.keuangan.Keuangan', compact('data', 'region'));
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
            'jumlah'    => 'required | numeric',
            'kategori'  => 'required',
            'email'     => 'required | email',
            'region'    => 'required'
        ]);

        $name = User::select('name')->where('email', $request->email)->get();
        foreach ($name as $n) {
            $nama = $n->name;
        }
        
        $data = Keuangan::find($id);
        $data->region_id = $request->region; 
        $data->nama      = $nama;
        $data->jumlah    = $request->jumlah;
        $data->kategori  = $request->kategori;
        $data->email     = $request->email; 
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
        $data = Keuangan::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}

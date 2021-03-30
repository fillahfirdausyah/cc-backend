<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Keuangan;
use App\Events\KartuIuran;

class KartuIuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userRegion = $user->region()->get();
        $iuran = $user->keuangan()->get();

        return view('member.KartuIuran', compact('user', 'userRegion', 'iuran'));
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
    public function store(Request $request, $regid)
    {

        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'region'    => 'required',
            'jumlah'    => 'required | numeric',
            'kategori'  => 'required',
            'bukti'     => 'required | mimes:jpeg,jpg,png'
        ]);

        if($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0]);
         }

        $user = User::where('email', $request->email)->get();

        foreach ($user as $u) {
            $id    = $u->id;
        }

        $buktiIuran =  'BUKTI-' . $request->uid . '-' . time() . '.' . $request->bukti->extension();
         $request->bukti->move(public_path('image/Member/Keuangan/'), $buktiIuran);

        $data = new Keuangan;
        $data->region_id = $regid; 
        $data->user_id   = $id;
        $data->email     = $request->email;
        $data->nama      = $request->nama;
        $data->jumlah    = $request->jumlah;
        $data->kategori  = $request->kategori;
        $data->status    = 'pending';
        $data->bukti     = $buktiIuran;
        $data->save();

        event(new KartuIuran($data));

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

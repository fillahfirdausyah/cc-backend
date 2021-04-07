<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Events\NotifSeller;
use App\Events\NotifBuyer;
use App\Models\Merchandise;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaksi::whereHas('buyer', function(Builder $q){
                            $q->where('buyer_id', Auth::id());
                        })->with(['transactionable', 'seller'])->get();
        return view('showroom2.transaction', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_data = $request->all();
        $validator = Validator::make($input_data, [
            'amount' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $t = new Transaksi();
        $t->transactionable_id = $request->item_id;
        $t->seller_id = $request->seller_id;
        $t->buyer_id = $request->buyer_id;
        $t->amount = $request->amount;
        $t->save();

        event(new NotifSeller($t));
        
        // event(new NotifSeller($t));
        return redirect('/showroom/transaction')->with('status', 'Telah ditambahkan ke transaksi');
    }

    public function confirm(Request $request)
    {
        $t = Transaksi::findOrFail($request->id);
        $t->confirmed = Carbon::now();
        $t->save();
        
        event(new NotifBuyer($t));
        // NotifBuyer::dispatch($t);
        return redirect()->back();
    }

    public function received(Request $request)
    {
        $t = Transaksi::find($request->id);
        $t->received = Carbon::now();
        $t->status = 'diterima';
        // event(new NotifSeller(array($t)));
        $t->save();

        return redirect()->back();
    }

    public function transfer(Request $request)
    {
        $destinationPath = 'assets/vendor/showroom/assets/images/bukti_transfer/'; 
        $profileImage ="BuktiTransfer-".Str::slug($request->id, '-').".".$request->payment->extension();
        $request->payment->move($destinationPath, $profileImage);

        $t = Transaksi::find($request->id);
        $t->payment = $profileImage;
        $t->save();

        // event(new NotifSeller(array($t)));

        return redirect()->back();
    }

    public function edit($id)
    {
    }

    public function full(Request $request)
    {
        $t = Transaksi::find($request->transaction_id);
        $t->status = 'lunas & dikirim';
        $t->save();

        // event(new NotifBuyer(array($t)));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $t = Transaksi::find($id)->where('payment', NULL);
        if($t != NULL){
            $t->delete();

            return redirect()->back();
        }

        $transaksi = Transaksi::where('created_at', '>=',Carbon::now()->subMinutes(1440)->toDateTimeString())
                    ->whereNull('confirmed')
                    ->whereNull('payment')
                    ->delete();   
    }

    public function notifBuyer(Request $request)
    {
        $notif = Transaksi::where('buyer_id', $request->buyer_id)->with('transactionable')->get();

        return response()->json(['data' => $notif]);
    }

    public function notifSeller(Request $request)
    {
        $notif = Transaksi::where('seller_id', $request->seller_id)->with('transactionable')->get();

        return response()->json(['data' => $notif]);
    }
}

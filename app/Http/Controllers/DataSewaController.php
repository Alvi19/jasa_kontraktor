<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Payment;
use Illuminate\Http\Request;

class DataSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bangunan::where('client_id', auth()->user()->client->id)->get();
        return view('data-sewa.index', compact('data'));
    }

    public function payment($id)
    {
        $data = Payment::find($id);
        // dd($data);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $id,
                'gross_amount' => $data->amount,
            ),
            'customer_details' => array(
                'name' => auth()->user()->name,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);

        return view('data-sewa.payment', compact('data', 'snapToken'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha15", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $data = Payment::find($request->id);
                $data->update(['status' => 'Paid']);
            }
        }
    }

    public function postSuksesPayment($id)
    {
        $data = Bangunan::find($id);
        // dd($data);
        $payment =  Payment::create([
            'bangunan_id' => $id,
            'amount' => $data->harga,
            'payment_date' => now(),
        ]);

        return redirect()->route('data_client.sukses', $payment->id);
    }

    // public function contractorProgress()
    // {
    //     return view('data-sewa.riwayat');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

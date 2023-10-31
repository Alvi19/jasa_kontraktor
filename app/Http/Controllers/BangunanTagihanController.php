<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\BangunanTagihan;
use Illuminate\Http\Request;

use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;

class BangunanTagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Bangunan $bangunan)
    {
        $data = $bangunan->tagihan()->orderByDesc('created_at')->paginate(10);

        $data->each(function ($item) {
            Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));

            $apiInstance = new InvoiceApi();

            if ($item->xendit_status === 'PENDING') {
                $result = $apiInstance->getInvoiceById($item->xendit_id);

                $item->update([
                    'xendit_status' => $result->getStatus(),
                ]);

                if ($result->getStatus() === 'PAID' || $result->getStatus() === 'SETTLED') {
                    $item->update([
                        'status' => 'dibayar',
                        'tanggal_pembayaran' => now(),
                    ]);
                }
            }
        });

        return view('sewa.tagihan.index', compact('bangunan', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Bangunan $bangunan)
    {
        return view('sewa.tagihan.create', compact('bangunan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Bangunan $bangunan)
    {
        $data = $request->validate([
            'nama_tagihan' => 'required',
            'harga' => 'required|numeric',
        ]);

        $bangunan->tagihan()->create($data);

        return redirect()->route('data_client.tagihan.index', $bangunan);
    }

    /**
     * Display the specified resource.
     */
    public function show(BangunanTagihan $tagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bangunan $bangunan, BangunanTagihan $tagihan)
    {
        $data = $tagihan;
        return view('sewa.tagihan.edit', compact('bangunan', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bangunan $bangunan, BangunanTagihan $tagihan)
    {
        $data = $request->validate([
            'nama_tagihan' => 'required',
            'harga' => 'required|numeric',
        ]);

        $tagihan->update($data);

        return redirect()->route('data_client.tagihan.index', $bangunan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bangunan $bangunan, BangunanTagihan $tagihan)
    {
        $tagihan->delete();

        return redirect()->route('data_client.tagihan.index', $bangunan);
    }

    public function pay(Bangunan $bangunan, BangunanTagihan $tagihan)
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));

        $apiInstance = new InvoiceApi();

        if ($tagihan->xendit_status === 'PAID' || $tagihan->xendit_status === 'SETTLED') {
            return abort(404);
        };

        if ($tagihan->xendit_status === 'EXPIRED') {
            $create_invoice_request = [
                "external_id" => "kontraktor",
                "description" => "xendit test",
                "amount" => $tagihan->harga,
                "invoice_duration" => 172800,
                "currency" => "IDR",
                'success_redirect_url' => route('data_client.tagihan.pay_success', compact('bangunan', 'tagihan')),
                'failure_redirect_url' => route('data_client.tagihan.pay_failed', compact('bangunan', 'tagihan')),
                "customer" => [
                    'given_names' => auth()->user()->nama_lengkap,
                    'surname' => auth()->user()->nama_lengkap,
                    'mobile_number' => auth()->user()->no_wa,
                ]
            ];

            try {
                $result = $apiInstance->createInvoice($create_invoice_request);

                $tagihan->update([
                    'xendit_id' => $result->getId(),
                    'xendit_invoice_url' => $result->getInvoiceUrl(),
                    'xendit_status' => $result->getStatus(),
                ]);
            } catch (\Xendit\XenditSdkException $e) {
                echo 'Exception when calling InvoiceApi->createInvoice: ', $e->getMessage(), PHP_EOL;
                echo 'Full Error: ', json_encode($e->getFullError()), PHP_EOL;
            }
        }

        return redirect($tagihan->xendit_invoice_url);
    }

    public function paySuccess(Bangunan $bangunan, BangunanTagihan $tagihan)
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));

        $apiInstance = new InvoiceApi();

        if ($tagihan->xendit_status === 'PENDING') {
            $result = $apiInstance->getInvoiceById($tagihan->xendit_id);

            $tagihan->update([
                'xendit_status' => $result->getStatus(),
            ]);

            if ($result->getStatus() === 'PAID' || $result->getStatus() === 'SETTLED') {
                $tagihan->update([
                    'status' => 'dibayar',
                    'tanggal_pembayaran' => now(),
                ]);
            }
        }

        if ($tagihan->xendit_status === 'PAID' || $tagihan->xendit_status === 'SETTLED') {
            $tagihan->update([
                'status' => 'dibayar',
                'tanggal_pembayaran' => now(),
            ]);

            return view('sewa.tagihan.success', compact('bangunan', 'tagihan'));
        } else {
            return abort(404);
        }
    }

    public function payFailed(Bangunan $bangunan, BangunanTagihan $tagihan)
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));

        $apiInstance = new InvoiceApi();

        if ($tagihan->xendit_status === 'PENDING') {
            $result = $apiInstance->getInvoiceById($tagihan->xendit_id);

            $tagihan->update([
                'xendit_status' => $result->getStatus(),
            ]);

            if ($result->getStatus() === 'PAID' || $result->getStatus() === 'SETTLED') {
                $tagihan->update([
                    'status' => 'dibayar',
                    'tanggal_pembayaran' => now(),
                ]);
            }
        }

        if ($tagihan->xendit_status === 'EXPIRED') {
            return view('sewa.tagihan.failed', compact('bangunan', 'tagihan'));
        } else {
            return abort(404);
        }
    }
}

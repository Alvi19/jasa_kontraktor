<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Kontraktor;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();


        $data = DB::table('users')
            ->select('users.id', 'users.nama_lengkap')
            ->join('messages', function ($join) use ($user) {
                $join->on(function ($query) use ($user) {
                    $query->on('users.id', '=', 'messages.sender_id')
                        ->where('messages.receiver_id', '=', $user->id);
                })->orOn(function ($query) use ($user) {
                    $query->on('users.id', '=', 'messages.receiver_id')
                        ->where('messages.sender_id', '=', $user->id);
                });
            })->distinct()->get();

        // $user->chats->pluck('receiver_id')->concat($user->chats->pluck('sender'))->unique('id');

        // $data = User::whereHas('chats', function ($query) use ($user) {
        //     $query->where('receiver_id', $user->id)
        //         ->orWhere('sender_id', $user->id);
        // })
        //     // ->where('id', '!=', $user->id)
        //     ->get();
        // dd($data);
        // $data = Message::where('sender_id', Auth::user()->id)->orwhere('receiver_id', Auth::user()->id)->orderBy('created_at', 'asc')->groupBy('receiver_id')->get();

        // dd(Auth::user()->id);


        return view('chat.index', compact('data'));

        // $data = Client::where('client_id', auth()->user()->client->id)->get();
        // dd(auth()->user());
        // if (auth()->user()->status == "kontraktor") {
        //     $data = Message::where('kontraktor_id', auth()->user()->kontraktor->id)->get();
        // } else {
        //     $data = Message::where('client_id', auth()->user()->client->id)->get();
        // }

        // $data = Client::where('status', 'client')->get();

        // return view('data-client.chat', compact('data'));
    }

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
        // if (Auth::user()->status == 'client') {
        $data = User::findOrFail($id);

        $data = Message::whereIn('sender_id', [Auth::user()->id, $id])->whereIn('receiver_id', [Auth::user()->id, $id])->orderBy('created_at', 'asc')->get();

        // dd($data);
        return view('chat', compact('data', 'id'));
        // } else {
        // return redirect()->route('chat.index')->with('error', 'Anda hanya dapat mengakses obrolan sebagai klien.');
        // }
    }

    public function send(Request $request, $id)
    {
        // if (Auth::user()->status == 'client') {
        $request->validate([
            'content' => 'required',
        ]);

        $data = new Message();
        $data->sender_id = Auth::user()->id;
        $data->receiver_id = $id;
        $data->content = $request->content;
        $data->save();
        // dd($data);

        return redirect()->route('chat.show', $id)->with('success', 'Pesan berhasil dikirim.');
        // } else {
        //     return redirect()->route('chat.index')->with('error', 'Anda hanya dapat mengirim pesan sebagai klien.');
        // }
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

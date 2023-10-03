<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $validatedData = $this->validate($request, [
            'username'               => 'required',
            'password'               => 'required',
        ]);

        // dd($validatedData);
        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->route('kontraktor.index')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'username' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('username');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $validatedData = $this->validate($request, [
            'username'               => 'required',
            'password'               => 'required',
            'nama_lengkap'           => 'required',
            'no_wa'                  => 'required',
            'status'                 => 'required|in:kontraktor,client'
        ]);

        $validatedData['otp_register'] = random_int(1000, 9999);
        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);
        Auth::attempt($request->only('username', 'password'));

        return redirect()->route('otpVerification');
    }

    public function otpVerification()
    {
        return view('auth.otp_regis');
    }

    public function otpVerificationPost(Request $request)
    {
        $request->validate([
            'otp_register' => 'required|numeric',
        ]);

        $user = Auth::user();

        if ($user->otp_register === $request->otp_register) {
            // Verifikasi sukses
            $user->otp_register = null;
            $user->save();

            Session::flash('success', 'Verifikasi OTP berhasil.');
            return redirect()->route('kontraktor.index'); // Ganti dengan rute yang sesuai
        }

        return back()->withErrors([
            'otp' => 'Kode OTP tidak valid.',
        ]);
    }
}

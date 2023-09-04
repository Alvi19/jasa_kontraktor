<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ]);

        $validatedData['status'] = "kontraktor";
        $validatedData['otp_reguster'] = random_int(1000, 9999);
        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);

        return redirect()->route('auth.login');
    }
}

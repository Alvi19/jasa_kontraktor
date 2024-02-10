<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
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
            $auth = Auth::user();
            if ($auth->status == 'admin') {
                return redirect()->route('dashboard')
                    ->withSuccess('You have successfully logged in!');
            }

            if ($auth->status == 'client') {
                return redirect()->route('client.index')
                    ->withSuccess('You have successfully logged in!');
            } else {
                return redirect()->route('kontraktor.index')
                    ->withSuccess('You have successfully logged in!');
            }
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
            'username'               => 'required|unique:users,username',
            'password'               => 'required',
            'nama_lengkap'           => 'required',
            'email'                  => 'required|email|unique:users,email',
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

    // forgot password
    public function forgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function forgotPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // reset password
    public function resetPassword($token)
    {
        return view('auth.reset_password', ['token' => $token]);
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'token'                 => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => bcrypt($request->password),
                ])->setRememberToken(\Illuminate\Support\Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function profileStore(Request $request)
    {
        $validatedData = $this->validate($request, [
            'username'               => 'required',
            'password'               => 'nullable',
        ]);

        $user = Auth::user();
        $user->username = $request->username;
        if ($request->password) {
            $user->password = $request->password;
        }
        $user->save();

        return back()->withSuccess('Profile updated successfully!');
    }
}

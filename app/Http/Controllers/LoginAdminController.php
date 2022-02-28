<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginAdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest:admin', ['except' => 'logout']);
    // }

    public function formLogin()
    {
        return view('layouts.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = User::where('email', $request->email)->first();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::User()->role;
            if ($role == 'supervisor') {
                return redirect('/pilih');
            } else {
                return redirect('/dashboard');
            }
        }
        toast('Email dan Password salah', 'error');

        return back()->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

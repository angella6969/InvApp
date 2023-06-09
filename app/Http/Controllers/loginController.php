<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authentication.loginV');
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
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:6']
        ]);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 'active') {
                auth::logout();
                return redirect('/login')->with('loginError', 'Akun Sudah terdaftar!!! Silahkan Hubungi Admin untuk mengaktifkan Akun');
            } else {
                if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
                    $request->session()->regenerate();
                    return redirect()->intended('/dashboard');
                }
                if (Auth::user()->role_id == 3) {
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                }
                auth::logout();
                return redirect('/login')->with('loginError', 'Silahkan Hubungi Admin untuk mengaktifkan Akun');
            }
        }
        return back()->with('loginError', 'Login Failed!');
    }
    public function logout(Request $request)
    {
        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

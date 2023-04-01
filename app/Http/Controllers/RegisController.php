<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authentication.register');
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
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'username'=>['required','min:3','max:200','unique:users'],
            'email'=>['required','email:dns','unique:users'],
            'password'=>['required','min:5','max:255']
        ]);
        $validatedData['password'] = Hash::make( $validatedData['password']);
        User::create($validatedData);
        auth::logout();
        return redirect('/login')->with('success', 'registration successfull! Please Contact the Admin to Activated your akun');
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
        return view('welcome');
        // return view('authentication.register', [
        //     "users" => User::findOrFail($id),
        //     'roles' => role::all()
        // ]);
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

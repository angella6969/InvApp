<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\user;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('dashboard.index');

        return view('dashboard.categories.index',[
            "categories" => category::latest()
               ->paginate(20)
               ->withQueryString()
       ]);

    //    return view('authentication.index',[
    //     "users" => user::latest()
    //     //    ->paginate(20)
    //     //    ->withQueryString()
//    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create',[
            'categories' => category::all()
            // 'statuses' => status::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:255'
        ]);
        // dd($request);
        category::create($validatedData);
        return redirect('/dashboard')->with('success', 'Berhasil Menambahkan Data');
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
        return view('dashboard.categories.edit',[
            "categories" => category::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:255'
        ]);
        // dd($request);
        category::where('id',$id)->update($validatedData);
        return redirect('/dashboard')->with('success', 'Berhasil Merubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        category::destroy($id);
        return redirect('/dashboard')->with('success', 'Berhasil Menghapus Data');
    }
}

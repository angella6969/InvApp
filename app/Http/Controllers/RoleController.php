<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\role;
use App\Models\category;
use App\Http\Requests\StoreroleRequest;
use App\Http\Requests\UpdateroleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.role.index',[
            "roles" => role::latest()
               ->paginate(20)
               ->withQueryString()
               
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.role.create',[
            'roles' => role::all()
            // 'statuses' => status::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreroleRequest $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:255'
        ]);
        role::create($validatedData);
        return redirect('/dashboard/role')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    //     // return view('welcome');
    //     return view('dashboard.item.edit', [
    //         "items" => item::findOrFail($role),
    //         'categories' => category::all()
    //    ]);

        return view('dashboard.role.edit',[
            "roles" => role::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateroleRequest $request, string $role)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:255'
        ]);
        // dd($request);
        role::where('id',$role)->update($validatedData);
        return redirect('/dashboard/role')->with('success', 'Berhasil Merubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $role)
    {
        role::destroy($role);
        return redirect('/dashboard/role')->with('success', 'Berhasil Menghapus Data');
    }
}

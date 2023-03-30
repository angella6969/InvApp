<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\item;
use App\Models\role;
use App\Models\user;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::count();
        $users = user::count();
        $items = item::count();
        $items1 = item::where('name','East')->count();
        $items2 = item::where('name','Port')->count();
        $items3 = item::where('name','North')->count();
        $items4 = item::where('name','West')->count();
        $roles = role::count();
        return view('dashboard.index',compact('roles','categories','users','items','items2','items3','items4','items1'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
}

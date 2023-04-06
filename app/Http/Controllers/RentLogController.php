<?php

namespace App\Http\Controllers;

use App\Models\rent_log;
use App\Http\Requests\Storerent_logRequest;
use App\Http\Requests\Updaterent_logRequest;
use App\Models\item;
use App\Models\User;

class RentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = rent_log::with(['items','users','category'])->latest()
        ->paginate(20);
        // dd($logs);

        return view('dashboard.rentItem.index', [
            // "items" =>item::where('status', 'in stock')->with(['category','users']),
            "users" =>User::where('role_id', '!=', 1 )->get(),
            "logs" => rent_log::with(['items','users','category'])->latest()
               ->paginate(20)
               
       ]);
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
    public function store(Storerent_logRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(rent_log $rent_log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rent_log $rent_log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updaterent_logRequest $request, rent_log $rent_log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rent_log $rent_log)
    {
        //
    }
}

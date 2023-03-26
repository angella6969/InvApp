<?php

namespace App\Http\Controllers;

use App\Models\rent_log;
use App\Http\Requests\Storerent_logRequest;
use App\Http\Requests\Updaterent_logRequest;

class RentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

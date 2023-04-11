<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\item;
use App\Models\User;
use App\Models\rent_log;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Storerent_logRequest;
use App\Http\Requests\Updaterent_logRequest;
use Clockwork\Request\Request;

class RentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         
        return view('dashboard.rentItem.index', [
            "items" => item::all(),
            "users" => User::where('role_id', '!=', 1)
                            ->where('role_id', '!=', 2)
                            ->where('status', '!=', 'inactiv')
                            ->get(),
            
            "logs" => rent_log::with(['item', 'user'])
                ->orderBy('id', 'DESC')
                ->Filter(request(['search']))
                ->paginate(20)
        ]);
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
    public function store(Storerent_logRequest $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $items = item::findOrFail($request->item_id)->only('status');
        if ($items['status'] != 'in stock') {
            return redirect('/rent-item')->with('Fail', 'Item Has Been Rent');
        } else {

            $count = rent_log::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 7) {
                return redirect('/rent-item')->with('Fail', 'Melebihi Kuota Pinjam Barang');
            } else {
                try {
                    DB::beginTransaction();

                    rent_log::create($request->all());

                    $items = item::findOrFail($request->item_id);
                    $items->status = 'Terpinjam';
                    $items->save();
                    db::commit();

                    return redirect('/rent-item')->with('success', 'Success Rent Item');
                } catch (\Throwable $th) {
                    db::rollBack();
                }
            }
        }
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

    public function returnItem(string $id)
    {
        $request['return_date'] = Carbon::now()->toDateString();

        try {
            DB::beginTransaction();
            $logs = rent_log::findOrFail($id);
            $logs->actual_return_date =  Carbon::now()->toDateString();
            $logs->save();

            $items = item::findOrFail($logs['item_id']);
            $items->status = 'in Stock';
            $items->save();
            db::commit();
            
            return redirect('/rent-item')->with('success', 'Berhasil Mengembalikan Item');
        } catch (\Throwable $th) {
            db::rollBack();
        }
    }
}

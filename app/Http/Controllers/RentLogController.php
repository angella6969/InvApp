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
use Illuminate\Support\Facades\Cache;

class RentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expiration = 30;
        // // Ambil data user dari cache atau database
        $data = Cache::remember('my_data', $expiration, function () {
            return User::orderByRaw("SUBSTRING(name, 1, 3) ASC")
                ->where('role_id', '!=', 1)
                ->where('role_id', '!=', 2)
                ->where('status', '!=', 'inactiv')
                ->get();
        });

        // // Ambil data rent log dari cache atau database
        // $data1 = Cache::remember('my_data1', $expiration, function () {
        //     return rent_log::with(['item', 'user'])
        //         ->orderBy('id', 'DESC')
        //         ->filter(request(['search']))
        //         ->paginate(20);
        // });
        // $data2 = Cache::remember('my_data2', $expiration, function () {
        //     return Item::orderByRaw("SUBSTRING(name, 1, 3) ASC")->get();
        // });

        // // Kembalikan tampilan view dengan data yang telah diambil
        // return view('dashboard.rentItem.index', [
        //     'items' => $data2,
        //     'users' => $data,
        //     'logs' => $data1,
        // ]);

        return view('dashboard.rentItem.index', [
            "items" => item::orderByRaw("SUBSTRING(name, 1, 3) ASC")->get(),
            "users" => $data,

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

        $data  = [
            'user_id' => 'required',
            'item_id' => 'required',
        ];
        $validatedData = $request->validate($data);
        // $request['rent_date'] = Carbon::now()->toDateString();
        // $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $validatedData['rent_date'] = Carbon::now()->toDateString();
        $validatedData['return_date'] = Carbon::now()->addDay(3)->toDateString();


        $items = item::findOrFail($request->item_id)->only('status');

        if ($items['status'] != 'in stock') {
            return redirect('/rent-item')->with('Fail', 'Barang Tidak Tersedia, Silahkan Pilih yang lain');
        } else {

            $count = rent_log::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 7) {
                return redirect('/rent-item')->with('Fail', 'Melebihi Kuota Pinjam Barang');
            } else {
                try {
                    DB::beginTransaction();
                    rent_log::create($validatedData);
                    // rent_log::create($request->all());

                    $items = item::findOrFail($request->item_id);
                    $items->status = 'Terpinjam';
                    $items->save();
                    db::commit();

                    return redirect('/rent-item')->with('success', 'Berhasil Meminjam Barang');
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

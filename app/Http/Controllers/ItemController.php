<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\category;
use App\Http\Requests\StoreitemRequest;
use App\Http\Requests\UpdateitemRequest;
use Brick\Math\BigInteger;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.item.index', [
            "items" => item::latest()
               ->paginate(20)
               ->withQueryString()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.item.create', [
            'categories' => category::all()
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreitemRequest $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'item_code' =>'required|max:255|unique:items',
            'category_id'=>['required'],
        ]);
        // dd($request);
        item::create($validatedData);
        return redirect('/dashboard/item')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($item);
        return view('dashboard.item.edit', [
            "items" => item::findOrFail($id),
            'categories' => category::all()
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateitemRequest $request,string $item)
    {
        // $items = item::all();
        $items = item::findOrFail($item);
        $data = [
            'name'=> 'required|max:255',
            'category_id'=>['required'],
            'status'=>['required'],
        ];
        if ($request->item_code != $items->item_code) {
            $data['item_code'] = ['required','min:3','unique:items'];
        }
         
        $validatedData = $request->validate($data);
        item::where('id', (int)$item)->update($validatedData);

        return redirect('/dashboard/item')->with('success', 'Berhasil Merubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $item)
    {
        item::destroy($item);
        return redirect('/dashboard/item')->with('success', 'Berhasil Menghapus Data');
    }
}

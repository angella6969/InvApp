<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            "categories" => category::latest()
                ->paginate(20)
                ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'golongan' => 'required|max:255',
        ]);

        if (str_replace('.', '', $validatedData['golongan']) == '020603') {
            $validatedData['unit1'] = $request->input('unit1');

            $c = category::where('categoryCode', 'like', '02.06.03' . '.' . $validatedData['unit1'] . '%')->pluck('categoryCode')->max();
            if ($c != null) {
                $parts = explode('.', $c);
                $b = intval($parts[4]) + 1;
                $categoryCode = $validatedData['golongan'] . '.' . $validatedData['unit1'] . '.' . str_pad($b, 2, "0", STR_PAD_LEFT);
            } else {
                $categoryCode = $validatedData['golongan'] . '.' . $validatedData['unit1'] . '.' . '01';
            }
        } else {
            $validatedData['unit2'] = $request->input('unit2');

            $c = category::where('categoryCode', 'like', '01.06.02' . '.' . $validatedData['unit2'] . '%')->pluck('categoryCode')->max();
            if ($c != null) {
                $parts = explode('.', $c);
                $b = intval($parts[4]) + 1;
                $categoryCode = $validatedData['golongan'] . '.' . $validatedData['unit2'] . '.' . str_pad($b, 2, "0", STR_PAD_LEFT);
            } else {
                $categoryCode = $validatedData['golongan'] . '.' . $validatedData['unit2'] . '.' . '01';
            }
        }

        $categoryItem = category::where('categoryCode', $categoryCode)->value('categoryCode');

        if ($categoryItem != null) {
            return redirect('/categories/create')->with('fail', 'Kode Inventaris Sudah Terdaftar');
        }

        category::create($validatedData + ['categoryCode' => $categoryCode]);

        return redirect('/categories')->with('success', 'Berhasil Menambahkan Data');
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
        return view('dashboard.categories.edit', [
            "categories" => category::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => 'required|max:255'
        ];

        $validatedData = $request->validate($data);

        category::where('id', $id)->update($validatedData);
        return redirect('/categories')->with('success', 'Berhasil Merubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = category::findOrFail($id);
        try {
            $category->delete();
            return redirect('/categories')->with('success', 'Berhasil Menghapus Data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}




// nama web : sisdainvapp
// password : j5yYRsWv2g^JZGKXITk4




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
        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
                'golongan' => 'required|max:255',
                'unit' => 'required|max:255',
                'kode' => 'required|numeric',
            ]
        );

        $validatedData['categoryCode'] = $validatedData['golongan'] . '.' . $validatedData['unit'] . '.' . $validatedData['kode'];

        $a = $validatedData['categoryCode'];
        $c = str_replace('.', '', $a);
        $categoryItems = category::where('categoryCode', '=', $a)->value('categoryCode');
        $newCode = str_replace('.', '', $categoryItems);
        // dd($categoryItems);
        if ($categoryItems != null) {
            if ($c == $newCode) {
                return redirect('/categories/create')->with('fail', 'Kode Inventaris Sudah Terdaftar');
            } else {
                category::create($validatedData);
                return redirect('/categories')->with('success', 'Berhasil Menambahkan Data');
            }
        } else {
            category::create($validatedData);
            return redirect('/categories')->with('success', 'Berhasil Menambahkan Data');
        }
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
        $category = category::findOrFail($id);
        $data = [
            'name' => 'required|max:255'
        ];

        if ($request->categoryCode != $category->categoryCode) {
            $data['email'] = ['required', 'email:dns', 'min:3', 'unique:categories'];
        }
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

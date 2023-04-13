<?php

namespace App\Http\Controllers;


use App\Models\item;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreitemRequest;
use App\Http\Requests\UpdateitemRequest;
use App\Models\ItemImport;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.item.index', [
            "categories" => category::all(),
            "items" => item::with(['category'])
                ->orderBy('id', 'DESC')
                ->Filter(request(['search', 'categories', 'status']))
                ->paginate(20)
                ->withQueryString(),

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
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'item_code' => 'required|max:255|unique:items',
                'category_id' => ['required'],
                'brand' => ['required'],
                'location' => ['required'],
                'owner' => ['required'],
            ]);
            

            $code = $validatedData['category_id'];
            $items= category::findorfail($code)->only('name');
            if ($items['name'] =='Hardware') {
                $localcode = 'IN/E 123';
            } elseif ($items['name'] == 'Elektronik') {
                $localcode = 'IN/S 123';
            } elseif ($items['name'] == 'Software') {
                $localcode = 'IN/H 123';
            } elseif ($items['name'] == 'Hardware') {
                $localcode = 'IN/N 123';
            } else {
                $localcode = 'INW/N 123';
            }
            $validatedData['item_code'] = $localcode . ' ' . $validatedData['item_code'];

            item::create($validatedData);
            return redirect('/dashboard/item')->with('success', 'Berhasil Menambahkan Data');

            //     $items= item::all();

            // $validatedData = $request->validate([
            //     'name' => 'required|max:255',
            //     'item_code' => 'required|max:255|unique:items',
            //     'category_id' => ['required'],
            //     'brand' => ['required'],
            //     'location' => ['required'],
            //     'owner' => ['required'],
            // ]);

            // $code = $validatedData['category_id'];
            // $items= category::findorfail($code)->only('name');
            // dd($items['name']);

            // $localcode = '';
            // $codes = [
            //     1 => 'IN/E',
            //     2 => 'IN/S',
            //     3 => 'IN/H',
            //     4 => 'IN/N',
            // ];

            // if (isset($codes[$code])) {
            //     $localcode = $codes[$code];
            // } else {
            //     $localcode = 'INW/N';
            // }

            // $itemCode = $localcode . ' ' . $validatedData['item_code'];
            // $itemData = array_merge($validatedData, ['item_code' => $itemCode]);

            // $item = Item::create($itemData);
            // if ($item) {
            //     return redirect('/dashboard/item')->with('success', 'Berhasil Menambahkan Data');
            // } else {
            //     return redirect('/dashboard/item')->with('fail', 'Gagal Menambahkan Data');
            // }
        } catch (\Throwable $th) {
            return redirect('/dashboard/item')->with('fail', 'Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('dashboard.item.show', [
            "item" => item::with(['category'])->findOrFail($id),
            "items" => item::with(['category'])->latest()
                ->paginate(20)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        return view('dashboard.item.edit', [
            "items" => item::findOrFail($id),
            'categories' => category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateitemRequest $request, string $item)
    {

        $items = item::findOrFail($item);
        $data = [
            'name' => 'required|max:255',
            'category_id' => ['required'],
            'status' => ['required'],
            'brand' => ['required'],
            'location' => ['required'],
            'owner' => ['required'],
        ];
        if ($request->item_code != $items->item_code) {
            $data['item_code'] = ['required', 'min:3', 'unique:items'];
        }

        $validatedData = $request->validate($data);

        item::where('id', $item)->update($validatedData);

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

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new ItemImport, $file);
        dd($file);

        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}

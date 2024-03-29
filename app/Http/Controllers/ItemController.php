<?php

namespace App\Http\Controllers;


use App\Models\item;
use App\Models\category;
use App\Models\ItemImport;
use Illuminate\Http\Request;
use App\Imports\ItemImpoert1;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreitemRequest;
use App\Http\Requests\UpdateitemRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use League\Csv\Reader;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $a = item::select('name', 'image', 'brand', 'category_id', DB::raw('count(*) as total'))
            ->groupBy('name', 'image', 'brand', 'category_id')
            ->Filter(request(['search']))
            ->get();
        // dd($a);
        return view('dashboard.item.index', [
            "a" => $a,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category1 = category::where('categoryCode', 'like', '02.06.03.01' . '%')->get();
        $category2 = category::where('categoryCode', 'like', '02.06.03.02' . '%')->get();
        $category3 = category::where('categoryCode', 'like', '02.06.03.03' . '%')->get();
        $category4 = category::where('categoryCode', 'like', '02.06.03.04' . '%')->get();
        $category5 = category::where('categoryCode', 'like', '02.06.03.05' . '%')->get();
        $category6 = category::where('categoryCode', 'like', '02.06.03.06' . '%')->get();

        return view('dashboard.item.create', [
            'categories' => $category1,
            'categories1' => $category2,
            'categories2' => $category3,
            'categories3' => $category4,
            'categories4' => $category5,
            'categories5' => $category6,
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
                'category_id' => ['required', 'numeric'],
                'brand' => ['required'],
                'location' => ['required'],
                'owner' => ['required'],
                'unit' => ['required', 'numeric', 'min:1'],
                'image' => ['image', 'file', 'max:1024']
            ]);

            if ($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('image-store');
            }

            $itemCategory = category::where('id', $validatedData['category_id'])->value('categoryCode');
            $item = item::where('item_code', 'like', $itemCategory . '%')->pluck('item_code')->max();
            if ($item != null) {
                $parts = explode('.', $item);
                $b = intval($parts[5]) + 1;
                $itemCodePrefix = $itemCategory . '.';
            } else {
                $b = 1;

                $itemCodePrefix = $itemCategory . '.';
            }

            for ($i = 1; $i <= $validatedData['unit']; $i++) {
                $validatedData['item_code'] = $itemCodePrefix . str_pad($b++, 3, "0", STR_PAD_LEFT);
                item::create($validatedData);
            }

            return redirect('/dashboard/item')->with('success', 'Berhasil Menambahkan Data');
        } catch (\Throwable $th) {
            return redirect('/dashboard/item')->with('fail', 'Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $expiration = 5;
        $data1 = Cache::remember('my_data1', $expiration, function () {
            return category::orderByRaw('SUBSTRING(name,1,5) ASC')->get();
        });
        return view('dashboard.item.show', [
            "item" => item::with(['category'])->findOrFail($id),
            "items" => item::with(['category'])
                ->Filter(request(['search', 'categories', 'status']))
                ->latest()
                ->paginate(20),
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
            'status' => ['required'],
            'brand' => ['required'],
            'location' => ['required'],
            'owner' => ['required'],
            'image' => ['image', 'file', 'max:1024']
        ];

        $validatedData = $request->validate($data);

        if ($request->file('image')) {
            if ($items->image != null) {
                Storage::delete($items->image);
            }
            $validatedData['image'] = $request->file('image')->store('image-store');
        }

        item::where('id', $item)->update($validatedData);

        return redirect("/dashboard/item/$item")->with('success', 'Berhasil Merubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $item)
    {
        $item = item::findOrFail($item);
        try {

            if ($item->image) {
                Storage::delete($item->image);
            }

            $item->delete();
            return redirect()->back()->with('success', 'Berhasil Menghapus Data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function import(Request $request)
    {

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|file|mimes:csv,txt',
            ]);
            dd($$request->validate);
            DB::beginTransaction();
            try {
                $file = $request->file('file');

                Excel::import(new ItemImpoert1, $file);

                return redirect()->back()->with('success', 'Data imported successfully.');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        } else {
            return redirect()->back()->with('fail', 'Silahkan pilih file yang ingin diupload terlebih dahulu');
        }
    }
    public function detail(Request $request, $name, $category)
    {
        return view('dashboard.item.detail', [
            "items" => item::with(['category'])
                ->orderBy('id', 'DESC')
                ->Filter(request(['search', 'categories', 'status']))
                ->where('category_id', $category)
                ->where('name', $name)
                ->paginate(20)
                ->withQueryString(),
        ]);
    }
    public function massDestroy(Request $request, $name, $category)
    {
        try {
            // Lakukan penghapusan masal berdasarkan nama dan kategori

            $itemImage = item::select('image')->where('category_id', $category)
                ->where('name', $name)->value('image');
            if ($itemImage) {
                Storage::delete($itemImage);
            }
            Item::whereIn('name', [$name])
                ->whereIn('category_id', [$category])
                ->delete();

            return redirect()->back()->with('success', 'Berhasil Menghapus Data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }




    public function massEdit(string $id)
    {

        return view('dashboard.item.edit', [
            "items" => item::findOrFail($id),
            'categories' => category::all()
        ]);
    }
    public function massUpdate(Request $request, $name, $category)
    {
        dd('dalam pengembangan');
        try {
            // Lakukan penghapusan masal berdasarkan nama dan kategori

            $itemImage = item::select('image')->where('category_id', $category)
                ->where('name', $name)->value('image');
            if ($itemImage) {
                Storage::delete($itemImage);
            }
            Item::whereIn('name', [$name])
                ->whereIn('category_id', [$category])
                ->delete();

            return redirect()->back()->with('success', 'Berhasil Menghapus Data');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}

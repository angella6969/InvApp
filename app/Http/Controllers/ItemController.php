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
use League\Csv\Reader;
use Maatwebsite\Excel\Excel as ExcelExcel;

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

            $kom = '02.06.03';

            $komJar = $kom . '.' . '01';
            $mainframe = $komJar . '.' . '01';
            $miniKom = $komJar . '.' . '02';
            $lan = $komJar . '.' . '03';
            $internet = $komJar . '.' . '04';

            $perKom = $kom . '.' . '02';
            $pcUnit = $perKom . '.' . '01';
            $laptop = $perKom . '.' . '02';
            $notebook = $perKom . '.' . '03';
            $plamTop = $perKom . '.' . '04';

            $peralatanKomMain = $kom . '.' . '03';
            $cardReader = $peralatanKomMain . '.' . '01';
            $magneticTapeUnit = $peralatanKomMain . '.' . '02';
            $floppyDiskUnit = $peralatanKomMain . '.' . '03';
            $storageModulDisk = $peralatanKomMain . '.' . '04';
            $consolUnit = $peralatanKomMain . '.' . '05';
            $cpu = $peralatanKomMain . '.' . '06';
            $diskpark = $peralatanKomMain . '.' . '07';
            $hardCopyConsol = $peralatanKomMain . '.' . '08';
            $sesialPointer = $peralatanKomMain . '.' . '09';
            $linePrinter = $peralatanKomMain . '.' . '10';
            $ploter = $peralatanKomMain . '.' . '11';
            $hardDisk = $peralatanKomMain . '.' . '12';
            $keyboard = $peralatanKomMain . '.' . '13';

            $peralatanMiniKom = $kom . '.' . '04';
            $cardReaderMiniKom = $peralatanMiniKom . '.' . '01';
            $magneticTapeUnitMiniKom = $peralatanMiniKom . '.' . '02';
            $floppyDiskUnitMiniKom = $peralatanMiniKom . '.' . '03';
            $storageModulDiskMiniKom = $peralatanMiniKom . '.' . '04';
            $consolUnitMiniKom = $peralatanMiniKom . '.' . '05';
            $cpuMiniKom = $peralatanMiniKom . '.' . '06';
            $diskparkMiniKom = $peralatanMiniKom . '.' . '07';
            $hardDiskConsolMiniKom = $peralatanMiniKom . '.' . '08';
            $sesialPointerMiniKom = $peralatanMiniKom . '.' . '09';
            $linePrinterMiniKom = $peralatanMiniKom . '.' . '10';
            $computerCompatible = $peralatanMiniKom . '.' . '11';
            $ploterMiniKom = $peralatanMiniKom . '.' . '12';
            $hardDiskMiniKom = $peralatanMiniKom . '.' . '13';
            $keyboardMiniKom = $peralatanMiniKom . '.' . '14';

            $peralatanPC = $kom . '.' . '05';
            $cpuPc = $peralatanPC . '.' . '01';
            $monitor = $peralatanPC . '.' . '02';
            $printer = $peralatanPC . '.' . '03';
            $scanner = $peralatanPC . '.' . '04';
            $plotterPc = $peralatanPC . '.' . '05';
            $viewer = $peralatanPC . '.' . '06';
            $extermal = $peralatanPC . '.' . '07';
            $digizer = $peralatanPC . '.' . '08';
            $keyboardPc = $peralatanPC . '.' . '09';

            $peralatanJar = $kom . '.' . '06';
            $server = $peralatanJar . '.' . '01';
            $router =  $peralatanJar . '.' . '02';
            $hub =  $peralatanJar . '.' . '03';
            $modem =  $peralatanJar . '.' . '04';
            $networkInterfaceExternal =  $peralatanJar . '.' . '05';

            






            $code = $validatedData['category_id'];
            $categoryItems = category::findorfail($code)->only('name');

            if ($categoryItems['name'] == 'Mainframe') {
                $localcode = $mainframe;
            } elseif ($categoryItems['name'] == 'Mini Komputer') {
                $localcode = $miniKom;
            } elseif ($categoryItems['name'] == 'Local Area Network (LAN)') {
                $localcode = $lan;
            } elseif ($categoryItems['name'] == 'Internet') {
                $localcode = $internet;
            } elseif ($categoryItems['name'] == 'P.C. Unit') {
                $localcode = $pcUnit;
            } elseif ($categoryItems['name'] == 'Laptop') {
                $localcode = $laptop;
            } elseif ($categoryItems['name'] == 'Note Book') {
                $localcode = $notebook;
            } elseif ($categoryItems['name'] == 'Palm Top') {
                $localcode = $plamTop;
            } 
            
            
            elseif ($categoryItems['name'] == 'Card Reader') {
                $localcode = $cardReader;
            } elseif ($categoryItems['name'] == 'Magnetic Tape Unit') {
                $localcode = $magneticTapeUnit;
            } elseif ($categoryItems['name'] == 'Floppy Disk Unit') {
                $localcode = $floppyDiskUnit;
            } elseif ($categoryItems['name'] == 'Storage Modul Disk') {
                $localcode = $storageModulDisk;
            } elseif ($categoryItems['name'] == 'Console Unit') {
                $localcode = $consolUnit;
            } elseif ($categoryItems['name'] == 'CPU') {
                $localcode = $cpu;
            } elseif ($categoryItems['name'] == 'Disk Park') {
                $localcode = $diskpark;
            } elseif ($categoryItems['name'] == 'Hard Copy Console') {
                $localcode = $hardCopyConsol;
            } elseif ($categoryItems['name'] == 'Serial Pointer') {
                $localcode = $sesialPointer;
            } elseif ($categoryItems['name'] == 'Line Printer') {
                $localcode = $linePrinter;
            } elseif ($categoryItems['name'] == 'Ploter') {
                $localcode = $ploter;
            } elseif ($categoryItems['name'] == 'Hard Disk') {
                $localcode = $hardDisk;
            } elseif ($categoryItems['name'] == 'Keyboard') {
                $localcode = $keyboard;
            }

           

            //  elseif ($categoryItems['name'] == 'Card Reader Main') {
            //     $localcode = $cardReaderMiniKom;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == '') {
            //     $localcode = $hardDisk;
            // } else {
            //     $localcode = 'INW/N 123';
            // }
            $validatedData['item_code'] = $localcode . '.' . $validatedData['item_code'];
            dd( $validatedData['item_code']);
            // item::create($validatedData);
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

        // $csv = Reader::createFromPath($request->file('file')->getPathname());
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
}

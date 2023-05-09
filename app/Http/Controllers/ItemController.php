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
use League\Csv\Reader;
use Maatwebsite\Excel\Excel as ExcelExcel;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $expiration = 10;
        // // Ambil data user dari cache atau database
        // $data = Cache::remember('my_data', $expiration, function () {
        //     return item::with(['category'])
        //         ->orderBy('id', 'DESC')
        //         ->Filter(request(['search', 'categories', 'status']))
        //         ->paginate(20)
        //         ->withQueryString();
        // });

        // // Ambil data rent log dari cache atau database
        $data1 = Cache::remember('my_data1', $expiration, function () {
            return category::orderByRaw('SUBSTRING(name,1,5) ASC')->get();
        });
        // return view('dashboard.item.index', [
        //     "categories" =>  $data1,
        //     "items" => $data
        // ]);
        return view('dashboard.item.index', [
            "categories" =>  $data1,
            "items" => item::with(['category'])
                ->orderBy('id', 'DESC')
                ->Filter(request(['search', 'categories', 'status']))
                ->paginate(20)
                ->withQueryString(),
            // 'models' => $models

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.item.create', [
            'categories' => category::orderByRaw('SUBSTRING(UPPER(name),1,5) ASC')->get()
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
                'category_id' => ['required', 'numeric'],
                'brand' => ['required'],
                'location' => ['required'],
                'owner' => ['required'],
            ]);

            // dd($validatedData);

            // $kom = '02.06.03';

            // $komJar = $kom . '.' . '01';
            // $mainframe = $komJar . '.' . '01';
            // $miniKom = $komJar . '.' . '02';
            // $lan = $komJar . '.' . '03';
            // $internet = $komJar . '.' . '04';

            // $perKom = $kom . '.' . '02';
            // $pcUnit = $perKom . '.' . '01';
            // $laptop = $perKom . '.' . '02';
            // $notebook = $perKom . '.' . '03';
            // $plamTop = $perKom . '.' . '04';

            // $peralatanKomMain = $kom . '.' . '03';
            // $cardReader = $peralatanKomMain . '.' . '01';
            // $magneticTapeUnit = $peralatanKomMain . '.' . '02';
            // $floppyDiskUnit = $peralatanKomMain . '.' . '03';
            // $storageModulDisk = $peralatanKomMain . '.' . '04';
            // $consolUnit = $peralatanKomMain . '.' . '05';
            // $cpu = $peralatanKomMain . '.' . '06';
            // $diskpark = $peralatanKomMain . '.' . '07';
            // $hardCopyConsol = $peralatanKomMain . '.' . '08';
            // $sesialPointer = $peralatanKomMain . '.' . '09';
            // $linePrinter = $peralatanKomMain . '.' . '10';
            // $ploter = $peralatanKomMain . '.' . '11';
            // $hardDisk = $peralatanKomMain . '.' . '12';
            // $keyboard = $peralatanKomMain . '.' . '13';

            // $peralatanMiniKom = $kom . '.' . '04';
            // $cardReaderMiniKom = $peralatanMiniKom . '.' . '01';
            // $magneticTapeUnitMiniKom = $peralatanMiniKom . '.' . '02';
            // $floppyDiskUnitMiniKom = $peralatanMiniKom . '.' . '03';
            // $storageModulDiskMiniKom = $peralatanMiniKom . '.' . '04';
            // $consolUnitMiniKom = $peralatanMiniKom . '.' . '05';
            // $cpuMiniKom = $peralatanMiniKom . '.' . '06';
            // $diskparkMiniKom = $peralatanMiniKom . '.' . '07';
            // $hardPrinterMiniKom = $peralatanMiniKom . '.' . '08';
            // $plotterMiniKom = $peralatanMiniKom . '.' . '09';
            // $scannerMiniKom = $peralatanMiniKom . '.' . '10';
            // $computerCompatible = $peralatanMiniKom . '.' . '11';
            // $viewewr = $peralatanMiniKom . '.' . '12';
            // $digitzerMiniKom = $peralatanMiniKom . '.' . '13';
            // $keyboardMiniKom = $peralatanMiniKom . '.' . '14';

            // $peralatanPC = $kom . '.' . '05';
            // $cpuPc = $peralatanPC . '.' . '01';
            // $monitor = $peralatanPC . '.' . '02';
            // $printer = $peralatanPC . '.' . '03';
            // $scanner = $peralatanPC . '.' . '04';
            // $plotterPc = $peralatanPC . '.' . '05';
            // $viewer = $peralatanPC . '.' . '06';
            // $extermal = $peralatanPC . '.' . '07';
            // $digizer = $peralatanPC . '.' . '08';
            // $keyboardPc = $peralatanPC . '.' . '09';

            // $peralatanJar = $kom . '.' . '06';
            // $server = $peralatanJar . '.' . '01';
            // $router =  $peralatanJar . '.' . '02';
            // $hub =  $peralatanJar . '.' . '03';
            // $modem =  $peralatanJar . '.' . '04';
            // $netwareInterfaceExternal =  $peralatanJar . '.' . '05';





            // $code = $validatedData['category_id'];
            // $categoryItems = category::findorfail($code)->only('name');

            // //
            // if ($categoryItems['name'] == 'Mainframe') {
            //     $localcode = $mainframe;
            // } elseif ($categoryItems['name'] == 'Mini Komputer') {
            //     $localcode = $miniKom;
            // } elseif ($categoryItems['name'] == 'Local Area Network (LAN)') {
            //     $localcode = $lan;
            // } elseif ($categoryItems['name'] == 'Internet') {
            //     $localcode = $internet;
            // }

            // //
            // elseif ($categoryItems['name'] == 'P.C. Unit') {
            //     $localcode = $pcUnit;
            // } elseif ($categoryItems['name'] == 'Laptop') {
            //     $localcode = $laptop;
            // } elseif ($categoryItems['name'] == 'Note Book') {
            //     $localcode = $notebook;
            // } elseif ($categoryItems['name'] == 'Palm Top') {
            //     $localcode = $plamTop;
            // }


            // //
            // elseif ($categoryItems['name'] == 'Card Reader Komputer Mainframe') {
            //     $localcode = $cardReader;
            // } elseif ($categoryItems['name'] == 'Magnetic Tape Unit Komputer Mainframe') {
            //     $localcode = $magneticTapeUnit;
            // } elseif ($categoryItems['name'] == 'Floppy Disk Unit Komputer Mainframe') {
            //     $localcode = $floppyDiskUnit;
            // } elseif ($categoryItems['name'] == 'Storage Modul Disk Komputer Mainframe') {
            //     $localcode = $storageModulDisk;
            // } elseif ($categoryItems['name'] == 'Console Unit Komputer Mainframe') {
            //     $localcode = $consolUnit;
            // } elseif ($categoryItems['name'] == 'CPU Komputer Mainframe') {
            //     $localcode = $cpu;
            // } elseif ($categoryItems['name'] == 'Disk Park Komputer Mainframe') {
            //     $localcode = $diskpark;
            // } elseif ($categoryItems['name'] == 'Hard Copy Console Komputer Mainframe') {
            //     $localcode = $hardCopyConsol;
            // } elseif ($categoryItems['name'] == 'Serial Pointer Komputer Mainframe') {
            //     $localcode = $sesialPointer;
            // } elseif ($categoryItems['name'] == 'Line Printer Komputer Mainframe') {
            //     $localcode = $linePrinter;
            // } elseif ($categoryItems['name'] == 'Ploter Komputer Mainframe') {
            //     $localcode = $ploter;
            // } elseif ($categoryItems['name'] == 'Hard Disk Komputer Mainframe') {
            //     $localcode = $hardDisk;
            // } elseif ($categoryItems['name'] == 'Keyboard Komputer Mainframe') {
            //     $localcode = $keyboard;
            // }


            // //
            // elseif ($categoryItems['name'] == 'Card Reader Mini Komputer') {
            //     $localcode = $cardReaderMiniKom;
            // } elseif ($categoryItems['name'] == 'Magnetic Tape Unit Mini Komputer') {
            //     $localcode = $magneticTapeUnitMiniKom;
            // } elseif ($categoryItems['name'] == 'Floppy Disk Unit Mini Komputer') {
            //     $localcode = $floppyDiskUnitMiniKom;
            // } elseif ($categoryItems['name'] == 'Storage Modul Disk Mini Komputer') {
            //     $localcode = $storageModulDiskMiniKom;
            // } elseif ($categoryItems['name'] == 'Console Unit Mini Komputer') {
            //     $localcode = $consolUnitMiniKom;
            // } elseif ($categoryItems['name'] == 'CPU Mini Komputer') {
            //     $localcode = $cpuMiniKom;
            // } elseif ($categoryItems['name'] == 'Disk Pack Mini Komputer') {
            //     $localcode = $diskparkMiniKom;
            // } elseif ($categoryItems['name'] == 'Printer Mini Komputer') {
            //     $localcode = $hardPrinterMiniKom;
            // } elseif ($categoryItems['name'] == 'Plotter Mini Komputer') {
            //     $localcode = $plotterMiniKom;
            // } elseif ($categoryItems['name'] == 'Scanner Mini Komputer') {
            //     $localcode = $scannerMiniKom;
            // } elseif ($categoryItems['name'] == 'Computer Compatible Mini Komputer') {
            //     $localcode = $computerCompatible;
            // } elseif ($categoryItems['name'] == 'Viewer Mini Komputer') {
            //     $localcode = $viewewr;
            // } elseif ($categoryItems['name'] == 'Digitzer Mini Komputer') {
            //     $localcode = $digitzerMiniKom;
            // } elseif ($categoryItems['name'] == 'Keyboard Mini Komputer') {
            //     $localcode = $keyboardMiniKom;


            //     //

            // } elseif ($categoryItems['name'] == 'CPU Personal Computer') {
            //     $localcode = $cpuPc;
            // } elseif ($categoryItems['name'] == 'Monitor Personal Computer') {
            //     $localcode = $monitor;
            // } elseif ($categoryItems['name'] == 'Printer Personal Computer') {
            //     $localcode = $printer;
            // } elseif ($categoryItems['name'] == 'Scanner Personal Computer') {
            //     $localcode = $scanner;
            // } elseif ($categoryItems['name'] == 'Plotter Personal Computer') {
            //     $localcode = $plotterPc;
            // } elseif ($categoryItems['name'] == 'Viewer Personal Computer') {
            //     $localcode = $viewer;
            // } elseif ($categoryItems['name'] == 'Extermal Personal Computer') {
            //     $localcode = $extermal;
            // } elseif ($categoryItems['name'] == 'Digitzer Personal Computer') {
            //     $localcode = $digizer;
            // } elseif ($categoryItems['name'] == 'Keyboard Personal Computer') {
            //     $localcode = $keyboardPc;
            // }


            // //
            // elseif ($categoryItems['name'] == 'Server') {
            //     $localcode = $server;
            // } elseif ($categoryItems['name'] == 'Router') {
            //     $localcode = $router;
            // } elseif ($categoryItems['name'] == 'Hub') {
            //     $localcode = $hub;
            // } elseif ($categoryItems['name'] == 'Modem') {
            //     $localcode = $modem;
            // } elseif ($categoryItems['name'] == 'Netware Interface External') {
            //     $localcode = $netwareInterfaceExternal;
            // } else {
            //     $localcode = 'INW/N 123';
            // }

            // $validatedData['item_code'] = $localcode . '.' . $validatedData['item_code'];
            item::create($validatedData);
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

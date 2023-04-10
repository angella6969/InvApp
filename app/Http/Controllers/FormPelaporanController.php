<?php

namespace App\Http\Controllers;

use App\Models\item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormPelaporanController extends Controller
{
    // public $timestamps = false;
    public function index()
    {
        dd('Under Construksion');
        $a = request('from_date');
        $b = request('to_date');
       

        // $startDate = Carbon::createFromFormat('Y-m-d', '2021-06-01');
        // $endDate = Carbon::createFromFormat('Y-m-d', '2021-06-30');
       $items= item::whereBetween(DB::raw('DATE(created_at)'), array($a, $b ))->get();
        // $items = item::whereBetween('created_at',array(['a','b']))->get();
        dd($items);
        // dd(request($items));
        // dd(request(['search', 'categories', 'from_date', 'to_date', 'search']));


        return view('dashboard.FormPelaporan.index', [
            "items" => item::with(['category'])->latest()
                ->Filter(request(['search', 'categories', 'from_date', 'to_date']))
                ->paginate(20)
                ->withQueryString(),

        ]);
        
    }
}

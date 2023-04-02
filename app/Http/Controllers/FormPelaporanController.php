<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormPelaporanController extends Controller
{
    public function index()
    {
        return view('dashboard.FormPelaporan.index');
    }
}

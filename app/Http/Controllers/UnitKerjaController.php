<?php

namespace App\Http\Controllers;

use App\Models\kerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index()
    {
        $kerja = kerja::all();
        return view ('dashboard.unitkerja', ['kerjaList' => $kerja]);
    }}

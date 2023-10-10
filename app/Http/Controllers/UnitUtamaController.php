<?php

namespace App\Http\Controllers;

use App\Models\Utama;
use Illuminate\Http\Request;

class UnitUtamaController extends Controller
{
    public function index()
    {
        $utama = Utama::all();
        return view ('dashboard.unitutama', ['utamaList' => $utama]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Kemenkes;
use Illuminate\Http\Request;

class GedungKemenkesController extends Controller
{
    public function index()
    {
        $kemenkes = Kemenkes::all();
        return view ('dashboard.gedungkemenkes', ['kemenkesList' => $kemenkes]);
    }
}

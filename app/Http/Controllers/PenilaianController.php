<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $posisi = Posisi::all();
        return view ('dashboard.penilaian', ['posisi' => $posisi]);
    }
}

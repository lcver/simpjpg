<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Posisi;
use Illuminate\Http\Request;

class KriteriaPenilaianController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view ('dashboard.kriteriapenilaian', ['kriteriaList' => $kriteria]);
    }
    public function create(){
        $posisi = Posisi::select('id_posisi', 'posisi')->get();
        return view('crud.kriteria-add', ['posisi'=>$posisi]);  
    }
    public function store(Request $request){
        $kriteria = Kriteria::create($request->all());
        return redirect('kriteria penilaian');
    }
}

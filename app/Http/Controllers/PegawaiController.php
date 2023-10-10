<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = pegawai::all();
        return view ('dashboard.pegawai', ['pegawaiList' => $pegawai]);
    }

    public function create(){
        $jabatan = Jabatan::select('id_jabatan', 'jabatan')->get();
        return view('crud.pegawai-add', ['jabatan'=>$jabatan]);  
    }
    public function store(Request $request){
        $pegawai = pegawai::create($request->all());
        return redirect('pegawai');
    }
}

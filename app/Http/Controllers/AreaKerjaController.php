<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Gedung;
use Illuminate\Http\Request;

class AreaKerjaController extends Controller
{
    public function index()
    {
        $gedung = Gedung::all();
        return view ('dashboard.areakerja',['gedungList' => $gedung]);
    }
    public function create(){
        $area = Area::select('id_area', 'area')->get();
        return view('crud.area-add', ['area'=>$area]);  
    }
    public function store(Request $request){
        $gedung = Gedung::create($request->all());
        return redirect('area-kerja');
    }
}

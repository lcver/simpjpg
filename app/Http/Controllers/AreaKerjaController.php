<?php

namespace App\Http\Controllers;

use Alert;
use App\Helpers\Validation;
use App\Models\Area;
use App\Models\Gedung;
use App\Models\Posisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AreaKerjaController extends Controller
{
    public function index()
    {
        $model = Gedung::query();
        
        // search filter
        $gedung = request('search') ? $model->where('gedung', 'like', '%'.request('search').'%')->paginate(10) : $model->paginate(10);

        // $gedung = Gedung::paginate(10);
        return view('dashboard.areakerja.areakerja', ['gedungList' => $gedung]);
    }

    public function create()
    {
        $area = Area::select('id', 'area')->get();
        $posisi = Posisi::select('id','posisi')->get();
        return view('dashboard.areakerja.areakerja-create', ['area' => $area, 'posisi' => $posisi]);
    }

    public function edit($id)
    {
        $area = Area::select('id', 'area')->get();
        $posisi = Posisi::select('id','posisi')->get();
        $gedung = Gedung::find($id);
        return view('dashboard.areakerja.areakerja-edit', ['gedung' => $gedung, 'area' => $area, 'posisi' => $posisi]);
    }

    public function store(Request $request)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'gedung' => 'required|string',
                'posisi_id' => 'required'
            ], [
                'gedung.required' => 'Kolom gedung tidak boleh kosong!'
            ]);

            // store data
            Gedung::create($request->all());
            
            Alert::success('success', 'Area kerja berhasil dibuat');
            return redirect()->route('areakerja');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('areakerja.create');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'gedung' => 'required|string',
                'posisi_id' => 'required'
            ], [
                'gedung.required' => 'Kolom gedung tidak boleh kosong!'
            ]);

            // store data
            Gedung::find($id)->update($request->all());
            
            Alert::success('success', 'Area kerja berhasil update');
            return redirect()->route('areakerja');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('areakerja.edit', ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        try {
            $gedung = Gedung::find($id)->delete();

            Alert::success('success', 'Area kerja berhasil dihapus');
            return redirect()->route('areakerja');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('areakerja');
        }
    }

    public function getAreaKerjaByPosisiId($id)
    {
        $datas = Gedung::where("posisi_id", $id)->get();

        return json_encode($datas);
    }
}

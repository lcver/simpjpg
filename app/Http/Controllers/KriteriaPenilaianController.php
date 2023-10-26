<?php

namespace App\Http\Controllers;

use Alert;
use App\Helpers\Validation;
use App\Models\Kriteria;
use App\Models\Posisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KriteriaPenilaianController extends Controller
{
    public function index()
    {
        $model = Kriteria::query();
        
        // search filter
        $kriteria = request('search') ? $model->where('kriteria', 'like', '%'.request('search').'%')->paginate(10) : $model->paginate(10);

        return view('dashboard.kriteria-penilaian.kriteria-penilaian', ['kriteriaList' => $kriteria]);
    }
    public function create(){
        $posisi = Posisi::select('id_posisi', 'posisi')->get();
        return view('dashboard.kriteria-penilaian.kriteria-penilaian-add', ['posisi'=>$posisi]);  
    }

    public function edit($id)
    {
        $posisi = Posisi::select('id_posisi', 'posisi')->get();
        $kriteria = Kriteria::find($id);
        return view('dashboard.kriteria-penilaian.kriteria-penilaian-edit', ['posisi' => $posisi, 'kriteria' => $kriteria]);
    }

    public function store(Request $request){
        try {
            // Filter
            $filter = Validation::set($request, [
                'posisi_id' => 'required',
                'kriteria' => 'required|string',
            ], [
                'kriteria.required' => 'Kolom Kriteria tidak boleh kosong!'
            ]);

            // store data
            Kriteria::create($request->all());
            Alert::success('success', 'Kriteria penilaian berhasil dibuat');
            return redirect()->route('kriteriapenilaian');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('kriteriapenilaian.create');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'posisi_id' => 'required',
                'kriteria' => 'required|string',
            ], [
                'kriteria.required' => 'Kolom Kriteria tidak boleh kosong!'
            ]);

            // store data
            Kriteria::find($id)->update($request->all());
            
            Alert::success('success', 'Kriteria penilaian berhasil update');
            return redirect()->route('kriteriapenilaian');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('kriteriapenilaian.edit', ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        try {
            $gedung = Kriteria::find($id)->delete();

            Alert::success('success', 'Kriteria penilaian berhasil dihapus');
            return redirect()->route('kriteriapenilaian');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('kriteriapenilaian');
        }
    }

    
    public function getKriteriaByPosisiId($id)
    {
        $datas = Kriteria::where("posisi_id", $id)->get();

        return json_encode($datas);
    }
}

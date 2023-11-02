<?php

namespace App\Http\Controllers;

use Alert;
use App\Helpers\Validation;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Posisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PenilaianController extends Controller
{
    public function index()
    {
        $posisi = Posisi::all();
        $penilaian = Penilaian::paginate(10);
        
        return view('dashboard.penilaian.penilaian', ['posisi' => $posisi, 'penilaianList'=>$penilaian]);
    }

    public function detail($id)
    {
        $penilaian = Penilaian::find($id);
        $kriteria = Kriteria::all();

        return view('dashboard.penilaian.penilaian-detail', ['penilaian' => $penilaian, 'kriteria' => $kriteria]);
    }

    public function store(Request $request)
    {
        try {
            // filter
            $filter = Validation::set($request, [
                'posisi_id' => 'required',
                'pegawai_id' => 'required',
                'area_id' => 'required',
                'kartu_kuning' => 'required'
            ]);

            $data = [
                'posisi_id' => $request->posisi_id,
                'pegawai_id' => $request->pegawai_id,
                'area_id' => $request->area_id,
                'kartu_kuning' => json_encode($request->kartu_kuning)
            ];

            Penilaian::create($data);

            Alert::success('success', 'Penilaian berhasil dibuat');
            return redirect()->route('penilaian');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('penilaian.create');
        }
    }

    public function destroy($id)
    {
        try {
            Penilaian::find($id)->delete();

            Alert::success('success', 'Penilaian berhasil dihapus');
            return redirect()->route('penilaian');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('penilaian');
        }
    }
}

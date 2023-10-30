<?php

namespace App\Http\Controllers;

use Alert;
use App\Helpers\Validation;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PegawaiController extends Controller
{
    public function index()
    {
        $model = Pegawai::query();

        // search filter
        if (request('search'))
        {
            $pegawai = $model->where('pegawai', 'like', '%'.request('search').'%')
                    ->orWhere('gender', 'like', '%'.request('search').'%')
                    ->orWhere('address', 'like', '%'.request('search').'%')
                    ->orWhere('handphone', 'like', '%'.request('search').'%')
                    ->paginate(10);
        } else {
            $pegawai = $model->paginate(10);
        }

        return view ('dashboard.pegawai.pegawai', ['pegawaiList' => $pegawai]);
    }

    public function create(){
        $jabatan = Jabatan::select('id', 'jabatan')->get();
        return view('dashboard.pegawai.pegawai-add', ['jabatan' => $jabatan ]);
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        $jabatan = Jabatan::select('id', 'jabatan')->get();

        return view('dashboard.pegawai.pegawai-edit', ['pegawai' => $pegawai, 'jabatan' => $jabatan]);
    }

    public function store(Request $request)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'pegawai' => 'required|string',
                'jabatan_id' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'handphone' => 'required',
            ], [
                'pegawai.required' => 'Kolom nama pegawai tidak boleh kosong!',
                'jabatan_id.required' => 'Jabatan tidak boleh kosong!',
                'gender.required' => 'Kolom gender tidak boleh kosong!',
                'address.required' => 'Kolom address tidak boleh kosong!',
                'handphone.required' => 'Kolom handphone tidak boleh kosong!',
            ]);


            // store data
            Pegawai::create($request->all());
            
            Alert::success('success', 'Pegawai berhasil ditambah');
            return redirect()->route('pegawai');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('pegawai.create');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'pegawai' => 'required|string',
                'jabatan_id' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'handphone' => 'required',
            ], [
                'pegawai.required' => 'Kolom nama pegawai tidak boleh kosong!',
                'jabatan_id.required' => 'Jabatan tidak boleh kosong!',
                'gender.required' => 'Kolom gender tidak boleh kosong!',
                'address.required' => 'Kolom address tidak boleh kosong!',
                'handphone.required' => 'Kolom handphone tidak boleh kosong!',
            ]);


            // store data
            Pegawai::find($id)->update($request->all());
            
            Alert::success('success', 'Pegawai berhasil diupdate');
            return redirect()->route('pegawai');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('pegawai.edit', ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        try {
            $Pegawai = Pegawai::find($id)->delete();

            Alert::success('success', 'Pegawai berhasil dihapus');
            return redirect()->route('pegawai');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('pegawai');
        }
    }

    public function getPegawaiByPosisiId($id)
    {
        $datas = Pegawai::where("posisi_id", $id)->get();

        return json_encode($datas);
    }
}

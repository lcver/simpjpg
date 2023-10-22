<?php

namespace App\Http\Controllers;

use Alert;
use App\Helpers\Validation;
use App\Models\Kerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnitKerjaController extends Controller
{
    public function index()
    {
        $model = Kerja::query();

        // search filter
        $kerja = request('search') ? $model->where('kerja', 'like', '%'.request('search').'%')->paginate(10) : $model->paginate(10);

        return view ('dashboard.unit-kerja.unitkerja', ['kerjaList' => $kerja]);
    }

    public function create()
    {
        return view('dashboard.unit-kerja.unitkerja-create');
    }

    public function edit($id)
    {
        $kerja = Kerja::find($id);
        return view('dashboard.unit-kerja.unitkerja-edit', ['kerja' => $kerja]);
    }

    public function store(Request $request)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'kerja' => 'required|string'
            ], [
                'kerja.required' => 'Kolom nama unit tidak boleh kosong!'
            ]);

            // store data
            Kerja::create($request->all());
            
            Alert::success('success', 'Unit utama berhasil dibuat');
            return redirect()->route('unitkerja');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('unitkerja.create');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'kerja' => 'required|string'
            ], [
                'kerja.required' => 'Kolom nama unit tidak boleh kosong!'
            ]);


            // store data
            Kerja::find($id)->update($request->all());
            
            Alert::success('success', 'Unit utama berhasil update');
            return redirect()->route('unitkerja');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('unitkerja.edit', ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        try {
            $utama = Kerja::find($id)->delete();

            Alert::success('success', 'Unit utama berhasil dihapus');
            return redirect()->route('unitkerja');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('unitkerja');
        }
    }
}

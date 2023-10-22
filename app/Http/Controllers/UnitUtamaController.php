<?php

namespace App\Http\Controllers;

use Alert;
use App\Helpers\Validation;
use App\Models\Utama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnitUtamaController extends Controller
{
    public function index()
    {
        $model = Utama::query();

        // search filter
        $utama = request('search') ? $model->where('utama', 'like', '%'.request('search').'%')->paginate(10) : $model->paginate(10);

        return view ('dashboard.unit-utama.unitutama', ['utamaList' => $utama]);
    }
    public function create()
    {
        return view('dashboard.unit-utama.unitutama-create');
    }

    public function edit($id)
    {
        $utama = Utama::find($id);
        return view('dashboard.unit-utama.unitutama-edit', ['utama' => $utama]);
    }

    public function store(Request $request)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'utama' => 'required|string'
            ], [
                'utama.required' => 'Kolom nama unit tidak boleh kosong!'
            ]);

            // store data
            Utama::create($request->all());
            
            Alert::success('success', 'Unit utama berhasil dibuat');
            return redirect()->route('unitutama');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('unitutama.create');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'utama' => 'required|string'
            ], [
                'utama.required' => 'Kolom nama unit tidak boleh kosong!'
            ]);


            // store data
            Utama::find($id)->update($request->all());
            
            Alert::success('success', 'Unit utama berhasil update');
            return redirect()->route('unitutama');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('unitutama.edit', ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        try {
            $utama = Utama::find($id)->delete();

            Alert::success('success', 'Unit utama berhasil dihapus');
            return redirect()->route('unitutama');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('unitutama');
        }
    }
}

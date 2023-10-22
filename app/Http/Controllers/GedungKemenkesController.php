<?php

namespace App\Http\Controllers;

use Alert;
use App\Helpers\Validation;
use App\Models\Kemenkes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GedungKemenkesController extends Controller
{
    public function index()
    {
        $model = Kemenkes::query();

        $kemenkes = request('search') ? $model->where('kemenkes', 'like', '%'.request('search').'%')->paginate(10) : $model->paginate(10);

        return view ('dashboard.kemenkes.gedungkemenkes', ['kemenkesList' => $kemenkes]);
    }

    public function create()
    {
        return view('dashboard.kemenkes.gedungkemenkes-add');
    }

    public function edit($id)
    {
        $kemenkes = Kemenkes::find($id);
        return view('dashboard.kemenkes.gedungkemenkes-edit', ['kemenkes' => $kemenkes]);
    }

    public function store(Request $request)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'kemenkes' => 'required|string'
            ], [
                'kemenkes.required' => 'Kolom kemenkes tidak boleh kosong!'
            ]);

            // store data
            Kemenkes::create($request->all());
            
            Alert::success('success', 'Gedung Kemenkes berhasil ditambahkan');
            return redirect()->route('gedungkemenkes');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('gedungkemenkes.create');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'kemenkes' => 'required|string'
            ], [
                'kemenkes.required' => 'Kolom kemenkes tidak boleh kosong!'
            ]);

            // store data
            Kemenkes::find($id)->update($request->all());
            
            Alert::success('success', 'Gedung Kemenkes berhasil diubah');
            return redirect()->route('gedungkemenkes');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('gedungkemenkes.edit', ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        try {
            $kemenkes = Kemenkes::find($id)->delete();

            Alert::success('success', 'Gedung Kemenkes berhasil dihapus');
            return redirect()->route('gedungkemenkes');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('gedungkemenkes');
        }
    }
}

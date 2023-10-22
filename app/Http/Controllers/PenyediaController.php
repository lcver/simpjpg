<?php

namespace App\Http\Controllers;

use Alert;
use App\Helpers\Validation;
use App\Models\Penyedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PenyediaController extends Controller
{
    public function index()
    {
        $model = Penyedia::query();

        $penyedia = request('search') ? $model->where('penyedia', 'like', '%'.request('search').'%')->paginate(10) : $model->paginate(10);

        return view('dashboard.penyedia.penyedia', ['penyediaList' => $penyedia]);
    }

    public function create()
    {
        return view('dashboard.penyedia.penyedia-add');
    }

    public function edit($id)
    {
        $penyedia = Penyedia::find($id);
        return view('dashboard.penyedia.penyedia-edit', ['penyedia' => $penyedia]);
    }

    public function store(Request $request)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'penyedia' => 'required|string'
            ], [
                'penyedia.required' => 'Kolom nama penyedia tidak boleh kosong!'
            ]);

            // store data
            Penyedia::create($request->all());
            
            Alert::success('success', 'Penyedia berhasil dibuat');
            return redirect()->route('penyedia');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('penyedia.create');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'penyedia' => 'required|string'
            ], [
                'penyedia.required' => 'Kolom nama penyedia tidak boleh kosong!'
            ]);

            // store data
            Penyedia::find($id)->update($request->all());
            
            Alert::success('success', 'Penyedia berhasil update');
            return redirect()->route('penyedia');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('penyedia.edit', ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        try {
            $penyedia = Penyedia::find($id)->delete();

            Alert::success('success', 'Penyedia berhasil dihapus');
            return redirect()->route('penyedia');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('penyedia');
        }
    }
}

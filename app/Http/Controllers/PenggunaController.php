<?php

namespace App\Http\Controllers;

use Alert;
use App\Helpers\Validation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PenggunaController extends Controller
{
    public function index()
    {
        $model = User::query();

        $pengguna = request('search') ? $model->where('name', 'like', '%'.request('search').'%')->orWhere('email', 'like', '%'.request('search').'%')->paginate(10) : $model->paginate(10);

        return view ('dashboard.pengguna.pengguna', ['penggunaList' => $pengguna]);
    }

    public function create()
    {
        $role = Role::all();
        return view('dashboard.pengguna.pengguna-create', ['role' => $role]);
    }

    public function edit($id)
    {
        $role = Role::all();
        $pengguna = User::find($id);
        return view('dashboard.pengguna.pengguna-edit', ['role' => $role, 'pengguna' => $pengguna]);
    }

    public function store(Request $request)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'name' => 'required|string',
                'email' => 'required|email',
                'role' => 'required',
                'password' => 'required|min:8',
                'confirm_password' => 'required',
            ]);
            
            // store data
            $pengguna = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $this->passwordHandle($request),
                'role_id' => $request->role,
            ]);
            
            Alert::success('success', 'User berhasil dibuat');
            return redirect()->route('pengguna');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('pengguna.create');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Filter
            $filter = Validation::set($request, [
                'name' => 'required|string',
                'email' => 'required|email',
                'role' => 'required'
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if (isset($request->password) && isset($request->confirm_password)) {

                Validation::set($request, [
                    'password' => 'required|min:8',
                    'confirm_password' => 'required',
                ]);
                $password = $this->passwordHandle($request);
                $data['password'] = $password;
            }

            if ($request->role) $data['role_id'] = $request->role;
            
            // store data
            User::find($id)->update($data);
            
            Alert::success('success', 'User berhasil update');
            return redirect()->route('pengguna');

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('pengguna.edit', ['id' => $id]);
        }
    }

    public function passwordHandle(Request $request)
    {
        if ($request->password !== $request->confirm_password) throw new \Exception("Password tidak sama");

        return Hash::make($request->password);
    }

    public function destroy($id)
    {
        try {
            $pengguna = User::find($id)->delete();

            Alert::success('success', 'User berhasil dihapus');
            return redirect()->route('pengguna');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::error('error', $ex->getMessage());
            return redirect()->route('pengguna');
        }
    }
}

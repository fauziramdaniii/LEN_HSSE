<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);
        $request['password'] = bcrypt($request->password);
        $createUser = User::create($request->all());
        if ($createUser) {
            toast('Data Berhasil ditambahkan', 'success');
            return back();
        }
    }

    public function update(Request $request, User $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id->id,
        ]);
        $updateUser = $id->update($request->all());
        if ($updateUser) {
            toast('Data Berhasil diupdate', 'success');
            return back();
        }
    }

    public function resetPassword(User $id)
    {
        $password = bcrypt('password');
        $updateUser = $id->update(['password' => $password]);
        if ($updateUser) {
            toast('Password Berhasil direset', 'success');
            return back();
        }
    }

    public function destroy(User $id)
    {
        $deleteUser = $id->delete();
        if ($deleteUser) {
            toast('Akun Berhasil didelete', 'success');
            return back();
        }
    }

    public function editAkun()
    {
        if (auth()->user()->role == 'supervisor') {
            $data['pelaksana'] = User::where('role', 'petugasp3k')->orWhere('role', 'petugasapar')->get();
            return view('supervisor.editAkun')->with($data);
        } else if (auth()->user()->role == 'superadmin') {
            return view('superadmin.editAkun');
        } else if (auth()->user()->role == 'petugasapar') {
            return view('petugasapar.editAkun');
        } else if (auth()->user()->role == 'petugasp3k') {
            return view('petugasp3k.editAkun');
        }
    }

    public function updateAkun(User $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id->id,
        ]);
        if ($validator->fails()) {
            toast('Data tidak valid', 'error');
            return back();
        }

        if (!empty($request->new_password) && !Hash::check($request->old_password, $id->password)) {
            toast('Password Lama tidak sesuai', 'error');
            return back();
        }

        if (!empty($request->new_password) && $request->new_password != $request->konf_new_password) {
            toast('Password dan Konfirmasi Password tidak sesuai', 'error');
            return back();
        }
        if (!empty($request->new_password)) {
            $request['password'] = bcrypt($request->new_password);
        }

        $id->update($request->all());

        toast('Data Akun berhasil di update', 'success');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins',
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
            'email' => 'required',
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
}

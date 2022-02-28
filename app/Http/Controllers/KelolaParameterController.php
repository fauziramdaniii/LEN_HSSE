<?php

namespace App\Http\Controllers;

use App\Models\JenisAPAR;
use App\Models\tipeAPAR;
use Illuminate\Http\Request;

class KelolaParameterController extends Controller
{
    public function index()
    {
        $tipe = tipeAPAR::all();
        $jenis = JenisAPAR::all();
        return view('supervisor.dataapar.kelolaParameter', compact('jenis', 'tipe'));
    }

    public function tambahTipe(Request $request)
    {
        $request->validate([
            'nama_tipe' => 'required'
        ]);
        tipeAPAR::create([
            'nama_tipe' => $request->nama_tipe
        ]);
        toast('Tipe APAR berhasil ditambah', 'success');
        return back()->with('success', 'Tipe APAR berhasil ditambah');
    }

    public function tambahJenis(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required'
        ]);
        JenisAPAR::create([
            'nama_jenis' => $request->nama_jenis
        ]);
        toast('Jenis APAR berhasil ditambah', 'success');
        return back()->with('success', 'Jenis APAR berhasil ditambah');
    }

    public function editTipe(tipeAPAR $id, Request $request)
    {
        $request->validate([
            'nama_tipe' => 'required'
        ]);
        $id->update([
            'nama_tipe' => $request->nama_tipe
        ]);
        toast('Tipe APAR berhasil diubah', 'success');
        return back()->with('success', 'Tipe APAR Berhasil diubah');
    }

    public function editJenis(JenisAPAR $id, Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required'
        ]);
        $id->update([
            'nama_jenis' => $request->nama_jenis
        ]);
        toast('Jenis APAR berhasil diubah', 'success');
        return back()->with('success', 'Jenis APAR Berhasil diubah');
    }

    public function deleteTipe(tipeAPAR $id)
    {
        $id->delete();
        toast('Tipe APAR berhasil dihapus', 'success');
        return back()->with('success', 'Tipe APAR berhasil dihapus');
    }

    public function deleteJenis(JenisAPAR $id)
    {
        $id->delete();
        toast('Jenis APAR berhasil dihapus', 'success');
        return back()->with('success', 'Jenis APAR berhasil dihapus');
    }
}

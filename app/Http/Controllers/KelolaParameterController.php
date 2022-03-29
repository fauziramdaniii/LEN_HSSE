<?php

namespace App\Http\Controllers;

use App\Models\Kota;

use App\Models\TipeApar;
use App\Models\JenisApar;
use App\Models\ZonaLokasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class KelolaParameterController extends Controller
{
    public function index()
    {
        $tipe = TipeApar::all();
        $jenis = JenisApar::all();
        $zona = ZonaLokasi::all();
        return view('supervisor.dataapar.kelolaParameter', compact('jenis', 'tipe', 'zona'));
    }

    public function tambahTipe(Request $request)
    {
        $request->validate([
            'nama_tipe' => 'required'
        ]);
        TipeApar::create([
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
        JenisApar::create([
            'nama_jenis' => $request->nama_jenis
        ]);
        toast('Jenis APAR berhasil ditambah', 'success');
        return back()->with('success', 'Jenis APAR berhasil ditambah');
    }

    public function editTipe(TipeApar $id, Request $request)
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

    public function editJenis(JenisApar $id, Request $request)
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

    public function deleteTipe(TipeApar $id)
    {
        $id->delete();
        toast('Tipe APAR berhasil dihapus', 'success');
        return back()->with('success', 'Tipe APAR berhasil dihapus');
    }

    public function deleteJenis(JenisApar $id)
    {
        $id->delete();
        toast('Jenis APAR berhasil dihapus', 'success');
        return back()->with('success', 'Jenis APAR berhasil dihapus');
    }

    public function getKota($provinsi)
    {
        $data = [];
        $kotas = Kota::where('province_id', $provinsi)->get();
        foreach ($kotas as $kota) {
            $data[] = [
                'name' => Str::title(Str::lower($kota->name))
            ];
        }

        return response()->json(['data' => $data]);
    }

    public function tambahZona(Request $request)
    {
        $request->validate([
            'zona' => 'required'
        ]);
        $checkZona = ZonaLokasi::where('zona', $request->zona)->first();
        if (!empty($checkZona)) {
            toast('Zona sudah ada!', 'error');
            return back();
        }
        ZonaLokasi::create([
            'zona' => $request->zona
        ]);
        toast('Zona Berhasil ditambahkan', 'success');
        return back();
    }

    public function editZona(ZonaLokasi $id, Request $request)
    {
        $request->validate([
            'zona' => 'required'
        ]);
        $checkZona = ZonaLokasi::where('zona', $request->zona)->first();
        if (!empty($checkZona)) {
            toast('Zona sudah ada!', 'error');
            return back();
        }
        $id->update([
            'zona' => $request->zona
        ]);
        toast('Zona berhasil diubah', 'success');
        return back();
    }

    public function deleteZona(ZonaLokasi $id)
    {
        $id->delete();
        toast('Zona berhasil dihapus', 'success');
        return back();
    }
}

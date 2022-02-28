<?php

namespace App\Http\Controllers;

use App\Models\InspeksiP3K;
use App\Models\IsiInspeksi;
use App\Models\MasterInspeksiP3K;
use Illuminate\Http\Request;

class InspeksiP3KController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = MasterInspeksiP3K::all();
        return view('inpeksiP3K.inpeksi', compact('periode'));
    }

    public function status()
    {
        return view('inpeksiP3K.status');
    }

    public function detailInspeksi(MasterInspeksiP3K $periode)
    {
        $periode = $periode->load('DetailInspeksi', 'DetailInspeksi.dataP3K');
        return view('inpeksiP3K.status', compact('periode'));
    }

    public function inputInspeksi(InspeksiP3K $id)
    {
        $inpeksi = $id->load('isi', 'isi.detail');
        return view('inpeksiP3K.isiInpeksi', compact('inpeksi'));
    }

    public function storeInpeksi(InspeksiP3K $id, Request $request)
    {
        $inpeksi = $id->load('isi');
        foreach ($inpeksi->isi as $isi) {
            $isi->update([
                'jumlah' => $request->jumlah[$isi->id],
                'keterangan' => $request->keterangan[$isi->id]
            ]);
        }

        $inpeksi->update([
            'status' => 'Sudah Inpeksi'
        ]);
        toast('Inspeksi berhasil diinput', 'success');
        return redirect('p3k/inspeksi/' . $inpeksi->periode_id);
    }

    public function hasilInpeksi(InspeksiP3K $id)
    {
        $inpeksi = $id->load('isi', 'isi.detail');
        return view('inpeksiP3K.hasil', compact('inpeksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inpeksiP3K.inpeksi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required',
            'standar' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);
        InspeksiP3K::create($request->all());
        return redirect('/inspeksip3k')->with('success', 'inspeksip3k saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InspeksiP3K  $inspeksip3k
     * @return \Illuminate\Http\Response
     */
    public function show(InspeksiP3K $inspeksip3k)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InspeksiP3K  $inspeksip3k
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inspeksip3k = InspeksiP3K::find($id);
        return view('inspeksip3k.edit', ['inspeksip3k' => $inspeksip3k]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InspeksiP3K  $inspeksip3k
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspeksiP3K $inspeksip3k)
    {
        $request->validate([
            'isi' => 'required',
            'standar' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $inspeksip3k->update($request->all());
        return redirect('/inspeksip3k')->with('success', 'Data inspeksi Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InspeksiP3K  $inspeksip3k
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspeksiP3K $inspeksip3k)
    {
        $inspeksip3k->delete();
        return redirect('/inspeksip3k')->with('success', 'Data inspeksi P3K Deleted');
    }
}
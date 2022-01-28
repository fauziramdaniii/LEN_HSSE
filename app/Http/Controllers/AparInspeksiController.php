<?php

namespace App\Http\Controllers;

use App\Models\AparInspeksi;
use Illuminate\Http\Request;

class AparInspeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aparinspeksi = aparinspeksi::all();
        return view('petugasapar.index', compact('aparinspeksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugasapar.create');
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
            'tipe' => 'required',
            'berat' => 'required',
            'zona' => 'required',
            'lokasi' => 'required',
            'kedaluarsa' => 'required',
            'keterangan' => 'required',
        ]);
        aparinspeksi::create($request->all());
        return redirect('aparinspeksi')->with('success', 'aparinspeksi saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aparinspeksi  $aparinspeksi
     * @return \Illuminate\Http\Response
     */
    public function show(aparinspeksi $aparinspeksi)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aparinspeksi  $aparinspeksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aparinspeksi = aparinspeksi::find($id);
        return view('petugasapar.edit', ['aparinspeksi' => $aparinspeksi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aparinspeksi  $aparinspeksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aparinspeksi $aparinspeksi)
    {
        $request->validate([
            'tipe' => 'required',
            'berat' => 'required',
            'zona' => 'required',
            'lokasi' => 'required',
            'kedaluarsa' => 'required',
            'keterangan' => 'required',
        ]);

        $aparinspeksi->update($request->all());
        return redirect('aparinspeksi')->with('success', 'Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aparinspeksi  $aparinspeksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(aparinspeksi $aparinspeksi)
    {
        $aparinspeksi->delete();
        return redirect('aparinspeksi')->with('success', 'Data Apar Deleted');
    }
}

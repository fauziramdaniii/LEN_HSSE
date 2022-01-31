<?php

namespace App\Http\Controllers;

use App\Models\MasterInspeksi;
use Illuminate\Http\Request;

class MasterInspeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = MasterInspeksi::all();
        return view('supervisor.masterinspeksi.index', compact('periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.masterinspeksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periode = date('Y-m-d', strtotime($request->periode));
        $request->validate([
            'periode' => 'required',
        ]);
        MasterInspeksi::create([
            'periode' => $periode,
            'sudah_inspeksi' => '5',
            'belum_inspeksi' => '5',
            'status' => 'Belum di Inspeksi',

        ]);
        return redirect('masterinspeksi')->with('success', 'Periode saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterInspeksi  $masterInspeksi
     * @return \Illuminate\Http\Response
     */
    public function show(MasterInspeksi $masterInspeksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterInspeksi  $masterInspeksi
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterInspeksi $masterInspeksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterInspeksi  $masterInspeksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterInspeksi $masterInspeksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterInspeksi  $masterInspeksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterInspeksi $masterInspeksi)
    {
        //
    }
}

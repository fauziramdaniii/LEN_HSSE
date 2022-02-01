<?php

namespace App\Http\Controllers;

use App\Models\DataApar;
use App\Models\DetailInpeksiApar;
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
        return view('supervisor.dataapar.inpeksi', compact('periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.dataapar.tambahPeriode');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (DataApar::count() < 1) {
            return back()->with('error', 'Isi terlebih dahulu Data Apar');
        }
        $check = MasterInspeksi::where('periode',  date('Y-m-d', strtotime($request->periode)))->first();
        if (!empty($check)) {
            return back()->with('error', 'Periode sudah ada');
        }
        $periode = date('Y-m-d', strtotime($request->periode));
        $request->validate([
            'periode' => 'required',
        ]);
        $createPeriode = MasterInspeksi::create([
            'periode' => $periode,
            'status' => 'Belum di Inspeksi',

        ]);

        if ($createPeriode) {
            foreach (DataApar::all() as $apart) {
                DetailInpeksiApar::create([
                    'periode_id' => $createPeriode->id,
                    'apart_id' => $apart->id
                ]);
            }
        }
        return redirect('/apar/masterinspeksi')->with('success', 'Periode saved!');
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

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataApar;
use App\Models\tipeAPAR;
use App\Models\JenisAPAR;
use Illuminate\Http\Request;
use App\Models\MasterInspeksi;
use App\Models\DetailInpeksiApar;
use App\Models\JenisAPAR as ModelsJenisAPAR;


class DataAparController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataapar = DataApar::all();
        return view('supervisor.dataapar.index', compact('dataapar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipe = tipeAPAR::all();
        $jenis = JenisAPAR::all();
        return view('supervisor.dataapar.create', compact('tipe', 'jenis'));
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
            'jenis' => 'required',
            'berat' => 'required',
            'zona' => 'required',
            'lokasi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'gedung' => 'required',
            'lantai' => 'required',
            'titik' => 'required',
            'kedaluarsa' => 'required',
            'keterangan' => 'required',
        ]);
        $apar =  DataApar::create($request->all());
        $periodeNow = MasterInspeksi::whereDate('periode', '>=', date('Y-m-01'))->get();

        if (!empty($periodeNow)) {
            foreach ($periodeNow as $periode) {
                DetailInpeksiApar::create([
                    'periode_id' => $periode->id,
                    'apart_id' => $apar->id,
                ]);
            }
        }
        return redirect('/apar/dataapar')->with('success', 'dataapar saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataApar  $dataApar
     * @return \Illuminate\Http\Response
     */
    public function show(DataApar $dataApar)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataApar  $dataApar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipe = tipeAPAR::all();
        $jenis = JenisAPAR::all();
        $dataapar = DataApar::find($id);
        return view('supervisor.dataapar.edit', ['dataapar' => $dataapar, 'jenis' => $jenis, 'tipe' => $tipe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataApar  $dataApar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataApar $dataapar)
    {
        $request->validate([
            'tipe' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
            'zona' => 'required',
            'lokasi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'gedung' => 'required',
            'lantai' => 'required',
            'titik' => 'required',
            'kedaluarsa' => 'required',
            'keterangan' => 'required',
        ]);

        $dataapar->update($request->all());
        return redirect('/apar/dataapar')->with('success', 'Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataApar  $dataApar
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataApar $dataapar)
    {
        $dataapar->delete();
        return redirect('/apar/dataapar')->with('success', 'Data Apar Deleted');
    }
}

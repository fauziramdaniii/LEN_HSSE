<?php

namespace App\Http\Controllers;

use App\Models\AparInspeksi;
use App\Models\DataApar;
use App\Models\DetailInpeksiApar;
use App\Models\MasterInspeksi;
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
        $periode = MasterInspeksi::all();
        return view('inpeksiApar.inpeksi', compact('periode'));
    }

    public function detailInspeksi(MasterInspeksi $periode)
    {
        $aparinspeksi = $periode->load('DetailInspeksi');
        $sudahInspeksi = $periode->DetailInspeksi->whereNotNull('jenis')->count();
        $belumInspeksi = $periode->DetailInspeksi->whereNull('jenis')->count();
        return view('inpeksiApar.status', compact('aparinspeksi', 'sudahInspeksi', 'belumInspeksi'));
    }

    // public function status()
    // {
    //     $periode = MasterInspeksi::whereMonth('periode', date('m'))->whereYear('periode', date('Y'))->first();

    //     if (!empty($periode)) {
    //         $aparinspeksi = DetailInpeksiApar::where('periode_id', $periode->id)->with('Apart')->get();

    //         return view('inpeksiApar.status', compact('aparinspeksi', 'periode'));
    //     } else {
    //         return view('inpeksiApar.status');
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(MasterInspeksi $periode)
    {
        $aparinspeksi =  $periode->load(['DetailInspeksi']);
        return view('inpeksiApar.isiInpeksi', compact('aparinspeksi'));
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
            'id' => 'required',
            'jenis' => 'required',
            'noozle' => 'required',
            'selang' => 'required',
            'tabung' => 'required',
            'rambu' => 'required',
            'label' => 'required',
            'cat' => 'required',
            'pin' => 'required',
            'roda' => 'required',
            'keterangan' => 'required',

        ]);
        $apart = DetailInpeksiApar::with('periode', 'Apart')->where('id', $request->id)->first();
        $apart->update($request->all());
        if ($request->keterangan == 'Service') {
            $apart->Apart->update([
                'keterangan' => 'Service'
            ]);
        }


        return redirect('/apar/inspeksi/' . $apart->periode->id)->with('success', 'apar inspeksi saved!');
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
            'jenis' => 'required',
            'noozle' => 'required',
            'selang' => 'required',
            'tabung' => 'required',
            'rambu' => 'required',
            'label' => 'required',
            'cat' => 'required',
            'pin' => 'required',
            'roda' => 'required',
            'keterangan' => 'required',
            'foto' => 'required',
        ]);

        $aparinspeksi->update($request->all());

        return redirect('statusapar')->with('success', 'Data Updated!');
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

    public function hasil(DetailInpeksiApar $id)
    {
        $apar = $id->load('Apart');
        return response()->json(['data' => $id, 'apar' => $apar]);
    }
}

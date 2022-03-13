<?php

namespace App\Http\Controllers;

use PDF;
use Exception;
use App\Models\DataP3K;
use App\Models\InspeksiP3K;
use App\Models\IsiInspeksi;
use Illuminate\Http\Request;
use App\Models\MasterInspeksiP3K;

class InspeksiP3KController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = MasterInspeksiP3K::orderBy('periode')->get();
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
        if (empty($request->bukti)) {
            toast('Ambil Foto terlebih dahulu!', 'error');
            return back();
        }
        try {
            $img = $request->bukti;
            $folderPath = "foto_inspeksi_p3k/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.jpeg';
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);
        } catch (Exception $e) {
            return back();
        }
        $keterangan = "Lengkap";
        $inpeksi = $id->load('isi', 'isi.detail');

        foreach ($inpeksi->isi as $isi) {
            $isi->update([
                'jumlah' => $request->jumlah[$isi->id],
                'keterangan' => $request->keterangan[$isi->id]
            ]);

            if ($request->jumlah[$isi->id] < $isi->detail->standar) {
                $keterangan = "Belum Lengkap";
            }
        }

        $inpeksi->update([
            'status' => 'Sudah Inpeksi',
            'keterangan' => $keterangan,
            'tanggal' => date('Y-m-d'),
            'pemeriksa' => auth()->user()->name,
            'foto' => $fileName
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

    public function exportTahunan_pdf(DataP3K $id)
    {
        $bulan = [
            [
                'key' => '01',
                'bulan' => 'Januari'
            ],
            [
                'key' => '02',
                'bulan' => 'Februari'
            ],
            [
                'key' => '03',
                'bulan' => 'Maret'
            ],
            [
                'key' => '04',
                'bulan' => 'April'
            ],
            [
                'key' => '05',
                'bulan' => 'Mei'
            ],
            [
                'key' => '06',
                'bulan' => 'Juni'
            ],
            [
                'key' => '07',
                'bulan' => 'Juli'
            ],
            [
                'key' => '08',
                'bulan' => 'Agustus'
            ],
            [
                'key' => '09',
                'bulan' => 'September'
            ],
            [
                'key' => '10',
                'bulan' => 'Oktober'
            ],
            [
                'key' => '11',
                'bulan' => 'November'
            ],
            [
                'key' => '12',
                'bulan' => 'Desember'
            ],
        ];

        $p3k = $id->load('inspeksi', 'inspeksi.isi', 'inspeksi.isi.detail');
        $pdf = PDF::loadview('layouts.export_pdf_P3K_tahun', ['p3k' => $p3k, 'bulan' => $bulan]);
        $pdf->setPaper('A4', 'landscape');
        $file = "InspeksiTahunan_" . date('Ymdhis') . ".pdf";
        return $pdf->download($file);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DataP3K;
use App\Models\InspeksiP3K;
use App\Models\IsiInspeksi;
use App\Models\IsiP3K;
use Illuminate\Http\Request;
use App\Models\MasterInspeksiP3K;
use PDF;

class MasterInspeksiP3KController extends Controller
{
    public function index()
    {
        $periode = MasterInspeksiP3K::orderBy('periode')->get();
        return view('supervisor.datap3k.periode', compact('periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.datap3k.tambahPeriode');
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required'
        ]);
        if (DataP3K::count() < 1) {
            toast('Isi terlebih dahulu Data P3K', 'error');
            return back();
        }
        $check = MasterInspeksiP3K::where('periode',  date('Y-m-d', strtotime($request->periode)))->first();
        if (!empty($check)) {
            toast('Periode ' . date('F Y', strtotime($request->periode)) . ' sudah tersedia', 'error');
            return back();
        }
        $periode = date('Y-m-d', strtotime($request->periode));
        $request->validate([
            'periode' => 'required',
        ]);
        $createPeriode = MasterInspeksiP3K::create([
            'periode' => $periode,

        ]);
        if ($createPeriode) {
            foreach (DataP3K::all() as $p3k) {
                $createInspeksi = InspeksiP3K::create([
                    'periode_id' => $createPeriode->id,
                    'p3k_id' => $p3k->id,
                    'status' => 'Belum Inspeksi',
                ]);
                if ($createInspeksi) {
                    switch ($p3k->tipe) {
                        case 'A':
                            $isi = IsiP3K::where('tipe', 'A')->get();
                            break;
                        case 'B':
                            $isi = IsiP3K::where('tipe', 'B')->get();
                            break;
                        case 'C':
                            $isi = IsiP3K::where('tipe', 'C')->get();
                            break;
                        default:
                            break;
                    }

                    foreach ($isi as $isi) {
                        IsiInspeksi::create([
                            'inspeksi_id' => $createInspeksi->id,
                            'isi_id' => $isi->id,
                        ]);
                    }
                }
            }
        }
        toast('Periode Inspeksi berhasil ditambah', 'success');
        return redirect('/p3k/masterinspeksi')->with('success', 'Periode saved!');
    }

    public function destroy(MasterInspeksiP3K $masterinspeksi)
    {
        $masterinspeksi->delete();

        toast('Periode berhasil dihapus', 'success');
        return back();
    }

    public function export_pdf(MasterInspeksiP3K $id)
    {
        $periode = $id->load('DetailInspeksi', 'DetailInspeksi.isi', 'DetailInspeksi.isi.detail');
        $bulan = date('F-Y', strtotime($id->periode));
        $pdf = PDF::loadview('layouts.export_pdf_inspeksiP3K', ['periode' => $periode]);
        $pdf->setPaper('A4', 'landscape');
        $file = "HasilInspeksi_" . $bulan . "_" . date('Ymdhis') . ".xlsx";
        return $pdf->download($file);
    }
}

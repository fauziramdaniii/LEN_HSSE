<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\IsiP3k;
use App\Models\DataP3k;
use App\Models\InspeksiP3k;
use App\Models\IsiInspeksi;
use Illuminate\Http\Request;
use App\Models\MasterInspeksiP3k;


class MasterInspeksiP3kController extends Controller
{
    public function index()
    {
        $periode = MasterInspeksiP3k::orderBy('periode')->get();
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
        if (DataP3k::count() < 1) {
            toast('Isi terlebih dahulu Data P3K', 'error');
            return back();
        }
        $check = MasterInspeksiP3k::where('periode',  date('Y-m-d', strtotime($request->periode)))->first();
        if (!empty($check)) {
            toast('Periode ' . date('F Y', strtotime($request->periode)) . ' sudah tersedia', 'error');
            return back();
        }
        $periode = date('Y-m-d', strtotime($request->periode));
        $request->validate([
            'periode' => 'required',
        ]);
        $createPeriode = MasterInspeksiP3k::create([
            'periode' => $periode,

        ]);
        if ($createPeriode) {
            foreach (DataP3k::all() as $p3k) {
                $createInspeksi = InspeksiP3k::create([
                    'periode_id' => $createPeriode->id,
                    'p3k_id' => $p3k->id,
                    'status' => 'Belum Inspeksi',
                ]);
                if ($createInspeksi) {
                    switch ($p3k->tipe) {
                        case 'A':
                            $isi = IsiP3k::where('tipe', 'A')->get();
                            break;
                        case 'B':
                            $isi = IsiP3k::where('tipe', 'B')->get();
                            break;
                        case 'C':
                            $isi = IsiP3k::where('tipe', 'C')->get();
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

    public function destroy(MasterInspeksiP3k $masterinspeksi)
    {
        $masterinspeksi->delete();

        toast('Periode berhasil dihapus', 'success');
        return back();
    }

    public function export_pdf(MasterInspeksiP3k $id)
    {
        $periode = $id->load('DetailInspeksi', 'DetailInspeksi.isi', 'DetailInspeksi.isi.detail');
        $bulan = date('F-Y', strtotime($id->periode));
        $pdf = PDF::loadview('layouts.export_pdf_inspeksiP3K', ['periode' => $periode]);
        $pdf->setPaper('A4', 'landscape');
        $file = "HasilInspeksi_" . $bulan . "_" . date('Ymdhis') . ".pdf";
        return $pdf->download($file);
    }
}

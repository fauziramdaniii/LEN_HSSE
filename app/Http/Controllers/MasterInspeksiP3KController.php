<?php

namespace App\Http\Controllers;

use App\Models\DataP3K;
use App\Models\InspeksiP3K;
use App\Models\IsiInspeksi;
use App\Models\IsiP3K;
use Illuminate\Http\Request;
use App\Models\MasterInspeksiP3K;

class MasterInspeksiP3KController extends Controller
{
    public function index()
    {
        $periode = MasterInspeksiP3K::all();
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
        if (DataP3K::count() < 1) {
            return back()->with('error', 'Isi terlebih dahulu Data P3K');
        }
        $check = MasterInspeksiP3K::where('periode',  date('Y-m-d', strtotime($request->periode)))->first();
        if (!empty($check)) {
            return back()->with('error', 'Periode sudah ada');
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
        return redirect('/p3k/masterinspeksi')->with('success', 'Periode saved!');
    }
}

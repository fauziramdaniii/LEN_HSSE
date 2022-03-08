<?php

namespace App\Http\Controllers;

use App\Models\DataP3K;
use App\Models\DataApar;
use App\Models\InspeksiP3K;
use App\Models\tipeAPAR;
use App\Models\JenisAPAR;
use Illuminate\Http\Request;
use App\Models\MasterInspeksi;
use Dflydev\DotAccessData\Data;
use App\Models\MasterInspeksiP3K;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::User()->role == 'petugasapar') {
            return view('petugasapar.index');
        } else if (Auth::User()->role == 'petugasp3k') {
            return view('petugasp3k.index');
        }
    }

    public function apar()
    {
        $dashboard['jumlahAPAR'] = DataApar::count();
        $dashboard['dataAPAR'] = DataApar::all();
        $dashboard['jumlahPeriode'] = MasterInspeksi::count();
        $jenisApar = [];
        $jumlahJenis = [];
        $tipeApar = [];
        $jumlahTipe = [];
        $bulan = [];
        $aktif = [];
        $service = [];
        $stock = [];
        $tipe = tipeAPAR::select('nama_tipe')->get();
        $jenis = JenisAPAR::select('nama_jenis')->get();
        $periode = MasterInspeksi::with('DetailInspeksi')->whereYear('periode', date('Y'))->orderBy('periode')->get();
        foreach ($jenis as $data) {
            $jenisApar[] = $data->nama_jenis;
            $jumlahJenis[] = DataApar::where('jenis', $data->nama_jenis)->count();
        }

        foreach ($periode as $period) {
            $bulan[] = date('M', strtotime($period->periode));
            $aktif[] = $period->DetailInspeksi->where('keterangan', 'Aktif')->count();
            $service[] = $period->DetailInspeksi->where('keterangan', 'Service')->count();
            $stock[] = $period->DetailInspeksi->where('keterangan', 'n/a')->count();
        }

        foreach ($tipe as $data) {
            $tipeApar[] = $data->nama_tipe;
            $jumlahTipe[] = DataApar::where('tipe', $data->nama_tipe)->count();
        }
        return view('supervisor.dataapar.dashboard')->with($dashboard)->with([
            'jenisApar' => json_encode($jenisApar, JSON_NUMERIC_CHECK),
            'jumlahJenis' => json_encode($jumlahJenis, JSON_NUMERIC_CHECK), 'tipeApar' => json_encode($tipeApar, JSON_NUMERIC_CHECK),
            'jumlahTipe' => json_encode($jumlahTipe, JSON_NUMERIC_CHECK), 'periode' => json_encode($bulan, JSON_NUMERIC_CHECK), 'aktif' => json_encode($aktif, JSON_NUMERIC_CHECK),
            'service' => json_encode($service, JSON_NUMERIC_CHECK), 'stock' => json_encode($stock, JSON_NUMERIC_CHECK)
        ]);
    }

    public function p3k()
    {
        $jumlahTipe = [];
        $jumlahInspeksi = [];
        $bulan = [];
        $lengkap = [];
        $belumLengkap = [];
        $periode = MasterInspeksiP3K::with('DetailInspeksi')->whereYear('periode', date('Y'))->orderBy('periode')->get();
        foreach ($periode as $data) {
            $bulan[] = date('M', strtotime($data->periode));
            $lengkap[] = $data->DetailInspeksi->where('keterangan', 'Lengkap')->count();
            $belumLengkap[] = $data->DetailInspeksi->where('keterangan', 'Belum Lengkap')->count();
        }

        $periodeNow = MasterInspeksiP3K::whereMonth('periode', date('m'))->first();
        $inspeksi = InspeksiP3K::where('periode_id', @$periodeNow->id)->get();
        $jumlahInspeksi[] = $inspeksi->where('status', 'Sudah Inpeksi')->count();
        $jumlahInspeksi[] = $inspeksi->where('status', 'Belum Inspeksi')->count();
        $dashboard['jumlahP3K'] = DataP3K::count();
        $dashboard['dataP3K'] = DataP3K::all();
        $dashboard['jumlahPeriode'] = MasterInspeksiP3K::count();
        $jumlahTipe[] = DataP3K::where('tipe', 'A')->count();
        $jumlahTipe[] = DataP3K::where('tipe', 'B')->count();
        $jumlahTipe[] = DataP3K::where('tipe', 'C')->count();
        return view('supervisor.datap3k.dashboard')->with($dashboard)->with([
            'jumlahTipe' => json_encode($jumlahTipe, JSON_NUMERIC_CHECK),
            'jumlahInspeksi' => json_encode($jumlahInspeksi, JSON_NUMERIC_CHECK),
            'periode' => json_encode($bulan, JSON_NUMERIC_CHECK),
            'lengkap' => json_encode($lengkap, JSON_NUMERIC_CHECK),
            'belum_lengkap' => json_encode($belumLengkap, JSON_NUMERIC_CHECK),
        ]);
    }

    public function pilih()
    {

        $jumlahApar = DataApar::count();
        $jumlahP3K = DataP3K::count();
        return view('layouts.pilih', compact('jumlahApar', 'jumlahP3K'));
    }
}

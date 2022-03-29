<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\DataP3k;
use App\Models\DataApar;
use App\Models\TipeApar;
use App\Models\JenisApar;
use App\Models\ZonaLokasi;
use App\Models\InspeksiP3k;
use App\Models\MasterInspeksi;
use App\Models\DetailInpeksiApar;
use App\Models\MasterInspeksiP3k;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::User()->role == 'superadmin') {
            $data['supervisior'] = User::where('role', 'supervisor')->get();
            $data['pelaksanaapar'] = User::where('role', 'petugasapar')->count();
            $data['pelaksanap3k'] = User::where('role', 'petugasp3k')->count();
            $data['pelaksana'] = User::where('role', 'petugasp3k')->orWhere('role', 'petugasapar')->get();
            return view('superadmin.dashboard')->with($data);
        }
        if (Auth::User()->role == 'petugasapar') {
            $dashboard['jumlahAPAR'] = DataApar::count();
            $dashboard['dataAPAR'] = DataApar::all();
            $dashboard['aparAktif'] = DataApar::where('keterangan', 'Aktif')->count();
            $dashboard['aparService'] = DataApar::where('keterangan', 'Service')->count();
            $dashboard['aparStock'] = DataApar::where('keterangan', 'Stock')->count();
            $dashboard['zonas'] = ZonaLokasi::all();
            $jenisApar = [];
            $jumlahJenis = [];
            $tipeApar = [];
            $jumlahTipe = [];
            $bulan = [];
            $aktif = [];
            $service = [];
            $jumlahInspeksi = [];
            $stock = [];
            $tipe = TipeApar::all();
            $jenis = JenisApar::all();
            $periodeNow = MasterInspeksi::whereMonth('periode', date('m'))->whereYear('periode', date('Y'))->first();
            $inspeksi = DetailInpeksiApar::where('periode_id', @$periodeNow->id)->get();
            $jumlahInspeksi[] = $inspeksi->whereNull('tanggal')->count();
            $jumlahInspeksi[] = $inspeksi->whereNotNull('tanggal')->count();
            $periode = MasterInspeksi::with('DetailInspeksi')->whereYear('periode', date('Y'))->orderBy('periode')->get();
            foreach ($jenis as $data) {
                $jenisApar[] = $data->nama_jenis;
                $jumlahJenis[] = DataApar::where('jenis_id', $data->id)->count();
            }

            foreach ($periode as $period) {
                $bulan[] = date('M', strtotime($period->periode));
                $aktif[] = $period->DetailInspeksi->where('keterangan', 'Aktif')->count();
                $service[] = $period->DetailInspeksi->where('keterangan', 'Service')->count();
                $stock[] = $period->DetailInspeksi->where('keterangan', 'n/a')->count();
            }

            foreach ($tipe as $data) {
                $tipeApar[] = $data->nama_tipe;
                $jumlahTipe[] = DataApar::where('tipe_id', $data->id)->count();
            }
            return view('petugasapar.index')->with($dashboard)->with([
                'jenisApar' => json_encode($jenisApar, JSON_NUMERIC_CHECK),
                'jumlahJenis' => json_encode($jumlahJenis, JSON_NUMERIC_CHECK), 'tipeApar' => json_encode($tipeApar, JSON_NUMERIC_CHECK),
                'jumlahTipe' => json_encode($jumlahTipe, JSON_NUMERIC_CHECK), 'periode' => json_encode($bulan, JSON_NUMERIC_CHECK), 'aktif' => json_encode($aktif, JSON_NUMERIC_CHECK),
                'service' => json_encode($service, JSON_NUMERIC_CHECK), 'stock' => json_encode($stock, JSON_NUMERIC_CHECK),
                'jumlahInspeksi' => json_encode($jumlahInspeksi, JSON_NUMERIC_CHECK), 'stock' => json_encode($stock, JSON_NUMERIC_CHECK)
            ]);
        } else if (Auth::User()->role == 'petugasp3k') {
            $dashboard['zonas'] = ZonaLokasi::all();
            $jumlahTipe = [];
            $jumlahInspeksi = [];
            $bulan = [];
            $lengkap = [];
            $belumLengkap = [];
            $periode = MasterInspeksiP3k::with('DetailInspeksi')->whereYear('periode', date('Y'))->orderBy('periode')->get();
            foreach ($periode as $data) {
                $bulan[] = date('M', strtotime($data->periode));
                $lengkap[] = $data->DetailInspeksi->where('keterangan', 'Lengkap')->count();
                $belumLengkap[] = $data->DetailInspeksi->where('keterangan', 'Belum Lengkap')->count();
            }

            $periodeNow = MasterInspeksiP3k::whereMonth('periode', date('m'))->first();
            $inspeksi = InspeksiP3k::where('periode_id', @$periodeNow->id)->get();
            $jumlahInspeksi[] = $inspeksi->where('status', 'Sudah Inpeksi')->count();
            $jumlahInspeksi[] = $inspeksi->where('status', 'Belum Inspeksi')->count();
            $dashboard['jumlahP3K'] = DataP3k::count();
            $dashboard['dataP3K'] = DataP3k::all();
            $dashboard['jumlahPeriode'] = MasterInspeksiP3k::count();
            $jumlahTipe[] = DataP3k::where('tipe', 'A')->count();
            $jumlahTipe[] = DataP3k::where('tipe', 'B')->count();
            $jumlahTipe[] = DataP3k::where('tipe', 'C')->count();
            return view('petugasp3k.index')->with($dashboard)->with([
                'jumlahTipe' => json_encode($jumlahTipe, JSON_NUMERIC_CHECK),
                'jumlahInspeksi' => json_encode($jumlahInspeksi, JSON_NUMERIC_CHECK),
                'periode' => json_encode($bulan, JSON_NUMERIC_CHECK),
                'lengkap' => json_encode($lengkap, JSON_NUMERIC_CHECK),
                'belum_lengkap' => json_encode($belumLengkap, JSON_NUMERIC_CHECK),
            ]);
        }
    }

    public function apar()
    {
        $dashboard['jumlahAPAR'] = DataApar::count();
        $dashboard['dataAPAR'] = DataApar::all();
        $dashboard['aparAktif'] = DataApar::where('keterangan', 'Aktif')->count();
        $dashboard['aparService'] = DataApar::where('keterangan', 'Service')->count();
        $dashboard['aparStock'] = DataApar::where('keterangan', 'Stock')->count();
        $dashboard['zonas'] = ZonaLokasi::all();
        $jenisApar = [];
        $jumlahJenis = [];
        $tipeApar = [];
        $jumlahTipe = [];
        $bulan = [];
        $aktif = [];
        $service = [];
        $stock = [];
        $jumlahInspeksi = [];
        $tipe = TipeApar::all();
        $jenis = JenisApar::all();
        $periode = MasterInspeksi::with('DetailInspeksi')->whereYear('periode', date('Y'))->orderBy('periode')->get();
        $periodeNow = MasterInspeksi::whereMonth('periode', date('m'))->whereYear('periode', date('Y'))->first();
        $inspeksi = DetailInpeksiApar::where('periode_id', @$periodeNow->id)->get();
        $jumlahInspeksi[] = $inspeksi->whereNull('tanggal')->count();
        $jumlahInspeksi[] = $inspeksi->whereNotNull('tanggal')->count();
        foreach ($jenis as $data) {
            $jenisApar[] = $data->nama_jenis;
            $jumlahJenis[] = DataApar::where('jenis_id', $data->id)->count();
        }

        foreach ($periode as $period) {
            $bulan[] = date('M', strtotime($period->periode));
            $aktif[] = $period->DetailInspeksi->where('keterangan', 'Aktif')->count();
            $service[] = $period->DetailInspeksi->where('keterangan', 'Service')->count();
            $stock[] = $period->DetailInspeksi->where('keterangan', 'n/a')->count();
        }

        foreach ($tipe as $data) {
            $tipeApar[] = $data->nama_tipe;
            $jumlahTipe[] = DataApar::where('tipe_id', $data->id)->count();
        }
        return view('supervisor.dataapar.dashboard')->with($dashboard)->with([
            'jenisApar' => json_encode($jenisApar, JSON_NUMERIC_CHECK),
            'jumlahJenis' => json_encode($jumlahJenis, JSON_NUMERIC_CHECK), 'tipeApar' => json_encode($tipeApar, JSON_NUMERIC_CHECK),
            'jumlahTipe' => json_encode($jumlahTipe, JSON_NUMERIC_CHECK), 'periode' => json_encode($bulan, JSON_NUMERIC_CHECK), 'aktif' => json_encode($aktif, JSON_NUMERIC_CHECK),
            'service' => json_encode($service, JSON_NUMERIC_CHECK), 'stock' => json_encode($stock, JSON_NUMERIC_CHECK), 'service' => json_encode($service, JSON_NUMERIC_CHECK), 'stock' => json_encode($stock, JSON_NUMERIC_CHECK),
            'jumlahInspeksi' => json_encode($jumlahInspeksi, JSON_NUMERIC_CHECK), 'stock' => json_encode($stock, JSON_NUMERIC_CHECK)
        ]);
    }

    public function p3k()
    {
        $dashboard['zonas'] = ZonaLokasi::all();
        $jumlahTipe = [];
        $jumlahInspeksi = [];
        $bulan = [];
        $lengkap = [];
        $belumLengkap = [];
        $periode = MasterInspeksiP3k::with('DetailInspeksi')->whereYear('periode', date('Y'))->orderBy('periode')->get();
        foreach ($periode as $data) {
            $bulan[] = date('M', strtotime($data->periode));
            $lengkap[] = $data->DetailInspeksi->where('keterangan', 'Lengkap')->count();
            $belumLengkap[] = $data->DetailInspeksi->where('keterangan', 'Belum Lengkap')->count();
        }

        $periodeNow = MasterInspeksiP3k::whereMonth('periode', date('m'))->first();
        $inspeksi = InspeksiP3k::where('periode_id', @$periodeNow->id)->get();
        $jumlahInspeksi[] = $inspeksi->where('status', 'Sudah Inpeksi')->count();
        $jumlahInspeksi[] = $inspeksi->where('status', 'Belum Inspeksi')->count();
        $dashboard['jumlahP3K'] = DataP3k::count();
        $dashboard['dataP3K'] = DataP3k::all();
        $dashboard['jumlahPeriode'] = MasterInspeksiP3k::count();
        $jumlahTipe[] = DataP3k::where('tipe', 'A')->count();
        $jumlahTipe[] = DataP3k::where('tipe', 'B')->count();
        $jumlahTipe[] = DataP3k::where('tipe', 'C')->count();
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
        $jumlahP3K = DataP3k::count();
        return view('layouts.pilih', compact('jumlahApar', 'jumlahP3K'));
    }
}

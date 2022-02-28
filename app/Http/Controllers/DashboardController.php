<?php

namespace App\Http\Controllers;

use App\Models\DataApar;
use App\Models\DataP3K;
use Illuminate\Http\Request;
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
        return view('supervisor.dataapar.dashboard');
    }

    public function p3k()
    {
        return view('supervisor.datap3k.dashboard');
    }

    public function pilih()
    {
        $jumlahApar = DataApar::count();
        $jumlahP3K = DataP3K::count();
        return view('layouts.pilih', compact('jumlahApar', 'jumlahP3K'));
    }
}

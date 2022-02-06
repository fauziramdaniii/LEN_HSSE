<?php

namespace App\Http\Controllers;

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
}

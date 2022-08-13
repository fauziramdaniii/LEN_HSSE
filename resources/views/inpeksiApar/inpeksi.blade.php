@extends('layouts.main')
@section('sidebar')
    @if (Auth::User()->role == 'supervisor')
        <li class="nav-item {{ Request::is('apar/dashboard') ? 'active' : '' }}">
            <a class="nav-link " href="/apar/dashboard">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('apar/dataapar*') ? 'active' : '' }}">
            <a class="nav-link" href="/apar/dataapar">
                <i class="mdi mdi-fire-extinguisher menu-icon"></i>
                <span class="menu-title">Master APAR</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('apar/masterinspeksi*') ? 'active' : '' }}">
            <a class="nav-link" href="/apar/masterinspeksi">
                <i class="mdi mdi-calendar-clock menu-icon"></i>
                <span class="menu-title">Master Inspeksi</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('apar/inspeksi*') ? 'active' : '' }}">
            <a class="nav-link" href="/apar/inspeksi">
                <i class="mdi mdi-clipboard-text menu-icon"></i>
                <span class="menu-title">Inspeksi APAR</span>
            </a>
        </li>
    @else
        <li class="nav-item  {{ Request::is('dashboard*') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('apar/inspeksi*') ? 'active' : '' }}">
            <a class="nav-link" href="/apar/inspeksi">
                <i class="mdi mdi-clipboard-text menu-icon"></i>
                <span class="menu-title">Inspeksi APAR</span>
            </a>
        </li>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">List Periode</h3>
            <h6 class="font-weight-normal mb-0">
                Pilih salah satu periode untuk melihat inspeksi di periode tersebut
            </h6>
        </div>
        <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="mdi mdi-calendar"></i>
                        {{ empty(Request::get('tahun')) ? 'Today (' . date('Y') . ')' : Request::get('tahun') }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        @for ($i = 2022; $i <= 2032; $i++)
                            <a class="dropdown-item" href="/apar/inspeksi?tahun={{ $i }}">{{ $i }}</a>
                        @endfor
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    @foreach($periode as $periode)
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">
                            <center> {{ date('F Y', strtotime($periode->periode)) }}
                        </h4>

                        <div class="media">
                            <div class="media-body">
                                <center> <a href="/apar/inspeksi/{{ $periode->id }}"
                                        class=" card-text btn btn-success btn-sm" style="">Lihat Inspeksi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
=======
    @endforeach
</div>
>>>>>>> dfbb723442c4fbb10de6ef58d583a92c7f6742c6
@endsection

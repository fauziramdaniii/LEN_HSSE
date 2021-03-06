@extends('layouts.main')
@section('sidebar')
@if(Auth::User()->role == 'supervisor')
<li class="nav-item {{Request::is('p3k/dashboard*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/dashboard">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('p3k/datap3k*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/datap3k">
        <i class="mdi mdi-medical-bag menu-icon"></i>
        <span class="menu-title">Master P3K</span>
    </a>
</li>
<li class="nav-item {{Request::is('p3k/masterinspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/masterinspeksi">
        <i class="mdi mdi-calendar-clock menu-icon"></i>
        <span class="menu-title">Master Inspeksi</span>
    </a>
</li>

<li class="nav-item {{Request::is('p3k/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/inspeksi">
        <i class="mdi mdi-clipboard-text menu-icon"></i>
        <span class="menu-title">Inspeksi P3K</span>
    </a>
</li>
@else
<li class="nav-item {{Request::is('dashboard*') ? 'active' : ''}}">
    <a class="nav-link" href="/dashboard">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('p3k/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/inspeksi">
        <i class="mdi mdi-clipboard-text menu-icon"></i>
        <span class="menu-title">Inspeksi P3K</span>
    </a>
</li>
@endif
@endsection

@section ("content")
<h3>
    <center>Hasil Inspeksi
</h3>
<br>
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th width="35%">Isi</th>
                                <th width="15%">Standar</th>
                                <th widt="15%">Jumlah</th>
                                <th width="35%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inpeksi->isi as $isi)
                            <tr>
                                <td>
                                    <p class="ml-2">{{$isi->detail->isi}}</p>
                                </td>
                                <td class="text-center">{{$isi->detail->standar}}</td>
                                <td class="text-center">{{$isi->jumlah}}</td>
                                <td>
                                    <p class="ml-2">{{empty($isi->keterangan) ? '-' :$isi->keterangan }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mt-3">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Bukti Foto</p>
                <center><img src="{{asset('foto_inspeksi_p3k/'.$inpeksi->foto)}}" class="fotoBukti" alt=""></center>
            </div>
        </div>
    </div>
</div>
@endsection
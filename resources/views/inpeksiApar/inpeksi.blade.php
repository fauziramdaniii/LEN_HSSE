@extends('layouts.main')
@section('sidebar')
@if(Auth::User()->role == 'supervisor')
<li class="nav-item">
    <a class="nav-link {{Request::is('apar/dashboard*') ? 'active' : ''}} " href="/apar/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('apar/dataapar*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/dataapar">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Master APAR</span>
    </a>
</li>
<li class="nav-item {{Request::is('apar/masterinspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/masterinspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Master Inspeksi</span>
    </a>
</li>

<li class="nav-item {{Request::is('apar/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/inspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
    </a>
</li>
@else
<li class="nav-item">
    <a class="nav-link" href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/apar/inspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
    </a>
</li>
@endif
@endsection

@section ("content")
<br>
<h3 class="font-weight-bold text-center">
    PILIH PERIODE INSPEKSI
</h3>

<br>
<div class="row">
    @foreach($periode as $periode)
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <center> {{ date('F Y',strtotime ($periode->periode))  }}
                </h4>
                <div class="media">
                    <div class="media-body">
                        <center> <a href="/apar/inspeksi/{{$periode->id}}" class=" card-text btn btn-success btn-sm" style="">Lihat Inspeksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
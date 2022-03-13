@extends('layouts.main')
@section('sidebar')
@if(Auth::User()->role == 'supervisor')
<li class="nav-item {{Request::is('p3k/dashboard*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('p3k/datap3k*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/datap3k">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Master P3K</span>
    </a>
</li>
<li class="nav-item {{Request::is('p3k/masterinspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/masterinspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Master Inspeksi</span>
    </a>
</li>

<li class="nav-item {{Request::is('p3k/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/inspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Inspeksi P3K</span>
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
    <a class="nav-link" href="/p3k/inspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Inspeksi P3K</span>
    </a>
</li>
@endif
@endsection

@section ("content")

<h3 class="font-weight-bold">
    <center>Pilih Periode Inspeksi</center>
</h3>
<br>
<div class="row">
    @foreach($periode as $periode)
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ date('F Y',strtotime ($periode->periode))  }}</h4>
                <div class="media">
                    <div class="media-body">
                        <a href="/p3k/inspeksi/{{$periode->id}}" class=" card-text btn btn-success btn-sm" style="">Lihat Inspeksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
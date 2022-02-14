@extends('layouts.main')
@section('sidebar')
<li class="nav-item">
    <a class="nav-link" href="/apar/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/apar/dataapar">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Master APAR</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/apar/masterinspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Master Inspeksi</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="/apar/inspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
    </a>
</li>

<!-- <li class="nav-item">
    <a class="nav-link" href="/apar/report">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Report APAR</span>
    </a>
</li> -->


@endsection
@extends('layouts.main')
@section('sidebar')
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
@endsection
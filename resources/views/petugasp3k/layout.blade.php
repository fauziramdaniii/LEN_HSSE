@extends('layouts.main')
@section('sidebar')
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
@endsection
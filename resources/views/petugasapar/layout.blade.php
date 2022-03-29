@extends('layouts.main')
@section('sidebar')
<li class="nav-item  {{Request::is('dashboard*') ? 'active' : ''}}">
    <a class="nav-link" href="/dashboard">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('apar/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/inspeksi">
        <i class="mdi mdi-clipboard-text menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
    </a>
</li>
@endsection
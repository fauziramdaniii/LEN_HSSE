@extends('layouts.main')
@section('sidebar')
<li class="nav-item {{Request::is('apar/dashboard') ? 'active' : ''}}">
    <a class="nav-link " href="/apar/dashboard">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('apar/dataapar*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/dataapar">
        <i class="mdi mdi-fire-extinguisher menu-icon"></i>
        <span class="menu-title">Master APAR</span>
    </a>
</li>
<li class="nav-item {{Request::is('apar/masterinspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/masterinspeksi">
        <i class="mdi mdi-calendar-clock menu-icon"></i>
        <span class="menu-title">Master Inspeksi</span>
    </a>
</li>

<li class="nav-item {{Request::is('apar/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/inspeksi">
        <i class="mdi mdi-clipboard-text menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
    </a>
</li>

</li>

<!-- <li class="nav-item">
    <a class="nav-link" href="/apar/report">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Report APAR</span>
    </a>
</li> -->


@endsection
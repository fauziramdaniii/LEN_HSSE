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
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href=""> Report APAR</a></li>
            <li class="nav-item"> <a class="nav-link" href="/apar/statusapar">Status Apar</a></li>
            <li class="nav-item"> <a class="nav-link" href="/apar/aparinspeksi"> Inspeksi APAR </a></li>
        </ul>
    </div>
</li>
@endsection
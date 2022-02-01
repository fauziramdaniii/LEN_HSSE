@extends('layouts.main')
@section('sidebar')
<li class="nav-item">
    <a class="nav-link" href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">APAR Report</a></li>
            <li class="nav-item"> <a class="nav-link" href="/apar/statusapar">Status Apar</a></li>
            <li class="nav-item"> <a class="nav-link" href="/apar/aparinspeksi">APAR Inspeksi</a></li>
        </ul>
    </div>
</li>
@endsection
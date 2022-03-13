@extends('layouts.main')
@section('sidebar')
<li class="nav-item {{Request::is('dashboard*') ? 'active' : ''}}">
    <a class="nav-link" href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
@endsection
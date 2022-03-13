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
<?php $no = 1 ?>
@section ("content")
@include('sweetalert::alert')
<h3 class="font-weight-bold">
    <center>Data Inpeksi P3K (Periode {{date('F Y',strtotime($periode->periode))}})
</h3>

<div class="col-sm-12">
    <br>
    @if (session()->get('success'))
    <div class="alert alert-sucess">
        {{ session()->get('sucess') }}
    </div>
    @endif
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">{{$periode->DetailInspeksi->where('status','Sudah Inpeksi')->count()}}</h4>
                <div class="media">

                    <div class="media-body">
                        <p class="card-text">P3K yang sudah diinspeksi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">{{$periode->DetailInspeksi->where('status','Belum Inspeksi')->count()}}</h4>
                <div class="media">

                    <div class="media-body">
                        <p class="card-text">P3K yang belum diinspeksi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="display expandable-table col-sm-12">
                <thead>
                    <tr class="text-center">
                        <th> No </th>
                        <th> Kode P3K </th>
                        <th> Tipe P3K </th>
                        <th>
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periode->DetailInspeksi as $detil)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$detil->dataP3K->id}}</td>
                        <td>{{$detil->dataP3K->tipe}}</td>
                        <td>
                            @if($detil->status =="Belum Inspeksi")
                            <a href="/p3k/inspeksi/{{$detil->id}}/inputInpeksi" class="btn btn-sm btn-warning">Isi Inspeksi</a>
                            @else
                            <a href="/p3k/inspeksi/{{$detil->id}}/hasilInpeksi" class="btn btn-sm btn-success">Lihat Hasil</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modalHasil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hasil Inspeksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display expandable-table" style="width: 100%">
                    <thead>
                        <tr class="text-center">
                            <th> PRESSURE/CATRIDGE</th>
                            <th> NOZZLE </th>
                            <th> SELANG </th>
                            <th> TABUNG </th>
                            <th> RAMBU </th>
                            <th> LABEL </th>
                            <th> KONDISI CAT </th>
                            <th> SAFETY PIN </th>
                            <th> RODA </th>
                            <th> KETERANGAN </th>
                            <th> FOTO </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td></td>
                            <td> </td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).on('ready', function() {
        console.log('aa');
    })
</script>
@endsection
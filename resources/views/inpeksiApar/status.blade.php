@extends('layouts.main')
@section('sidebar')
@if(Auth::User()->role == 'supervisor')
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
@else
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
@endif
@endsection
<?php $no = 1 ?>
@section ("content")
<div class="content-wrapper">
    <br>
    <h3>
        <center>Data Inpeksi APAR (Periode {{date('F Y')}})
    </h3>

    <div class="col-sm-12">
        <br>
        @if (session()->get('success'))
        <div class="alert alert-sucess">
            {{ session()->get('sucess') }}
        </div>
        @endif
    </div>
    @if(!empty($aparinspeksi))
    <center>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$periode->sudah_inspeksi}}</h4>
                        <div class="media">

                            <div class="media-body">
                                <p class="card-text">APAR yang sudah diinpeksi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$periode->belum_inspeksi}}</h4>
                        <div class="media">

                            <div class="media-body">
                                <p class="card-text">APAR yang belum diinpeksi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="display expandable-table col-sm-12">
                <thead>
                    <tr class="text-center">
                        <th> No </th>
                        <th> Kode Apar </th>
                        <th> Tipe Apar </th>
                        <th> Jenis Apar </th>
                        <th>
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aparinspeksi as $dataapar)
                    <tr class="text-center">
                        <td> {{ $no++ }} </td>
                        <td> {{ $dataapar->Apart->id }} </td>
                        <td> {{ $dataapar->Apart->tipe }} </td>
                        <td> {{ $dataapar->Apart->jenis }} </td>
                        <td>
                            @if($dataapar->jenis==null)
                            <p class="text-danger">Apar Belum Diinpeksi</p>
                            @else
                            <a class="text-success lihatHasil" href="#" data-toggle="modal" data-target="#modalHasil">Apar Sudah Diinpeksi</a>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Inpeksi Apart Bulan {{date('F Y')}} Belum Dibuka</h4>
            </div>
        </div>

        @endif
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
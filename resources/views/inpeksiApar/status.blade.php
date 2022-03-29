@extends('layouts.main')
@section('sidebar')
@if(Auth::User()->role == 'supervisor')
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

@else
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
@endif
@endsection
<?php $no = 1 ?>
@section ("content")
@include('sweetalert::alert')
<br>
<h3 class="font-weight-bold text-center">
    Data Inspeksi APAR (Periode {{date('F Y',strtotime($aparinspeksi->periode))}})
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
                <h4 class="card-title">{{$sudahInspeksi}}</h4>
                <div class="media">

                    <div class="media-body">
                        <p class="card-text">APAR yang sudah diinspeksi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">{{$belumInspeksi}}</h4>
                <div class="media">

                    <div class="media-body">
                        <p class="card-text">APAR yang belum diinspeksi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <a href="/apar/inspeksi/{{$aparinspeksi->id}}/inputInpeksiApar" class="btn btn-info btn-md my-2" style="float:right">Input Inspeksi</a>
    <table class="display expandable-table col-sm-12">
        <thead>
            <tr class="text-center">
                <th> No </th>
                <th> Kode APAR </th>
                <th> Tipe APAR </th>
                <th> Jenis APAR </th>
                <th>
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aparinspeksi->DetailInspeksi as $dataapar)
            <tr class="text-center">
                <td> {{ $no++ }} </td>
                <td> {{ $dataapar->Apart->kd_apar }} </td>
                <td> {{ $dataapar->Apart->Tipe->nama_tipe }} </td>
                <td> {{ $dataapar->Apart->Jenis->nama_jenis }} </td>
                <td>
                    @if($dataapar->jenis==null)
                    <p class="text-danger">APAR Belum Diinspeksi</p>
                    @else
                    <a class="text-success lihatHasil" href="#" data-toggle="modal" data-target="#modalHasil" data-id="{{$dataapar->id}}">APAR Sudah Diinspeksi</a>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modalHasil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hasil Inspeksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-weight-bold">Kode APAR : <span id="kdApar"></span></p>
                <p class="font-weight-bold">Tanggal Inspeksi : <span id="tanggal"></span></p>
                <table class=" table table-bordered" style="width: 100%">
                    <tbody>
                        <tr class="">
                            <td class="font-weight-bold"><b>PRESSURE/CATRIDGE</b> </td>
                            <td> <span id="pressure"></span></td>
                        </tr>
                        <tr class="">
                            <td class="font-weight-bold"><b>NOZZLE</b></td>
                            <td> <span id="nozzle"></span></td>
                        </tr>
                        <tr class="">
                            <td class="font-weight-bold">SELANG</td>
                            <td> <span id="selang"></span></td>
                        </tr>
                        <tr class="">
                            <td class="font-weight-bold">TABUNG</td>
                            <td> <span id="tabung"></span></td>
                        </tr>
                        <tr class="">
                            <td class="font-weight-bold">RAMBU</td>
                            <td> <span id="rambu"></span></td>
                        </tr>
                        <tr class="">
                            <td class="font-weight-bold">LABEL</td>
                            <td> <span id="label"></span></td>
                        </tr>
                        <tr class="">
                            <td class="font-weight-bold">KONDISI CAT</td>
                            <td> <span id="cat"></span></td>
                        </tr>
                        <tr class="">
                            <td class="font-weight-bold">SAFETY PIN</td>
                            <td> <span id="pin"></span></td>
                        </tr>
                        <tr class="">
                            <td class="font-weight-bold">RODA</td>
                            <td> <span id="roda"></span></td>
                        </tr>
                        <tr class="">
                            <td class="font-weight-bold">KETERANGAN </td>
                            <td> <span id="keterangan"></span></td>
                        </tr>

                    </tbody>

                </table>
                <p class="mt-3 font-weight-bold">Bukti Foto :</p>
                <img id="buktiFoto" class="fotoBukti" alt="">
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
    var flagsUrl = "{{ URL::asset('/foto_inspeksi_apar') }}";

    $('.lihatHasil').on('click', function() {
        var id = $(this).attr('data-id');
        $.get('/apar/hasilInspeksi/' + id, function(data) {
            $('#pressure').text(data.data.jenis);
            $('#nozzle').text(data.data.noozle);
            $('#selang').text(data.data.selang);
            $('#tabung').text(data.data.tabung);
            $('#rambu').text(data.data.rambu);
            $('#label').text(data.data.label);
            $('#cat').text(data.data.cat);
            $('#pin').text(data.data.pin);
            $('#roda').text(data.data.roda);
            $('#keterangan').text(data.data.keterangan);
            $('#tanggal').text(data.data.tanggal);
            $('#kdApar').text(data.apar.id);
            $("#buktiFoto").attr("src", flagsUrl + "/" + data.data.foto);
        });
    });
</script>
@endsection
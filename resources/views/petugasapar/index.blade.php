@extends('layouts.apar')
<?php $no=1 ?>
@section ("content")
<div class="content-wrapper">
<br>
<h3><center>Inspeksi APAR </h3>
    <div class="col-sm-12">
<br>
        @if (session()->get('success'))
            <div class="alert alert-sucess">
                {{ session()->get('sucess') }}
            </div>
        @endif
    </div>  
    <div class="table-responsive">
<table class="display expandable-table" style="width: 100%">
    <thead>
        <tr class="text-center">
            <th> No </th>
            <th> Kode Apar </th>
            <th> Tipe Apar </th>
            <th> Berat Apar </th>
            <th> Zona Apar</th>
            <th> Kedaluarsa </th>
            <th> Keterangan </th>
            <th colspan='2'>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aparinspeksi as $aparinspeksi)
        <tr class="text-center">
            <td> {{ $no++ }} </td>
            <td> {{ $aparinspeksi->id }} </td>
            <td> {{ $aparinspeksi->tipe }} </td>
            <td> {{ $aparinspeksi->berat }} </td>
            <td> {{ $aparinspeksi->zona }} </td>
            <td> {{ $aparinspeksi->kedaluarsa }} </td>
            <td> {{ $aparinspeksi->keterangan}}
                <td>
            <a href="/aparinspeksi/create" class="btn btn-info"> Inspeksi </a>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#modalHasil"class="btn btn-success"> Hasil </a>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>

<!-- Modal -->
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
                        <th> PRESSURE G/CATRIDG</th>
                        <th> NOZZLE </th>
                        <th> SELANG </th>
                        <th> TABUNG </th>
                        <th> RAMBU </th>
                        <th> LABEL </th>
                        <th> KONDISI CAT </th>
                        <th> SAFETY PIN </th>
                        <th> RODA </th>
                    </tr>
                    
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td> OK</td>
                        <td> OK </td>
                        <td> OK </td>
                        <td> OK </td>
                        <td> OK </td>
                        <td> OK </td>
                        <td> OK </td>
                        <td> OK  </td>
                        <td> OK </td>
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

@section('modal')

  @endsection
            
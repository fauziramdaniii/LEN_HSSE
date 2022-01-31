@extends('layouts.main')
<?php $no=1 ?>
@section ("content")
<div class="content-wrapper">
<br>
<h3><center>DATA APAR </h3>
    <center><a href="masterinspeksi/create" class="btn btn-info"> Tambah P </a>
<a href="masterinspeksi/create" class="btn btn-warning"> Export Data </a>
    <div class="col-sm-12">
<br>
        @if (session()->get('success'))
            <div class="alert alert-sucess">
                {{ session()->get('sucess') }}
            </div>
        @endif
    </div>  
    <div class="table-responsive">
<table class="display expandable-table ">
    <thead>
        <tr class="text-center">
            <th> No </th>
            <th> Periode </th>
            <th> Status </th>
            <th> Telah di Inpeksi </th>
            <th> Belum di Inpeksi </th>
            <th> Aksi </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periode as $periode)
        <tr class="text-center">
            <td> {{ $no++ }} </td>
            <td> {{ date('F Y',strtotime ($periode->periode))  }} </td>
            <td> {{ $periode->status }} </td>
            <td> {{ $periode->sudah_inspeksi }} </td>
            <td> {{ $periode->belum_inspeksi }} </td>
                <td>
                    <form action="periode/{{ $periode->periode}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"> Delete</button>
                    </form>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection
            
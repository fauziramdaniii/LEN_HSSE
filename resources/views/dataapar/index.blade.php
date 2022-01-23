@extends('layouts.main')
<?php $no=1 ?>
@section ("content")
<div class="content-wrapper">
<br>
<h3><center>DATA APAR </h3>
    <center><a href="/dataapar/create" class="btn btn-info"> Tambah Data </a>
<a href="/dataapar/create" class="btn btn-warning"> Export Data </a>
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
        <tr>
            <th> Kode Apar </th>
            <th> Tipe Apar </th>
            <th> Jenis Apar </th>
            <th> Berat Apar </th>
            <th> Zona Apar</th>
            <th> Lokasi </th>
            <th> Provinsi </th>
            <th> Kota </th>
            <th> Gedung </th>
            <th> Lantai </th>
            <th> Titik </th>
            <th> Kedaluarsa </th>
            <th> Keterangan </th>
            <th colspan='2'><center>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataapar as $dataapar)
        <tr>
            <td> {{ $no++ }} </td>
            <td> {{ $dataapar->tipe }} </td>
            <td> {{ $dataapar->jenis }} </td>
            <td> {{ $dataapar->berat }} </td>
            <td> {{ $dataapar->zona }} </td>
            <td> {{ $dataapar->lokasi }} </td>
            <td> {{ $dataapar->provinsi }} </td>
            <td> {{ $dataapar->kota }} </td>
            <td> {{ $dataapar->gedung }} </td>
            <td> {{ $dataapar->lantai }} </td>
            <td> {{ $dataapar->titik }} </td>
            <td> {{ $dataapar->kedaluarsa }} </td>
            <td> {{ $dataapar->keterangan}}
                <td>
                  
                    <a href="/dataapar/{{ $dataapar->id }}/edit/" class="btn btn-success"> Edit</a>
                </td>
                <td>
                    <form action="/dataapar/{{ $dataapar->id }}" method="post">
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
            
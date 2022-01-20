@extends('layouts.main')
<?php $no=1 ?>
@section ("content")
<br>
<h3>Data Apar</h3>
<br>
    <a href="/dataapar/create" class="btn btn-info"> Tambah Data </a>
    <div class="col-sm-12">

        @if (session()->get('success'))
            <div class="alert alert-sucess">
                {{ session()->get('sucess') }}
            </div>
        @endif
    </div>
<table class="table table-striped">
    <thead>
        <tr>
            <th> Kode Apar </th>
            <th> Tipe Apar </th>
            <th> Berat Apar </th>
            <th> Zona Apar</th>
            <th> Gedung </th>
            <th> Lantai </th>
            <th> Titik Apar </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataapar as $dataapar)
        <tr>
            <td> {{ $no++ }} </td>
            <td> {{ $dataapar->tipe }} </td>
            <td> {{ $dataapar->berat }} </td>
            <td> {{ $dataapar->zona }} </td>
            <td> {{ $dataapar->gedung }} </td>
            <td> {{ $dataapar->lantai }} </td>
            <td> {{ $dataapar->titik}}
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
@endsection
            
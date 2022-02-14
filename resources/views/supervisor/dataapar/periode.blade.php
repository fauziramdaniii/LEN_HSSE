@extends('supervisor.dataapar.layout')
<?php $no = 1 ?>
@section ("content")
<div class="content-wrapper">
    <br>
    <h3>
        <center>List Periode Inpeksi</center>
    </h3>
    <center> <a href="masterinspeksi/create" class="btn btn-info"> Tambah Periode </a></center>
    <div class="col-sm-12">
        <br>
        @if (session()->get('success'))
        <div class="alert alert-sucess">
            {{ session()->get('sucess') }}
        </div>
        @endif
    </div>
    </center>

    <div class="table-responsive">
        <center>
            <table class="display expandable-table ">
                <center>
                    <thead>
                        <tr class="text-center">
                            <th> No </th>
                            <th> Periode </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periode as $periode)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ date('F Y',strtotime ($periode->periode))  }}</td>
                            <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
    </div>
</div>
@endsection
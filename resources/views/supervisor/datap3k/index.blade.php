@extends('supervisor.datap3k.layout')
<?php $no = 1 ?>
@section ("content")
<div class="content-wrapper">

    <h3>
        <center>DATA P3K
    </h3>
    </center>
    <center><a href="datap3k/create" class="btn btn-info"> Tambah Data </a>
        <a href="datap3k/create" class="btn btn-warning"> Export Data </a>
    </center>
    <div class="col-sm-12">
        <br>
        @if (session()->get('success'))
        <div class="alert alert-sucess">
            {{ session()->get('sucess') }}
        </div>
        @endif
    </div>
    <style>
        /* Style The Dropdown Button */
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 129px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
    <!-- <div class="dropdown">
        <button class="dropbtn">Pilih Tipe P3K</button>
        <div class="dropdown-content">
            <a href="#">A</a>
            <a href="#">B</a>
            <a href="#">C</a>
        </div>
    </div> -->
    <br>
    <br>
    <div class="table-responsive">
        <center>
            <table class="display expandable-table ">
                <center>
                    <thead>
                        <tr class="text-center">
                            <th> No </th>
                            <th> Kode P3K </th>
                            <th> Tipe P3K </th>
                            <th> Lokasi </th>
                            <th> Provinsi </th>
                            <th> Kota </th>
                            <th> Zona </th>
                            <th> Gedung </th>
                            <th> Lantai </th>
                            <th> Titik </th>
                            <th> Kedaluwarsa </th>
                            <th> Keterangan </th>
                            <th colspan='2'>
                                <center>Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datap3k as $datap3k)
                        <tr class="text-center">
                            <td> {{ $no++ }} </td>
                            <td> {{ $datap3k->id }} </td>
                            <td> {{ $datap3k->tipe }} </td>
                            <td> {{ $datap3k->lokasi }} </td>
                            <td> {{ $datap3k->provinsi }} </td>
                            <td> {{ $datap3k->kota }} </td>
                            <td> {{ $datap3k->zona }} </td>
                            <td> {{ $datap3k->gedung }} </td>
                            <td> {{ $datap3k->lantai }} </td>
                            <td> {{ $datap3k->titik }} </td>
                            <td> {{ $datap3k->kedaluwarsa }} </td>
                            <td> {{ $datap3k->keterangan}}</td>
                            <td>

                                <a href="datap3k/{{ $datap3k->id }}/edit/" class="btn btn-dark btn-sm"> Edit</a>
                            </td>
                            <td>
                                <form action="datap3k/{{ $datap3k->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
    </div>
</div>
@endsection
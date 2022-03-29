@extends('supervisor.datap3k.layout')
<?php $no = 1 ?>
@section ("content")
@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">
                    Data P3K
                </h3>
                <center><a href="datap3k/create" class="btn btn-info"> Tambah Data </a>
                    <a href="datap3k/export" class="btn btn-warning"> Export Data </a>
                </center>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="display expandable-table mt-3" width="100%" id="tableAPAR">
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
                                        <th> Keterangan </th>
                                        <th colspan='3'>
                                            <center>Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datap3k as $datap3k)
                                    <tr class="text-center">
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $datap3k->kd_p3k }} </td>
                                        <td> {{ $datap3k->tipe }} </td>
                                        <td> {{ $datap3k->lokasi }} </td>
                                        <td> {{ $datap3k->provinsi }} </td>
                                        <td> {{ $datap3k->kota }} </td>
                                        <td> {{ @$datap3k->Zona->zona }} </td>
                                        <td> {{ $datap3k->gedung }} </td>
                                        <td> {{ $datap3k->lantai }} </td>
                                        <td> {{ $datap3k->titik }} </td>
                                        <td> {{ $datap3k->keterangan}}</td>
                                        <td>

                                            <a href="/p3k/datap3k/{{ $datap3k->id }}/edit/" class="btn btn-dark btn-sm"> Edit</a>
                                        </td>
                                        <td>
                                            <form action="/p3k/datap3k/{{ $datap3k->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"> Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="/p3k/inspeksiTahunan/{{$datap3k->id}}/export" class="btn btn-success btn-sm"><i class="ti-download btn-icon-append text-light"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
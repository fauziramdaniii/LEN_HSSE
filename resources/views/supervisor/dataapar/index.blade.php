@extends('supervisor.dataapar.layout')
<?php $no = 1 ?>
@section ("content")
<div class="content-wrapper">
    <br>
    <h3>
        <center>DATA APAR
    </h3>
    <center><a href="dataapar/create" class="btn btn-info"> Tambah Data </a>
        <a href="{{$dataapar->count() > 0 ? 'dataapar/export' : '#'}}" class="btn btn-warning"> Export Data </a>
        <div class="col-sm-12">
            <br>
            @if (session()->get('success'))
            <div class="alert alert-sucess">
                {{ session()->get('sucess') }}
            </div>
            @endif
        </div>
        <div class=" table-responsive">
            <table class="display expandable-table ">
                <thead>
                    <tr class="text-center">
                        <th> No </th>
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
                        <th colspan="2">
                            <center>Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataapar as $dataapar)
                    <tr class="text-center">
                        <td> {{ $no++ }} </td>
                        <td> {{ $dataapar->id }} </td>
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
                            <center>
                                <a href="/apar/dataapar/{{ $dataapar->id }}/edit/" class="btn btn-dark btn-sm"><i class="ti-pencil btn-icon-append text-light"></i>
                                </a>
                            </center>
                        </td>
                        <td>
                            <button href="#" class="btn btn-danger btn-sm  deleteApar" data-id="{{$dataapar->id}}" data-toggle="modal" data-target="#modalDelete"><i class="ti-trash btn-icon-append text-light"></i>
                            </button>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection


@section('modal')
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus Data APAR ini?
            </div>
            <div class="modal-footer">
                <form id="deleteApar" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.deleteApar').on('click', function() {
        $('#deleteApar').prop('action', '/apar/dataapar/' + $(this).attr('data-id'));
    });
</script>
@endsection
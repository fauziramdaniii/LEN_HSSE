@extends('supervisor.dataapar.layout')

@section ("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-6 col-sm-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Kelola Tipe APAR</p>
                    <button type="button" data-target="#tambahTipe" data-toggle="modal" class="btn btn-info my-2" style="float: right;">Tambah</button>
                    <table class="display expandable-table " width="100%">
                        <center>
                            <thead>
                                <tr class="text-center">
                                    <th> No </th>
                                    <th> Nama Tipe </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipe as $tipe)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$tipe->nama_tipe}}</td>
                                    <td>
                                        <center><button type="button" class="btn btn-warning btn-sm btnEditTipe" data-target="#editTipe" data-toggle="modal" data-id="{{$tipe->id}}" data-nama="{{$tipe->nama_tipe}}"><i class="ti-pencil btn-icon-append text-light"></i>
                                            </button> <button type="button" data-target="#deleteTipe" data-toggle="modal" class="btn btn-danger btn-sm btndeleteTipe" data-id="{{$tipe->id}}"><i class="ti-trash btn-icon-append text-light"></i>
                                            </button>
                                        </center>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Kelola Jenis APAR</p>
                    <a href="#" class="btn btn-info my-2" data-target="#tambahJenis" data-toggle="modal" style="float: right;">Tambah</a>
                    <table class="display expandable-table " width="100%">
                        <center>
                            <thead>
                                <tr class="text-center">
                                    <th> No </th>
                                    <th> Nama Jenis </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jenis as $jenis)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$jenis->nama_jenis}}</td>
                                    <td>
                                        <center><button type="button" class=" btn btn-warning btn-sm btnEditJenis" data-toggle="modal" data-target="#editJenis" data-id="{{$jenis->id}}" data-nama="{{$jenis->nama_jenis}}"><i class="ti-pencil btn-icon-append text-light"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm btndeleteJenis" data-target="#hapusJenis" data-toggle="modal" data-id="{{$jenis->id}}"><i class="ti-trash btn-icon-append text-light"></i>
                                            </button>
                                        </center>
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
@endsection
@section('modal')
<!-- Modal tambah Jenis -->
<div class="modal fade" id="tambahJenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis APAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/apar/tambahJenis" method="post">
                    @csrf
                    <label for="">Nama Jenis</label>
                    <input type="text" name="nama_jenis" id="" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Tipe -->
<div class="modal fade" id="tambahTipe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tipe APAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/apar/tambahTipe" method="post">
                    @csrf
                    <label for="">Nama Tipe</label>
                    <input type="text" name="nama_tipe" id="" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Jenis -->
<div class="modal fade" id="editJenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jenis APAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editJenisForm" method="post">
                    @csrf
                    @method('PUT')
                    <label for="">Nama Jenis</label>
                    <input type="text" name="nama_jenis" id="nama_jenis" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Tipe -->
<div class="modal fade" id="editTipe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tipe APAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTipeForm" method="post">
                    @csrf
                    @method('PUT')
                    <label for="">Nama Tipe</label>
                    <input type="text" name="nama_tipe" id="nama_tipe" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Jenis -->
<div class="modal fade" id="hapusJenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus Data Jenis APAR ini?
            </div>
            <div class="modal-footer">
                <form id="deleteJenisForm" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Tipe -->
<div class="modal fade" id="deleteTipe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus Data Tipe APAR ini?
            </div>
            <div class="modal-footer">
                <form id="deleteTipeForm" method="post">
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
    $('.btndeleteTipe').on('click', function() {
        $('#deleteTipeForm').prop('action', '/apar/deleteTipe/' + $(this).attr('data-id'));
    });

    $('.btndeleteJenis').on('click', function() {
        $('#deleteJenisForm').prop('action', '/apar/deleteJenis/' + $(this).attr('data-id'));
    });
    $('.btnEditTipe').on('click', function() {
        $('#nama_tipe').val($(this).attr('data-nama'));
        $('#editTipeForm').prop('action', '/apar/editTipe/' + $(this).attr('data-id'));
    });
    $('.btnEditJenis').on('click', function() {
        $('#nama_jenis').val($(this).attr('data-nama'));
        $('#editJenisForm').prop('action', '/apar/editJenis/' + $(this).attr('data-id'));
    });
</script>
@endsection
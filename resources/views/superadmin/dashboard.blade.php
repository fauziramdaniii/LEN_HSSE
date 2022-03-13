@extends('superadmin.layout')

@section ("content")
@include('sweetalert::alert')
<div class="row">
    <div class="col-md-4 mb-4 stretch-card transparent">
        <div class="card card-tale">
            <div class="card-body">
                <p class="mb-4 text-center">JUMLAH SUPERVISIOR </p>
                <p class="fs-30 mb-2 text-center">{{$supervisior->count()}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
            <div class="card-body">
                <p class="mb-4 text-center">JUMLAH PELAKSANA APAR </p>
                <p class="fs-30 mb-2 text-center">{{$pelaksanaapar}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4 stretch-card transparent">
        <div class="card card-light-blue">
            <div class="card-body">
                <p class="mb-4 text-center">JUMLAH PELAKSANA P3K </p>
                <p class="fs-30 mb-2 text-center">{{$pelaksanap3k}}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Data Supervisior</p>
                <button type="button" data-target="#tambahsupervisior" data-toggle="modal" class="btn btn-info my-2" style="float: right;">Tambah</button>

                <div class="table-responsive">
                    <table class="display expandable-table mt-1" id="tableAPAR" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supervisior as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>
                                    <button type="button" class=" btn btn-warning btn-sm btnEditSupervisor" data-id="{{$data->id}}" data-nama="{{$data->name}}" data-email="{{$data->email}}" data-toggle="modal" data-target="#editSupervisior"><i class="ti-pencil btn-icon-append text-light"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btnDeleteAkun" data-id="{{$data->id}}" data-target="#hapusAkun" data-toggle="modal"><i class="ti-trash btn-icon-append text-light"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm btnResetPassword" data-id="{{$data->id}}" data-target="#resetPassword" data-toggle="modal"><i class="ti-reload btn-icon-append text-light"></i>
                                    </button>
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

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Data Pelaksana</p>
                <button type="button" data-target="#tambahPelaksana" data-toggle="modal" class="btn btn-info my-2" style="float: right;">Tambah</button>

                <div class="table-responsive">
                    <table class="display expandable-table mt-1" id="tableAPAR" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelaksana as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->role}}</td>
                                <td>
                                    <button type="button" class=" btn btn-warning btn-sm btnEditPelaksana" data-jenis="{{$data->role}}" data-id="{{$data->id}}" data-nama="{{$data->name}}" data-email="{{$data->email}}" data-toggle="modal" data-target="#editPelaksana"><i class="ti-pencil btn-icon-append text-light"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btnDeleteAkun" data-id="{{$data->id}}" data-target="#hapusAkun" data-toggle="modal"><i class="ti-trash btn-icon-append text-light"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm btnResetPassword" data-id="{{$data->id}}" data-target="#resetPassword" data-toggle="modal"><i class="ti-reload btn-icon-append text-light"></i>
                                    </button>
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
<!-- Modal tambah Supervisior -->
<div class="modal fade" id="tambahsupervisior" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Supervisior</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user" method="post">
                    @csrf
                    <input type="hidden" name="role" value="supervisor" id="">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah Supervisior -->
<div class="modal fade" id="tambahPelaksana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelaksana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user" method="post">
                    @csrf
                    <input type="hidden" name="role" value="supervisor" id="">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" id="" class="form-control" required>
                            <option value="petugasapar">Pelaksana APAR</option>
                            <option value="petugasp3k">Pelaksana P3K</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Reset Password -->
<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin me-reset password akun ini?
            </div>
            <div class="modal-footer">
                <form id="resetPasswordForm" method="post">
                    @csrf
                    @method('PUT')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit JSupervisiorenis -->
<div class="modal fade" id="editSupervisior" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Supervisior</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSupervisiorForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" id="nama_supervisior" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email_supervisior" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Pelaksana -->
<div class="modal fade" id="editPelaksana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pelaksana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPelaksanaForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" id="nama_pelaksana" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email_pelaksana" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" id="jenis_pelaksana" class="form-control" required>
                            <option value="petugasapar">Pelaksana APAR</option>
                            <option value="petugasp3k">Pelaksana P3K</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Akun -->
<div class="modal fade" id="hapusAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus akun ini?
            </div>
            <div class="modal-footer">
                <form id="deletePasswordForm" method="post">
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
    $(document).on('click', '.btnEditSupervisor', function() {
        var id = $(this).attr('data-id');
        $('#nama_supervisior').val($(this).attr('data-nama'))
        $('#email_supervisior').val($(this).attr('data-email'))
        $('#editSupervisiorForm').prop('action', '/user/update/' + id);
    });

    $(document).on('click', '.btnEditPelaksana', function() {
        var id = $(this).attr('data-id');
        $('#nama_pelaksana').val($(this).attr('data-nama'))
        $('#email_pelaksana').val($(this).attr('data-email'))
        $('#jenis_pelaksana').val($(this).attr('data-jenis'))
        $('#editPelaksanaForm').prop('action', '/user/update/' + id);
    });

    $(document).on('click', '.btnResetPassword', function() {
        var id = $(this).attr('data-id');
        $('#resetPasswordForm').prop('action', '/user/resetPassword/' + id);
    });
    $(document).on('click', '.btnDeleteAkun', function() {
        var id = $(this).attr('data-id');
        $('#deletePasswordForm').prop('action', '/user/' + id);
    });
</script>
@endsection
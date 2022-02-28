@extends('supervisor.datap3k.layout')
<?php $no = 1 ?>
@section ("content")
@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
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

                <div class="table-responsive">
                    <table class="display expandable-table " width=100%>
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Periode </th>
                                <th> Dibuat Tanggal </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periode as $periode)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ date('F Y',strtotime ($periode->periode))  }}</td>
                                <td>{{date('d F Y',strtotime($periode->created_at))}}</td>
                                <td><button type="button" class="btn btn-danger btn-sm deletePeriode" data-id="{{$periode->id}}" data-target="#deletePeriode" data-toggle="modal">Delete</button></td>
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
<div class="modal fade" id="deletePeriode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus Periode Inspeksi ini?
            </div>
            <div class="modal-footer">
                <form id="delete_periode" method="post">
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
    $('.deletePeriode').on('click', function() {
        $('#delete_periode').prop('action', '/p3k/masterinspeksi/' + $(this).attr('data-id'));
    });
</script>
@endsection
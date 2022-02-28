@extends('supervisor.datap3k.layout')

@section('content')
@include('sweetalert::alert')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-body">
            <h3> Tambah Periode </h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div> <br />
            @endif
            <form method="post" action="/p3k/masterinspeksi">
                @csrf
                <div class="form-group">
                    <label for="periode"> Periode </label>
                    <input type="month" class="form-control" name="periode" required>
                </div>

                <button type="submit" class="btn btn-primary"> Simpan </button>
            </form>
        </div>
    </div>
</div>
@endsection
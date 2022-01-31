@extends('layouts.main')

@section('content')

    <div class="col-md-8 offset-md-2"><br>
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
        <form method="post" action="/masterinspeksi">
            @csrf    
            <div class="form-group">
                <label for="periode"> Periode </label>
                <input type="month" class="form-control" name="periode" required>
            </div>
            <div class="form-group">
                <label for="sudah_inspeksi"> Sudah di Inspeksi </label>
                <input type="text" class="form-control" name="sudah_inspeksi">
            </div>
            <div class="form-group">
                <label for="belum_inspeksi"> Belum di Inspeksi </label>
                <input type="text" class="form-control" name="belum_inspeksi">
            </div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
@endsection

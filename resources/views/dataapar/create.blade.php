@extends('layouts.main')

@section('content')

    <div class="col-md-8 offset-md-2"><br>
        <h3> Tambah Data </h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div> <br />
        @endif
        <form method="post" action="/dataapar">
            @csrf
            <div class="form-group">
                <label for="tipe"> Tipe Apar </label>
                <input type="text" class="form-control" name="tipe" required>
            </div>
            <div class="form-group">
                <label for="berat"> Berat Apar </label>
                <input type="berat" class="form-control" name="berat" required>
            </div>
            <div class="form-group">
                <label for="zona"> Zona </label>
                <input type="text" class="form-control" name="zona" required>
            </div>
            <div class="form-group">
                <label for="gedung"> Gedung </label>
                <input type="text" class="form-control" name="gedung" required>
            </div>
            <div class="form-group">
                <label for="lantai"> Lantai </label>
                <input type="text" class="form-control" name="lantai" required>
            </div>
            <div class="form-group">
                <label for="titik"> Titik Apar </label>
                <input type="text" class="form-control" name="titik" required>
            </div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
@endsection

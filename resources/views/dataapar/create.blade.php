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
                <label for="jenis"> Jenis Apar </label>
                <input type="text" class="form-control" name="jenis" required>
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
                <label for="lokasi"> Lokasi </label>
                <input type="text" class="form-control" name="lokasi" required>
            </div>
            <div class="form-group">
                <label for="kedaluarsa"> Kedaluarsa </label>
                <input type="date" class="form-control" name="kedaluarsa" required>
            </div>
            <div class="form-group">
                <label for="keterangan"> Keterangan </label>
                <input type="text" class="form-control" name="keterangan" required>
            </div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
@endsection

@extends('petugasapar.layout')
@section("content")
<div class="col-md-8 offset-md-2">
    <h3>Edit Data</h3>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div><br>
    @endif
    <form method="post" action="/aparinspeksi/{{$aparinspeksi->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tipe"> Tipe Apar </label>
            <input type="text" class="form-control" name="tipe" required value="{{ $aparinspeksi->tipe }}">
        </div>
        <div class="form-group">
            <label for="berat"> Berat Apar </label>
            <input type="text" class="form-control" name="berat" required value="{{ $aparinspeksi->berat }}">
        </div>
        <div class="form-group">
            <label for="zona"> Zona </label>
            <input type="text" class="form-control" name="zona" required value="{{ $aparinspeksi->zona }}">
        </div>
        <div class="form-group">
            <label for="lokasi"> Lokasi </label>
            <input type="text" class="form-control" name="lokasi" required value="{{ $aparinspeksi->lokasi }}">
        </div>
        <div class="form-group">
            <label for="kedaluarsa"> Kedaluarsa </label>
            <input type="date" class="form-control" name="kedaluarsa" required value="{{ $aparinspeksi->kedaluarsa }}">
        </div>
        <div class="form-group">
            <label for="keterangan"> Keterangan Apar </label>
            <input type="text" class="form-control" name="keterangan" required value="{{ $aparinspeksi->keterangan }}">
        </div>
        <button type="submit" class="btn btn-primary"> Simpan </button>
    </form>
</div>
@endsection
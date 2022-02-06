@extends('supervisor.datap3k.layout')

@section('content')

<div class="col-md-8 offset-md-2"><br>
    <center>
        <h3> Tambah Data </h3>
    </center><br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div> <br />
    @endif
    <form method="post" action="/p3k/datap3k">
        @csrf
        <div class="form-group">
            <label for="id"> Kode P3K </label>
            <input type="text" class="form-control" name="id" required>
        </div>
        <div class="form-label">
            <label for="tipe" class="form-label">Tipe P3K</label>
            <select name="tipe" class="form-control">
                <option value=>-Pilih Tipe P3K-</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </div><br>
        <div class="form-group">
            <label for="lokasi"> Lokasi </label>
            <input type="text" class="form-control" name="lokasi" required>
        </div>
        <div class="form-group">
            <label for="provinsi"> Provinsi </label>
            <input type="text" class="form-control" name="provinsi" required>
        </div>
        <div class="form-group">
            <label for="kota"> Kota </label>
            <input type="text" class="form-control" name="kota" required>
        </div>
        <div class="form-label">
            <label for="zona" class="form-label">Zona </label>
            <select name="zona" class="form-control">
                <option value=>-Pilih Zona P3K-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div><br>
        <div class="form-label">
            <label for="gedung" class="form-label">Gedung </label>
            <select name="gedung" class="form-control">
                <option value=>-Pilih Gedung P3K-</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
                <option value="J">J</option>
            </select>
        </div><br>
        <div class="form-label">
            <label for="lantai" class="form-label">Lantai </label>
            <select name="lantai" class="form-control">
                <option value=>-Pilih Lantai-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div><br>
        <div class="form-group">
            <label for="titik"> Titik </label>
            <input type="text" class="form-control" name="titik" required>
        </div>
        <div class="form-group">
            <label for="kedaluwarsa"> Kedaluwarsa </label>
            <input type="date" class="form-control" name="kedaluwarsa" required>
        </div>
        <div class="form-group">
            <label for="keterangan"> Keterangan </label>
            <input type="text" class="form-control" name="keterangan" required>
        </div>
        <button type="submit" class="btn btn-primary"> Simpan </button>
    </form>
</div>
@endsection
@extends('supervisor.dataapar.layout')

@section('content')
<div class="content-wrapper">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
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
                <div>

                </div>
                <form method="post" action="/apar/dataapar">
                    @csrf
                    <div class="form-group">
                        <label for="id" class="form-label"> Kode Apar </label>
                        <input type="text" class="form-control" name="id" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe" class="form-label"> Tipe APAR </label>
                        <select name="tipe" class="form-control">
                            <option disabled selected>--Pilih Tipe APAR--</option>
                            @foreach($tipe as $tipe)
                            <option value="{{$tipe->nama_tipe}}">{{$tipe->nama_tipe}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis" class="form-label">Pilih Jenis APAR</label>
                        <select name="jenis" class="form-control">
                            <option disabled selected>--Pilih Jenis APAR--</option>
                            @foreach($jenis as $jenis)
                            <option value="{{$jenis->nama_jenis}}">{{$jenis->nama_jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="berat" class="form-label">Berat APAR</label>
                        <input type="number" name="berat" class="form-control">
                    </div>

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
                    <div class="form-group">
                        <label for="zona" class="form-label">Pilih Zona Apar</label>
                        <select name="zona" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="4">6</option>
                            <option value="5">7</option>
                            <option value="4">8</option>
                            <option value="5">9</option>
                        </select>
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
                        <label for="titik"> Titik </label>
                        <input type="text" class="form-control" name="titik" required>
                    </div>
                    <div class="form-group">
                        <label for="kedaluarsa"> Kedaluarsa </label>
                        <input type="date" class="form-control" name="kedaluarsa" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan"> Status </label>
                        <select class="form-control" name="keterangan" required>
                            <option disabled selected>--Pilih Status--</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Service">Service</option>
                            <option value="Stock">Stock</option>
                        </select>
                    </div>
                    <center>
                        <a href="/apar/kelolaParameter" class="btn btn-info"> Kelola Tipe & Jenis</a>
                        <button type="submit" class="btn btn-primary"> Simpan </button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
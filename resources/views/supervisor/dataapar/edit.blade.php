@extends('supervisor.dataapar.layout')
@section("content")
<div class="col-md-8 offset-md-2"><br>
    <div class="card">
        <div class="card-body">
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
            <form method="post" action="/apar/dataapar/{{$dataapar->id}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tipe" class="form-label"> Tipe APAR </label>
                    <select name="tipe" class="form-control">
                        <option disabled selected>--Pilih Tipe APAR--</option>
                        @foreach($tipe as $tipe)
                        <option value="{{$tipe->nama_tipe}}" {{$tipe->nama_tipe == $dataapar->tipe ? 'selected' : ''}}>{{$tipe->nama_tipe}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis" class="form-label">Pilih Jenis APAR</label>
                    <select name="jenis" class="form-control">
                        <option disabled selected>--Pilih Jenis APAR--</option>
                        @foreach($jenis as $jenis)
                        <option value="{{$jenis->nama_jenis}}" {{$jenis->nama_jenis == $dataapar->jenis ? 'selected' : ''}}>{{$jenis->nama_jenis}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="berat"> Berat Apar </label>
                    <input type="number" step=".01" min=0 class="form-control" name="berat" required value="{{ $dataapar->berat }}">
                </div>

                <div class="form-group">
                    <label for="lokasi"> Lokasi </label>
                    <input type="text" class="form-control" name="lokasi" required value="{{ $dataapar->lokasi }}">
                </div>
                <div class="form-group">
                    <label for="provinsi"> Provinsi </label>
                    <input type="text" class="form-control" name="provinsi" required value="{{ $dataapar->provinsi }}">
                </div>
                <div class="form-group">
                    <label for="kota"> Kota </label>
                    <input type="text" class="form-control" name="kota" required value="{{ $dataapar->kota }}">
                </div>
                <div class="form-group">
                    <label for="zona"> Pilih Zona APAR</label>
                    <select name="zona" class="form-control">
                        <option value="1" {{ $dataapar->zona=='1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $dataapar->zona=='2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $dataapar->zona=='3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $dataapar->zona=='4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $dataapar->zona=='5' ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $dataapar->zona=='6' ? 'selected' : '' }}>6</option>
                        <option value="7" {{ $dataapar->zona=='7' ? 'selected' : '' }}>7</option>
                        <option value="8" {{ $dataapar->zona=='8' ? 'selected' : '' }}>8</option>
                        <option value="9" {{ $dataapar->zona=='9' ? 'selected' : '' }}>9</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gedung"> Gedung </label>
                    <input type="text" class="form-control" name="gedung" required value="{{ $dataapar->gedung }}">
                </div>

                <div class="form-group">
                    <label for="lantai"> Lantai </label>
                    <input type="text" class="form-control" name="lantai" required value="{{ $dataapar->lantai }}">
                </div>
                <div class="form-group">
                    <label for="titik"> Titik </label>
                    <input type="text" class="form-control" name="titik" required value="{{ $dataapar->titik }}">
                </div>
                <div class="form-group">
                    <label for="kedaluarsa"> Kedaluarsa </label>
                    <input type="date" class="form-control" name="kedaluarsa" required value="{{ $dataapar->kedaluarsa }}">
                </div>
                <div class="form-group">
                    <label for="keterangan"> Keterangan Apar </label>
                    <select class="form-control" name="keterangan" required>
                        <option disabled selected>--Pilih Status--</option>
                        <option value="Aktif" {{ $dataapar->keterangan=='Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Service" {{ $dataapar->keterangan=='Service' ? 'selected' : '' }}>Service</option>
                        <option value="Stock" {{ $dataapar->keterangan=='Stock' ? 'selected' : '' }}>Stock</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"> Simpan </button>
            </form>
        </div>
    </div>
</div>
@endsection
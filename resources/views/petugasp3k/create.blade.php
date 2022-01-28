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
                <label for="id"> Kode Apar </label>
                <input type="text" class="form-control" name="id" required>
            </div>
            <div class="form-label">
            <label for="tipe" class="form-label">Pilih Tipe Apar</label>
              <select name="tipe" class="form-control">
                      <option value="DCP" >DCP</option>
                      <option value="CO2" >CO2</option>
                      <option value="AIR" >AIR</option>
                      <option value="FOAM" >FOAM</option>
              </select>
            </div>
            <div>
            <label for="jenis" class="form-label">Pilih Jenis Apar</label>
              <select name="jenis" class="form-control">
                      <option value="Catridge" >CATRIDGE</option>
                      <option value="Storage Preasure" >STORAGE PREASURE</option>
              </select>
            </div>
            <div class="form-label">
                <label for="berat" class="form-label">Pilih berat Apar</label>
                  <select name="berat" class="form-control">
                          <option value="1KG" >1 KG</option>
                          <option value="2KG" >2 KG</option>
                          <option value="4KG" >4 KG</option>
                          <option value="6kg" >6 KG</option>
                          <option value="9kg" >9 KG</option>
                  </select>
                </div>
                <div class="form-label">
                    <label for="zona" class="form-label">Pilih Zona Apar</label>
                      <select name="zona" class="form-control">
                              <option value="1" >1</option>
                              <option value="2" >2</option>
                              <option value="3" >3</option>
                              <option value="4" >4</option>
                              <option value="5" >5</option>
                              <option value="4" >6</option>
                              <option value="5" >7</option>
                              <option value="4" >8</option>
                              <option value="5" >9</option>
                      </select>
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
                <label for="keterangan"> Keterangan </label>
                <input type="text" class="form-control" name="keterangan" required>
            </div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
@endsection

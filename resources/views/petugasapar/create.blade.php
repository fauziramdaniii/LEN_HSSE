@extends('layouts.apar')
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
        <form method="post" action="/statusapar">
            @csrf
            <div class="form-group">
                <label for="id"> Kode Apar </label>
                <input type="text" class="form-control" name="id" required>
            </div>
            <div class="form-label">
            <label for="jenis" class="form-label">PRESSURE/CATRIDGE</label>
              <select name="jenis" class="form-control">
                      <option value="Ok" >Ok</option>
                      <option value="Not Ok" >Not Ok</option>
                      <option value="n/a" >n/a</option>
              </select>
            </div>
            <div class="form-label">
                <label for="noozle" class="form-label">NOOZLE APAR</label>
                  <select name="noozle" class="form-control">
                          <option value="Ok" >Ok</option>
                          <option value="Not Ok" >Not Ok</option>
                          <option value="n/a" >n/a</option>
                  </select>
                </div>
                <div class="form-label">
                    <label for="selang" class="form-label">Selang APAR</label>
                      <select name="selang" class="form-control">
                              <option value="Ok" >Ok</option>
                              <option value="Not Ok" >Not Ok</option>
                              <option value="n/a" >n/a</option>
                      </select>
                    </div>
                    <div class="form-label">
                        <label for="tabung" class="form-label">Tabung APAR</label>
                          <select name="tabung" class="form-control">
                                  <option value="Ok" >Ok</option>
                                  <option value="Not Ok" >Not Ok</option>
                                  <option value="n/a" >n/a</option>
                          </select>
                        </div>
                        <div class="form-label">
                            <label for="rambu" class="form-label">Rambu APAR</label>
                              <select name="rambu" class="form-control">
                                      <option value="Ok" >Ok</option>
                                      <option value="Not Ok" >Not Ok</option>
                                      <option value="n/a" >n/a</option>
                              </select>
                            </div>
                            <div class="form-label">
                                <label for="label" class="form-label">Label APAR</label>
                                  <select name="label" class="form-control">
                                          <option value="Ok" >Ok</option>
                                          <option value="Not Ok" >Not Ok</option>
                                          <option value="n/a" >n/a</option>
                                  </select>
                                </div>
                                <div class="form-label">
                                    <label for="cat" class="form-label">Kondisi Cat APAR</label>
                                      <select name="cat" class="form-control">
                                              <option value="Ok" >Ok</option>
                                              <option value="Not Ok" >Not Ok</option>
                                              <option value="n/a" >n/a</option>
                                      </select>
                                    </div>
                                    <div class="form-label">
                                        <label for="pin" class="form-label">Pin APAR</label>
                                          <select name="pin" class="form-control">
                                                  <option value="Ok" >Ok</option>
                                                  <option value="Not Ok" >Not Ok</option>
                                                  <option value="n/a" >n/a</option>
                                          </select>
                                        </div>
                                        <div class="form-label">
                                            <label for="roda" class="form-label">Roda APAR</label>
                                              <select name="roda" class="form-control">
                                                      <option value="Ok" >Ok</option>
                                                      <option value="Not Ok" >Not Ok</option>
                                                      <option value="n/a" >n/a</option>
                                              </select>
                                            </div>
                                            <div class="form-label">
                                                <label for="keterangan" class="form-label">Jenis APAR</label>
                                                  <select name="keterangan" class="form-control">
                                                          <option value="aktiv" > AKTIF</option>
                                                          <option value="service" >SERVICE</option>
                                                          <option value="stock" >STOCK</option>
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto"> Foto APAR</label>
                                                    <input type="image" class="form-control" name="foto" required>
                                                </div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
@endsection

@extends('layoouts.main')

@section('contenx')
    <div class="col-md-8 offset-md-2">
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
        <form method="post" action="/apar">
            @csrf
            <select class="form-select" aria-label="Default select example">
                <option selected>No Apar</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div>
            <select class="form-select" aria-label="Default select example">
                <option selected>Pilih Tipe Apar</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <select class="form-select" aria-label="Default select example">
                <option selected>Berat Apar</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div>
            <select class="form-select" aria-label="Default select example">
                <option selected>Pilih Provinsi</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Pilih Kota</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Pilih Zona</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                    <div>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Pilih Gedung</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                        <div>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pilih Lantai</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                              </select>
                            </div>
            <div class="form-group">
                <label for="day"> Titik Apar </label>
                <input type="text" class="form-control" name="day" required>
            </div>
            <div class="form-group">
                <label for="description"> Expired Apar </label>
                <input type="date" class="form-control" name="description" required>
            </div>
            <div class="form-group">
                <label for="description"> Tanggal Inpeksi Apar </label>
                <input type="date" class="form-control" name="description" required>
            </div>
            <div class="form-group">
                <label for="description"> Keterangan </label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <div class="form-group">
                <label for="description"> Keterangan </label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <div class="form-group">
                <label for="description"> Keterangan </label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <div class="form-group">
                <label for="description"> Keterangan </label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
@endsection

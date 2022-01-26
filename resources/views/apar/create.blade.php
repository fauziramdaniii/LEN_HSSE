@extends('layouts.main')

@section('content')
    <div class="col-md-8 offset-md-2"><br>
    <h3> Inpeksi Apar </h3>
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
                <label for="tipe"> Kode Apar </label>
                <input type="text" class="form-control" name="tipe" required>
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
            <center>
            <button type="submit" class="btn btn-info"> Inpeksi </button>
            </center>
        </form>
    </div>
@endsection

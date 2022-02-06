@extends('petugasp3k.p3k')

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
    <form method="post" action="/inspeksip3k">
        @csrf
        <div class="form-group">
            <label for="isi"> Isi </label>
            <input type="text" class="form-control" name="isi" required>
        </div>
        <div class="form-label">
            <label for="standar" class="form-label">Standar</label>
            <input type="text" class="form-control" name="standar" required>
        </div><br>
        <div class="form-group">
            <label for="jumlah"> Jumlah </label>
            <input type="text" class="form-control" name="jumlah" required>
        </div>
        <div class="form-group">
            <label for="keterangan"> Keterangan </label>
            <input type="text" class="form-control" name="keterangan" required>
        </div><br>
        <button type="submit" class="btn btn-primary"> Simpan </button>
    </form>
</div>
@endsection
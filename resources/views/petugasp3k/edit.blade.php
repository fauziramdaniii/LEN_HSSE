@extends('petugasp3k.p3k')

@section('content')

<div class="col-md-8 offset-md-2"><br>
    <center>
        <h3>Edit Data</h3>
    </center><br>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div><br>
    @endif
    <form method="post" action="/inspeksip3k/{{$inspeksip3k->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="isi"> Isi </label>
            <input type="text" class="form-control" name="isi" required value="{{ $inspeksip3k->isi }}">
        </div>
        <div class="form-group">
            <label for="standar "> Standar </label>
            <input type="text" class="form-control" name="standar" required value="{{ $inspeksip3k->standar }}">
        </div>
        <div class="form-group">
            <label for="jumlah "> Jumlah </label>
            <input type="text" class="form-control" name="jumlah" required value="{{ $inspeksip3k->jumlah }}">
        </div>
        <div class="form-group">
            <label for="keterangan "> Keterangan </label>
            <input type="text" class="form-control" name="keterangan" required value="{{ $inspeksip3k->keterangan }}">
        </div>
        <button type="submit" class="btn btn-primary"> Simpan </button>
    </form>
</div>
@endsection
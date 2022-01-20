@extends("layouts.main")
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
    <form method="post" action="/dataapar/{{$dataapar->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tipe"> Tipe Apar </label>
            <input type="text" class="form-control" name="tipe" required value="{{ $dataapar->tipe }}">
        </div>
        <div class="form-group">
            <label for="jenis"> Jenis Apar </label>
            <input type="text" class="form-control" name="jenis" required value="{{ $dataapar->jenis }}">
        </div>
        <div class="form-group">
            <label for="berat"> Berat Apar </label>
            <input type="text" class="form-control" name="berat" required value="{{ $dataapar->berat }}">
        </div>
        <div class="form-group">
            <label for="zona"> Zona </label>
            <input type="text" class="form-control" name="zona" required value="{{ $dataapar->zona }}">
        </div>
        <div class="form-group">
            <label for="lokasi"> Lokasi </label>
            <input type="text" class="form-control" name="lokasi" required value="{{ $dataapar->lokasi }}">
        </div>
        <div class="form-group">
            <label for="kedaluarsa"> Kedaluarsa </label>
            <input type="date" class="form-control" name="kedaluarsa" required value="{{ $dataapar->kedaluarsa }}">
        </div>
        <div class="form-group">
            <label for="keterangan"> Keterangan Apar </label>
            <input type="text" class="form-control" name="keterangan" required value="{{ $dataapar->keterangan }}">
        </div>
        <button type="submit" class="btn btn-primary"> Simpan </button>
    </form>
</div>
@endsection
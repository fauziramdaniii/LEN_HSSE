@extends("layouts.p3k")
@section("content")
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
    <form method="post" action="/datap3k/{{$datap3k->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id"> Kode P3K </label>
            <input type="text" class="form-control" name="id" required value="{{ $datap3k->id }}">
        </div>
        <div class="form-label">
            <label for="tipe" class="form-label">Tipe P3K</label>
            <select name="tipe" class="form-control" value="{{ $datap3k->tipe }}">
                <option value=>-Pilih Tipe P3K-</option>
                <option value="A" {{ $datap3k->tipe=='A'? 'selected':''}}>A</option>
                <option value="B" {{ $datap3k->tipe=='B'? 'selected':''}}>B</option>
                <option value="C" {{ $datap3k->tipe=='C'? 'selected':''}}>C</option>
            </select>
        </div><br>
        <div class="form-group">
            <label for="lokasi"> Lokasi </label>
            <input type="text" class="form-control" name="lokasi" required value="{{ $datap3k->lokasi }}">
        </div>
        <div class="form-group">
            <label for="provinsi"> Provinsi </label>
            <input type="text" class="form-control" name="provinsi" required value="{{ $datap3k->provinsi }}">
        </div>
        <div class="form-group">
            <label for="kota"> Kota </label>
            <input type="text" class="form-control" name="kota" required value="{{ $datap3k->kota }}">
        </div>
        <div class="form-label">
            <label for="zona" class="form-label">Zona </label>
            <select name="zona" class="form-control" value="{{ $datap3k->zona }}">
                <option value=>-Pilih Zona P3K-</option>
                <option value="1" {{ $datap3k->zona=='1'? 'selected':''}}>1</option>
                <option value="2" {{ $datap3k->zona=='2'? 'selected':''}}>2</option>
                <option value="3" {{ $datap3k->zona=='3'? 'selected':''}}>3</option>
                <option value="4" {{ $datap3k->zona=='4'? 'selected':''}}>4</option>
                <option value="5" {{ $datap3k->zona=='5'? 'selected':''}}>5</option>
                <option value="6" {{ $datap3k->zona=='6'? 'selected':''}}>6</option>
                <option value="7" {{ $datap3k->zona=='7'? 'selected':''}}>7</option>
                <option value="8" {{ $datap3k->zona=='8'? 'selected':''}}>8</option>
                <option value="9" {{ $datap3k->zona=='9'? 'selected':''}}>9</option>
                <option value="10" {{ $datap3k->zona=='10'? 'selected':''}}>10</option>
            </select>
        </div><br>
        <div class="form-label">
            <label for="gedung" class="form-label">Gedung </label>
            <select name="gedung" class="form-control" value="{{ $datap3k->gedung }}">
                <option value=>-Pilih Gedung P3K-</option>
                <option value="A" {{ $datap3k->gedung=='A'? 'selected':''}}>A</option>
                <option value="B" {{ $datap3k->gedung=='B'? 'selected':''}}>B</option>
                <option value="C" {{ $datap3k->gedung=='C'? 'selected':''}}>C</option>
                <option value="D" {{ $datap3k->gedung=='D'? 'selected':''}}>D</option>
                <option value="E" {{ $datap3k->gedung=='E'? 'selected':''}}>E</option>
                <option value="F" {{ $datap3k->gedung=='F'? 'selected':''}}>F</option>
                <option value="G" {{ $datap3k->gedung=='G'? 'selected':''}}>G</option>
                <option value="H" {{ $datap3k->gedung=='H'? 'selected':''}}>H</option>
                <option value="I" {{ $datap3k->gedung=='I'? 'selected':''}}>I</option>
                <option value="J" {{ $datap3k->gedung=='J'? 'selected':''}}>J</option>
            </select>
        </div><br>
        <div class="form-label">
            <label for="lantai" class="form-label">Lantai </label>
            <select name="lantai" class="form-control" value="{{ $datap3k->lantai }}">
                <option value=>-Pilih Lantai-</option>
                <option value="1" {{ $datap3k->lantai=='1'? 'selected':''}}>1</option>
                <option value="2" {{ $datap3k->lantai=='2'? 'selected':''}}>2</option>
                <option value="3" {{ $datap3k->lantai=='3'? 'selected':''}}>3</option>
                <option value="4" {{ $datap3k->lantai=='4'? 'selected':''}}>4</option>
                <option value="5" {{ $datap3k->lantai=='5'? 'selected':''}}>5</option>
                <option value="6" {{ $datap3k->lantai=='6'? 'selected':''}}>6</option>
                <option value="7" {{ $datap3k->lantai=='7'? 'selected':''}}>7</option>
                <option value="8" {{ $datap3k->lantai=='8'? 'selected':''}}>8</option>
                <option value="9" {{ $datap3k->lantai=='9'? 'selected':''}}>9</option>
                <option value="10" {{ $datap3k->lantai=='10'? 'selected':''}}>10</option>
            </select>
        </div><br>
        <div class="form-group">
            <label for="titik"> Titik </label>
            <input type="text" class="form-control" name="titik" required value="{{ $datap3k->titik }}">
        </div>
        <div class="form-group">
            <label for="kedaluwarsa"> Kedaluwarsa </label>
            <input type="date" class="form-control" name="kedaluwarsa" required value="{{ $datap3k->kedaluwarsa }}">
        </div>
        <div class="form-group">
            <label for="keterangan"> Keterangan </label>
            <input type="text" class="form-control" name="keterangan" required value="{{ $datap3k->keterangan }}">
        </div>
        <button type="submit" class="btn btn-primary"> Simpan </button>
    </form>
</div>
@endsection
@extends('supervisor.datap3k.layout')
@section("content")
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-body">
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
            <form method="post" action="/p3k/datap3k/{{$datap3k->id}}">
                @csrf
                @method('PUT')

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
                    <select class="form-control" id="provinsi" name="provinsi" required>
                        <option selected disabled value="">===Pilih Provinsi===</option>
                        @foreach($provinsi as $data)
                        <option value="{{ucfirst(trans($data->id))}}" {{Str::title(Str::lower($data->name)) == Str::title(Str::lower($datap3k->provinsi)) ? 'selected' : ''}}>{{Str::title(Str::lower($data->name))}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kota"> Kota </label>
                    <select class="form-control" name="kota" required id="optionKota">
                        <option selected disabled value="">===Pilih Kota===</option>
                        @foreach($kota as $data)
                        <option value="{{Str::title(Str::lower($data->name))}}" {{Str::title(Str::lower($data->name)) == Str::title(Str::lower($datap3k->kota)) ? 'selected' : ''}}>{{Str::title(Str::lower($data->name))}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="zona"> Pilih Zona APAR</label>
                    <select name="zona_id" class="form-control">
                        <option disabled>===Pilih Zona===</option>
                        @foreach($zona as $data)
                        <option value="{{$data->id}}" {{$data->id == $datap3k->zona_id ? 'selected' : ''}}>{{$data->zona}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="gedung"> Gedung </label>
                    <input type="text" class="form-control" name="gedung" value="{{ $datap3k->gedung }}" required>
                </div>
                <div class="form-group">
                    <label for="lantai"> Lantai</label>
                    <input type="text" class="form-control" name="lantai" required value="{{ $datap3k->lantai }}">
                </div>
                <div class="form-group">
                    <label for="titik"> Titik </label>
                    <input type="text" class="form-control" name="titik" required value="{{ $datap3k->titik }}">
                </div>
                <div class="form-group">
                    <label for="keterangan"> Keterangan </label>
                    <input type="text" class="form-control" name="keterangan" required value="{{ $datap3k->keterangan }}">
                </div>
                <button type="submit" class="btn btn-primary"> Simpan </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).on('change', '#provinsi', function() {
        $.get('/getKota/' + $('#provinsi').val(), function(data) {
            $('#optionKota').empty();
            $('#optionKota').removeAttr('disabled');
            $.each(data.data, function(key, value) {
                $("#optionKota").append(
                    '<option value="' + data.data[key].name + '">' + data.data[key].name + '</option>'
                );
            });
        });
    });
</script>
@endsection
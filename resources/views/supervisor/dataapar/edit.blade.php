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
                    <select name="tipe_id" class="form-control">
                        <option disabled>--Pilih Tipe APAR--</option>
                        @foreach($tipe as $tipe)
                        <option value="{{$tipe->id}}" {{$tipe->id == $dataapar->tipe_id ? 'selected' : ''}}>{{$tipe->nama_tipe}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis" class="form-label">Pilih Jenis APAR</label>
                    <select name="jenis_id" class="form-control">
                        <option disabled>--Pilih Jenis APAR--</option>
                        @foreach($jenis as $jenis)
                        <option value="{{$jenis->id}}" {{$jenis->id == $dataapar->jenis_id ? 'selected' : ''}}>{{$jenis->nama_jenis}}</option>
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
                    <select class="form-control" id="provinsi" name="provinsi" required>
                        <option selected disabled value="">===Pilih Provinsi===</option>
                        @foreach($provinsi as $data)
                        <option value="{{ucfirst(trans($data->id))}}" {{Str::title(Str::lower($data->name)) == Str::title(Str::lower($dataapar->provinsi)) ? 'selected' : ''}}>{{Str::title(Str::lower($data->name))}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kota"> Kota </label>
                    <select class="form-control" name="kota" required id="optionKota">
                        <option selected disabled value="">===Pilih Kota===</option>
                        @foreach($kota as $data)
                        <option value="{{Str::title(Str::lower($data->name))}}" {{Str::title(Str::lower($data->name)) == Str::title(Str::lower($dataapar->kota)) ? 'selected' : ''}}>{{Str::title(Str::lower($data->name))}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="zona"> Pilih Zona APAR</label>
                    <select name="zona_id" class="form-control">
                        <option disabled>===Pilih Zona===</option>
                        @foreach($zona as $data)
                        <option value="{{$data->id}}" {{$data->id == $dataapar->zona_id ? 'selected' : ''}}>{{$data->zona}}</option>
                        @endforeach
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
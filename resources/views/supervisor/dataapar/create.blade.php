@extends('supervisor.dataapar.layout')

@section('content')
@include('sweetalert::alert')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-body">
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
            <div>

            </div>
            <form method="post" action="/apar/dataapar">
                @csrf
                <!-- <div class="form-group">
                    <label for="id" class="form-label"> Kode APAR </label>
                    <input type="number" class="form-control" name="kd_apar" min=1 required>
                </div> -->
                <div class="form-group">
                    <label for="tipe" class="form-label"> Tipe APAR </label>
                    <select name="tipe_id" class="form-control">
                        <option disabled selected>--Pilih Tipe APAR--</option>
                        @foreach($tipe as $tipe)
                        <option value="{{$tipe->id}}">{{$tipe->nama_tipe}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis" class="form-label">Pilih Jenis APAR</label>
                    <select name="jenis_id" class="form-control">
                        <option disabled selected>--Pilih Jenis APAR--</option>
                        @foreach($jenis as $jenis)
                        <option value="{{$jenis->id}}">{{$jenis->nama_jenis}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="berat" class="form-label">Berat APAR</label>
                    <input type="number" step=".01" min=1 name="berat" class="form-control">
                </div>

                <div class="form-group">
                    <label for="lokasi"> Lokasi </label>
                    <input type="text" class="form-control" name="lokasi" required>
                </div>
                <div class="form-group">
                    <label for="provinsi"> Provinsi </label>
                    <select class="form-control" id="provinsi" name="provinsi" required>
                        <option selected disabled value="">===Pilih Provinsi===</option>
                        @foreach($provinsi as $data)
                        <option value="{{ucfirst(trans($data->id))}}">{{Str::title(Str::lower($data->name))}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kota"> Kota </label>
                    <select class="form-control" name="kota" required disabled id="optionKota">
                        <option selected disabled value="">===Pilih Kota===</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="zona" class="form-label">Pilih Zona APAR</label>
                    <select name="zona_id" class="form-control">
                        <option selected disabled value="">===Pilih Zona===</option>
                        @foreach($zona as $data)
                        <option value="{{$data->id}}">{{$data->zona}}</option>
                        @endforeach
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
                <div class="form-group">
                    <label for="kedaluarsa"> Kedaluarsa </label>
                    <input type="date" class="form-control" name="kedaluarsa" required>
                </div>
                <div class="form-group">
                    <label for="keterangan"> Status </label>
                    <select class="form-control" name="keterangan" required>
                        <option disabled selected>--Pilih Status--</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Service">Service</option>
                        <option value="Stock">Stock</option>
                    </select>
                </div>
                <center>
                    <a href="/apar/kelolaParameter" class="btn btn-info"> Kelola Parameter</a>
                    <button type="submit" class="btn btn-primary"> Simpan </button>
                </center>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#optionKota').prop('disabled', 'disabled');
    $('#optionKota').prop('selectedIndex', 0);
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
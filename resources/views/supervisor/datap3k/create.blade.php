@extends('supervisor.datap3k.layout')

@section('content')
@include('sweetalert::alert')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-body">
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
            <form method="post" action="/p3k/datap3k">
                @csrf
                <div class="form-group">
                    <label for="id"> Kode P3K </label>
                    <input type="text" class="form-control" name="kd_p3k" min=1 required>
                </div>
                <div class="form-label">
                    <label for="tipe" class="form-label">Tipe P3K</label>
                    <select name="tipe" class="form-control" required>
                        <option value=>-Pilih Tipe P3K-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div><br>
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
                    <label for="zona" class="form-label">Pilih Zona P3K</label>
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
                    <label for="lantai"> Lantai</label>
                    <input type="text" class="form-control" name="lantai" required>
                </div>
                <div class="form-group">
                    <label for="titik"> Titik </label>
                    <input type="text" class="form-control" name="titik" required>
                </div>
                <div class="form-group">
                    <label for="keterangan"> Keterangan </label>
                    <input type="text" class="form-control" name="keterangan" required>
                </div>
                <button type="submit" class="btn btn-primary"> Simpan </button>
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
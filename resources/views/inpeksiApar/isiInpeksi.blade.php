@extends('layouts.main')
@section('sidebar')
@if(Auth::User()->role == 'supervisor')
<li class="nav-item">
    <a class="nav-link {{Request::is('apar/dashboard*') ? 'active' : ''}} " href="/apar/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('apar/dataapar*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/dataapar">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Master APAR</span>
    </a>
</li>
<li class="nav-item {{Request::is('apar/masterinspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/masterinspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Master Inspeksi</span>
    </a>
</li>

<li class="nav-item {{Request::is('apar/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/inspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
    </a>
</li>
@else
<li class="nav-item">
    <a class="nav-link" href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/apar/inspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
    </a>
</li>
@endif
@endsection
@section('content')
<div class="col-md-8 offset-md-2"><br>
    <h3 class="text-center"> Tambah Data </h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div> <br />
    @endif

    <div class="card">
        <div class="card-body">
            <form method="post" action="/apar/inputInpeksiApar">
                @csrf
                <input type="hidden" value="{{date('Y-m-d')}}" name="tanggal">
                <div class="form-group">
                    <label for="id"> Kode Apar </label>
                    <select class="form-control " name="id" required>
                        @foreach($aparinspeksi->DetailInspeksi as $apart)
                        <option value="{{$apart->id}}">{{$apart->apart_id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis" class="form-label">PRESSURE/CATRIDGE</label>
                    <select name="jenis" class="form-control fieldInspeksi">
                        <option value="Ok">Ok</option>
                        <option value="Not Ok">Not Ok</option>
                        <option value="n/a">n/a</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="noozle" class="form-label">NOOZLE APAR</label>
                    <select name="noozle" class="form-control fieldInspeksi">
                        <option value="Ok">Ok</option>
                        <option value="Not Ok">Not Ok</option>
                        <option value="n/a">n/a</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selang" class="form-label">Selang APAR</label>
                    <select name="selang" class="form-control fieldInspeksi">
                        <option value="Ok">Ok</option>
                        <option value="Not Ok">Not Ok</option>
                        <option value="n/a">n/a</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tabung" class="form-label">Tabung APAR</label>
                    <select name="tabung" class="form-control fieldInspeksi">
                        <option value="Ok">Ok</option>
                        <option value="Not Ok">Not Ok</option>
                        <option value="n/a">n/a</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rambu" class="form-label">Rambu APAR</label>
                    <select name="rambu" class="form-control fieldInspeksi">
                        <option value="Ok">Ok</option>
                        <option value="Not Ok">Not Ok</option>
                        <option value="n/a">n/a</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="label" class="form-label">Label APAR</label>
                    <select name="label" class="form-control fieldInspeksi">
                        <option value="Ok">Ok</option>
                        <option value="Not Ok">Not Ok</option>
                        <option value="n/a">n/a</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cat" class="form-label">Kondisi Cat APAR</label>
                    <select name="cat" class="form-control fieldInspeksi">
                        <option value="Ok">Ok</option>
                        <option value="Not Ok">Not Ok</option>
                        <option value="n/a">n/a</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pin" class="form-label">Pin APAR</label>
                    <select name="pin" class="form-control fieldInspeksi">
                        <option value="Ok">Ok</option>
                        <option value="Not Ok">Not Ok</option>
                        <option value="n/a">n/a</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="roda" class="form-label">Roda APAR</label>
                    <select name="roda" class="form-control fieldInspeksi">
                        <option value="Ok">Ok</option>
                        <option value="Not Ok">Not Ok</option>
                        <option value="n/a">n/a</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan" class="form-label">Status APAR</label>
                    <input type="text" id="status" name="keterangan" readonly class="form-control" value="Aktif">
                </div>
                <div class="form-group">
                    <label for="foto"> Foto APAR</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <button type="submit" class="btn btn-primary"> Simpan </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.fieldInspeksi').on('change', function() {
        $('#status').val('Aktif');
        $('.fieldInspeksi').each(function(index) {
            if ($(this).val() == 'Not Ok') {
                $('#status').val('Service');
            }
        });
    });
</script>
@endsection
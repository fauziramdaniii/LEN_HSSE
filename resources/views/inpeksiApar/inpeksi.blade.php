@extends('layouts.main')
@section('sidebar')
@if(Auth::User()->role == 'supervisor')
<li class="nav-item">
    <a class="nav-link" href="/apar/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/apar/dataapar">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Master APAR</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/apar/masterinspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Master Inspeksi</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href=""> Report APAR</a></li>
            <li class="nav-item"> <a class="nav-link" href="/apar/statusapar">Status Apar</a></li>
            <li class="nav-item"> <a class="nav-link" href="/apar/aparinspeksi"> Inspeksi APAR </a></li>
        </ul>
    </div>
</li>
@else
<li class="nav-item">
    <a class="nav-link" href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">APAR Report</a></li>
            <li class="nav-item"> <a class="nav-link" href="/apar/statusapar">Status Apar</a></li>
            <li class="nav-item"> <a class="nav-link" href="/apar/aparinspeksi">APAR Inspeksi</a></li>
        </ul>
    </div>
</li>
@endif
@endsection
@section('content')
<div class="content-wrapper">
    @if(!empty($periode))
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
                    <div class="form-group">
                        <label for="id"> Kode Apar </label>
                        <select class="form-control" name="apart_id" required>
                            @foreach($aparinspeksi as $apart)
                            <option value="{{$apart->id}}">{{$apart->apart_id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="jenis" class="form-label">PRESSURE/CATRIDGE</label>
                        <select name="jenis" class="form-control">
                            <option value="Ok">Ok</option>
                            <option value="Not Ok">Not Ok</option>
                            <option value="n/a">n/a</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="noozle" class="form-label">NOOZLE APAR</label>
                        <select name="noozle" class="form-control">
                            <option value="Ok">Ok</option>
                            <option value="Not Ok">Not Ok</option>
                            <option value="n/a">n/a</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="selang" class="form-label">Selang APAR</label>
                        <select name="selang" class="form-control">
                            <option value="Ok">Ok</option>
                            <option value="Not Ok">Not Ok</option>
                            <option value="n/a">n/a</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="tabung" class="form-label">Tabung APAR</label>
                        <select name="tabung" class="form-control">
                            <option value="Ok">Ok</option>
                            <option value="Not Ok">Not Ok</option>
                            <option value="n/a">n/a</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="rambu" class="form-label">Rambu APAR</label>
                        <select name="rambu" class="form-control">
                            <option value="Ok">Ok</option>
                            <option value="Not Ok">Not Ok</option>
                            <option value="n/a">n/a</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="label" class="form-label">Label APAR</label>
                        <select name="label" class="form-control">
                            <option value="Ok">Ok</option>
                            <option value="Not Ok">Not Ok</option>
                            <option value="n/a">n/a</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="cat" class="form-label">Kondisi Cat APAR</label>
                        <select name="cat" class="form-control">
                            <option value="Ok">Ok</option>
                            <option value="Not Ok">Not Ok</option>
                            <option value="n/a">n/a</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="pin" class="form-label">Pin APAR</label>
                        <select name="pin" class="form-control">
                            <option value="Ok">Ok</option>
                            <option value="Not Ok">Not Ok</option>
                            <option value="n/a">n/a</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="roda" class="form-label">Roda APAR</label>
                        <select name="roda" class="form-control">
                            <option value="Ok">Ok</option>
                            <option value="Not Ok">Not Ok</option>
                            <option value="n/a">n/a</option>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="keterangan" class="form-label">Jenis APAR</label>
                        <select name="keterangan" class="form-control">
                            <option value="aktiv"> AKTIF</option>
                            <option value="service">SERVICE</option>
                            <option value="stock">STOCK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto"> Foto APAR</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <button type="submit" class="btn btn-primary"> Simpan </button>
                </form>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Inpeksi Apart Bulan {{date('F Y')}} Belum Dibuka</h4>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
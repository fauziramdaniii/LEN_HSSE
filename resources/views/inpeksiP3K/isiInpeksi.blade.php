@extends('layouts.main')
@section('sidebar')
@if(Auth::User()->role == 'supervisor')
<li class="nav-item {{Request::is('p3k/dashboard*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/dashboard">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('p3k/datap3k*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/datap3k">
        <i class="mdi mdi-medical-bag menu-icon"></i>
        <span class="menu-title">Master P3K</span>
    </a>
</li>
<li class="nav-item {{Request::is('p3k/masterinspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/masterinspeksi">
        <i class="mdi mdi-calendar-clock menu-icon"></i>
        <span class="menu-title">Master Inspeksi</span>
    </a>
</li>

<li class="nav-item {{Request::is('p3k/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/inspeksi">
        <i class="mdi mdi-clipboard-text menu-icon"></i>
        <span class="menu-title">Inspeksi P3K</span>
    </a>
</li>
@else
<li class="nav-item {{Request::is('dashboard*') ? 'active' : ''}}">
    <a class="nav-link" href="/dashboard">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('p3k/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/inspeksi">
        <i class="mdi mdi-clipboard-text menu-icon"></i>
        <span class="menu-title">Inspeksi P3K</span>
    </a>
</li>
@endif
@endsection

@section ("content")
@include('sweetalert::alert')
<h3>
    <center>Input Inspeksi
</h3>
<br>
<form action="/p3k/inputInpeksi/{{$inpeksi->id}}" method="post">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table width="100%" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Isi</th>
                            <th>Standar</th>
                            <th>Jumlah Sekarang</th>
                            <th>Keterangan Inspeksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inpeksi->isi as $isi)
                        <tr>
                            <td>
                                <p class="ml-2">{{$isi->detail->isi}}
                                    @if (substr($isi->detail->isi,0,7) == 'Aquades' || substr($isi->detail->isi,0,7) == 'Alkohol' || substr($isi->detail->isi,0,7) == 'Povidon')
                                    <span class="text-danger">*</span>
                                    @endif
                                </p>
                            </td>
                            <td class="text-center">{{$isi->detail->standar}}</td>
                            <td><input type="number" min=0 name="jumlah[{{$isi->id}}]" class="form-control col-sm-12" placeholder="Jumlah" required></td>
                            <td>
                                @if (substr($isi->detail->isi,0,7) == 'Aquades' || substr($isi->detail->isi,0,7) == 'Alkohol' || substr($isi->detail->isi,0,7) == 'Povidon')
                                <input required type="text" size="40" name="keterangan[{{$isi->id}}]" class="form-control" placeholder="Keterangan">
                                @else
                                <input type="text" size="40" name="keterangan[{{$isi->id}}]" class="form-control" placeholder="Keterangan">
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <p class="card-title"> Bukti Foto</p>
            <div class="row">
                <div class="col-sm-6">
                    <center>
                        <div id="my_camera" style="width:250px; height:333px;"></div>
                    </center>
                    <center><input type=button value="Ambil Foto" class="btn btn-info my-2" onClick="take_snapshot()"></center>
                    <input type="hidden" name="bukti" class="image-tag">

                </div>
                <div class="col-sm-6">
                    <center>
                        <div id="results"></div>
                    </center>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mt-2" style="float:right">Submit</button>
        </div>
    </div>
</form>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
<script language="JavaScript">
    Webcam.set('constraints', {
        image_format: 'jpeg',
        jpeg_quality: 90,
        facingMode: "environment"
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {

        Webcam.snap(function(data_uri) {

            $(".image-tag").val(data_uri);

            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';

        });

    }
</script>

@endsection
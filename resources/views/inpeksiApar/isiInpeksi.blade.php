@extends('layouts.main')

@section('sidebar')
@if(Auth::User()->role == 'supervisor')
<li class="nav-item {{Request::is('apar/dashboard') ? 'active' : ''}}">
    <a class="nav-link " href="/apar/dashboard">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('apar/dataapar*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/dataapar">
        <i class="mdi mdi-fire-extinguisher menu-icon"></i>
        <span class="menu-title">Master APAR</span>
    </a>
</li>
<li class="nav-item {{Request::is('apar/masterinspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/masterinspeksi">
        <i class="mdi mdi-calendar-clock menu-icon"></i>
        <span class="menu-title">Master Inspeksi</span>
    </a>
</li>

<li class="nav-item {{Request::is('apar/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/inspeksi">
        <i class="mdi mdi-clipboard-text menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
    </a>
</li>

@else
<li class="nav-item  {{Request::is('dashboard*') ? 'active' : ''}}">
    <a class="nav-link" href="/dashboard">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('apar/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/apar/inspeksi">
        <i class="mdi mdi-clipboard-text menu-icon"></i>
        <span class="menu-title">Inspeksi APAR</span>
    </a>
</li>
@endif
@endsection
@section('content')
@include('sweetalert::alert')
<form method="post" action="/apar/inputInpeksiApar">
    @csrf
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Input Inspeksi</p>
                    <input type="hidden" value="{{date('Y-m-d')}}" name="tanggal">
                    <input type="hidden" value="{{auth()->user()->name}}" name="pemeriksa">
                    <div class="form-group">
                        <label for="id"> Kode Apar </label>
                        <select class="form-control " name="id" required>
                            @foreach($aparinspeksi->DetailInspeksi as $apart)
                            <option value="{{$apart->id}}">{{$apart->apart->kd_apar}}</option>
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


                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Bukti Foto</p>
                    <!-- <center><button type="button" class="btn btn-success my-2" id="start-camera">Start Camera</button></center>
                    <center><video id="video" width="250px" height="333px" autoplay></video></center>
                    <center><button type="button" class="btn btn-info my-2" id="click-photo">Ambil Foto</button></center>
                    <center><canvas id="canvas" width="250px" height="333px"></canvas></center> -->

                    <center>
                        <div id="my_camera" style="width:250px; height:333px;"></div>
                    </center>
                    <center><input type=button value="Ambil Foto" class="btn btn-info my-2" onClick="take_snapshot()"></center>
                    <input type="hidden" name="bukti" class="image-tag">
                    <center>
                        <div id="results"></div>
                    </center>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="float: right;"> Simpan </button>
                </div>
            </div>
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
<!-- 
<script>
    let camera_button = document.querySelector("#start-camera");
    let video = document.querySelector("#video");
    let click_button = document.querySelector("#click-photo");
    let canvas = document.querySelector("#canvas");
    let file = null;

    $('#video').hide();
    $('#click-photo').hide();

    camera_button.addEventListener('click', async function() {
        $('#video').show();
        $('#click-photo').show();
        let stream = await navigator.mediaDevices.getUserMedia({
            video: true,
            audio: false
        });
        video.srcObject = stream;
    });

    click_button.addEventListener('click', function() {
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        let image_base64 = document.querySelector("#canvas").toDataURL('image/jpeg').replace(/^data:image\/jpeg;base64,/, "");



        console.log(image_base64);
    });
</script> -->
@endsection
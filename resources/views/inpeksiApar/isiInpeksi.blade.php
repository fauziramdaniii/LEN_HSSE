@extends('layouts.main')

@section('sidebar')
    @if (Auth::User()->role == 'supervisor')
        <li class="nav-item {{ Request::is('apar/dashboard') ? 'active' : '' }}">
            <a class="nav-link " href="/apar/dashboard">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('apar/dataapar*') ? 'active' : '' }}">
            <a class="nav-link" href="/apar/dataapar">
                <i class="mdi mdi-fire-extinguisher menu-icon"></i>
                <span class="menu-title">Master APAR</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('apar/masterinspeksi*') ? 'active' : '' }}">
            <a class="nav-link" href="/apar/masterinspeksi">
                <i class="mdi mdi-calendar-clock menu-icon"></i>
                <span class="menu-title">Master Inspeksi</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('apar/inspeksi*') ? 'active' : '' }}">
            <a class="nav-link" href="/apar/inspeksi">
                <i class="mdi mdi-clipboard-text menu-icon"></i>
                <span class="menu-title">Inspeksi APAR</span>
            </a>
        </li>
    @else
        <li class="nav-item  {{ Request::is('dashboard*') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('apar/inspeksi*') ? 'active' : '' }}">
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
                        <input type="hidden" value="{{ date('Y-m-d') }}" name="tanggal">
                        <input type="hidden" value="{{ auth()->user()->name }}" name="pemeriksa">
                        <div class="form-group">
                            <label for="id"> Kode Apar </label>
                            <select class="form-control " name="id" required>
                                @foreach ($aparinspeksi->DetailInspeksi as $apart)
                                    <option value="{{ $apart->id }}">{{ $apart->apart->kd_apar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis" class="form-label"> PRESSURE/CATRIDGE </label>
                            <div class="row m-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="jenis"
                                        value="Ok" id="flexRadioDefault1">
                                    OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="jenis"
                                        value="Not Ok" id="flexRadioDefault1">
                                    NOT OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="jenis"
                                        value="n/a" id="flexRadioDefault1">
                                    N/A
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="noozle" class="form-label"> NOZZLE APAR </label>
                            <div class="row m-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="noozle"
                                        value="Ok" id="flexRadioDefault1">
                                    OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="noozle"
                                        value="Not Ok" id="flexRadioDefault1">
                                    NOT OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="noozle"
                                        value="n/a" id="flexRadioDefault1">
                                    N/A
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selang" class="form-label"> SELANG APAR </label>
                            <div class="row m-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="selang"
                                        value="Ok" id="flexRadioDefault1">
                                    OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="selang"
                                        value="Not Ok" id="flexRadioDefault1">
                                    NOT OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="selang"
                                        value="n/a" id="flexRadioDefault1">
                                    N/A
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tabung" class="form-label"> TABUNG APAR </label>
                            <div class="row m-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="tabung"
                                        value="Ok" id="flexRadioDefault1">
                                    OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="tabung"
                                        value="Not Ok" id="flexRadioDefault1">
                                    NOT OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="tabung"
                                        value="n/a" id="flexRadioDefault1">
                                    N/A
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rambu" class="form-label"> RAMBU APAR </label>
                            <div class="row m-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="rambu"
                                        value="Ok" id="flexRadioDefault1">
                                    OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="rambu"
                                        value="Not Ok" id="flexRadioDefault1">
                                    NOT OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="rambu"
                                        value="n/a" id="flexRadioDefault1">
                                    N/A
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="label" class="form-label"> LABEL APAR </label>
                            <div class="row m-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="label"
                                        value="Ok" id="flexRadioDefault1">
                                    OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="label"
                                        value="Not Ok" id="flexRadioDefault1">
                                    NOT OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="label"
                                        value="n/a" id="flexRadioDefault1">
                                    N/A
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat" class="form-label"> SELANG APAR </label>
                            <div class="row m-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="cat"
                                        value="Ok" id="flexRadioDefault1">
                                    OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="cat"
                                        value="Not Ok" id="flexRadioDefault1">
                                    NOT OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="cat"
                                        value="n/a" id="flexRadioDefault1">
                                    N/A
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pin" class="form-label"> PIN APAR </label>
                            <div class="row m-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="pin"
                                        value="Ok" id="flexRadioDefault1">
                                    OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="pin"
                                        value="Not Ok" id="flexRadioDefault1">
                                    NOT OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="pin"
                                        value="n/a" id="flexRadioDefault1">
                                    N/A
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="roda" class="form-label"> RODA APAR </label>
                            <div class="row m-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="roda"
                                        value="Ok" id="flexRadioDefault1">
                                    OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="roda"
                                        value="Not Ok" id="flexRadioDefault1">
                                    NOT OK
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input fieldInspeksi" type="radio" name="roda"
                                        value="n/a" id="flexRadioDefault1">
                                    N/A
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-label">Status APAR</label>
                            <input type="text" id="status" name="keterangan" readonly class="form-control"
                                value="Aktif">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Bukti Foto</p>
                        {{-- <!-- <center><button type="button" class="btn btn-success my-2" id="start-camera">Start Camera</button></center>                                                                                                                <center><video id="video" width="250px" height="333px" autoplay></video></center>
                        <center><button type="button" class="btn btn-info my-2" id="click-photo">Ambil Foto</button></center>
                        <center><canvas id="canvas" width="250px" height="333px"></canvas></center> --> --}}
                        <center>
                            <div id="my_camera" style="width:250px; height:333px;"></div>
                        </center>
                        <center><input type=button value="Ambil Foto" class="btn btn-info my-2"
                                onClick="take_snapshot()"></center>
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
        $(document).on('change', '.fieldInspeksi', function() {
            $('#status').val('Aktif');
            $('input[type="radio"]:checked').each(function(index) {
                console.log($(this).val());
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
                                                                                                                                                                                                                        let image_base64 = document.querySelector("#canvas").toDataURL('image/jpeg').replace(
                                                                                                                                                                                                                            /^data:image\/jpeg;base64,/, "");



                                                                                                                                                                                                                        console.log(image_base64);
                                                                                                                                                                                                                    });
                                                                                                                                                                                                                </script> -->
@endsection

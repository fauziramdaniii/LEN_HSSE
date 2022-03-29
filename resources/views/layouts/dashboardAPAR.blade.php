<div class="row">
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-tale">
            <div class="card-body">
                <p class="mb-4 text-center">JUMLAH APAR </p>
                <p class="fs-30 mb-2 text-center">{{$jumlahAPAR}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
            <div class="card-body">
                <p class="mb-4 text-center">APAR AKTIF </p>
                <p class="fs-30 mb-2 text-center">{{$aparAktif}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-tale">
            <div class="card-body">
                <p class="mb-4 text-center">APAR SERVICE </p>
                <p class="fs-30 mb-2 text-center">{{$aparService}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
            <div class="card-body">
                <p class="mb-4 text-center">APAR STOCK </p>
                <p class="fs-30 mb-2 text-center">{{$aparStock}}</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-right text-center">INSPEKSI APAR {{date('F Y')}} </p>
                <p class="font-weight-500 text-center">Berikut adalah informasi dari Inspeksi periode saat ini </p>
                <canvas id="jumlahInspeksiAPAR"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-right text-center">JENIS APAR </p>
                <p class="font-weight-500 text-center">Berikut adalah informasi dari jumlah jenis APAR yang ada</p>
                <canvas id="jenisChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
                <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                    <div class="ml-xl-4 mt-3">
                                        <p class="card-title">Zona Reports</p>
                                        <h1 class="text-primary">{{$jumlahAPAR}}</h1>
                                        <p class="mb-2 mb-xl-0">Berikut adalah informasi Titik APAR berdasarkan zona APAR</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-9">
                                    <div class="row">
                                        <div class="col-md-6 border-right">
                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                <table class="table table-borderless report-table">
                                                    @foreach($zonas as $zona)
                                                    <tr>
                                                        <td class="text-muted">Zona {{$zona->zona}}</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                @if($dataAPAR->where('zona_id',$zona->id)->count() != 0)
                                                                <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo round($dataAPAR->where('zona_id', $zona->id)->count() / $jumlahAPAR * 100, 2) . "%" ?>" aria-valuenow="{{$dataAPAR->where('zona',$zona->id)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                @else
                                                                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="{{$dataAPAR->where('zona_id',$zona->id)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-weight-bold mb-0">{{$dataAPAR->where('zona_id',$zona->id)->count()}}</h5>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <p class="card-title">Tipe APAR</p>
                                            <canvas id="tipeChart"></canvas>
                                            <div id="tipeChart-legend"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-center">STATUS APAR </p>

                <p class="font-weight-50 text-center">Berikut adalah Informasi Hasil Inspeksi APAR {{date('Y')}}</p>
                <div id="sales-legends" class="chartjs-legend mt-4 mb-2"></div>
                <canvas id="sales-charts"></canvas>
            </div>
        </div>
    </div>
</div>
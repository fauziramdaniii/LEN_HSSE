@extends('supervisor.dataapar.layout')
<?php $no = 1 ?>
@section ("content")

<div class="row">
  <div class="col-md-6 mb-4 stretch-card transparent">
    <div class="card card-tale">
      <div class="card-body">
        <p class="mb-4 text-center">JUMLAH APAR </p>
        <p class="fs-30 mb-2 text-center">4006</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-4 stretch-card transparent">
    <div class="card card-dark-blue">
      <div class="card-body">
        <p class="mb-4 text-center">JUMLAH PERIODE </p>
        <p class="fs-30 mb-2 text-center">61344</p>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <p class="card-title text-right text-center">JENIS APAR </p>
      <p class="font-weight-500 text-center">Berikut adalah informasi dari jumlah jenis apar yang ada, angka max 1200 jeung min 200 na gentos ku 4 nami jenis rob, hese euy </p>
      <div class="d-flex flex-wrap mb-5">
        <div class="mr-5 mt-3">
          <p class="text-muted text-center">CO2</p>
          <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
        </div>
        <div class="mr-5 mt-3 text-center">
          <p class="text-muted text-center">POWDER</p>
          <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
        </div>
        <div class="mr-5 mt-3">
          <p class="text-muted text-center">FOAM</p>
          <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
        </div>
        <div class="mt-3">
          <p class="text-muted text-center">AIR</p>
          <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
        </div> 
      </div>
      <canvas id="order-chart"></canvas>
    </div>
  </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
     <div class="d-flex justify-content-between">
      <p class="card-title text-center">STATUS APAR <i> (Ieu Teu daek Ka tengah wae) </i> </p>
     </div>
      <p class="font-weight-500 text-center">Berikut adalah Informasi Jumlah dari status APAR</p>
      <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
      <canvas id="sales-chart"></canvas>
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
                  <h1 class="text-primary">$TOTAL</h1>
                  <p class="mb-2 mb-xl-0">Berikut adalah informasi Titik APAR berdasarkan zona APAR</p>
                </div>  
                </div>
              <div class="col-md-12 col-xl-9">
                <div class="row">
                  <div class="col-md-6 border-right">
                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                      <table class="table table-borderless report-table">
                        <tr>
                          <td class="text-muted">Zona 1</td>
                          <td class="w-1- px-0">
                            <div class="progress progress-md mx-4">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td><h5 class="font-weight-bold mb-0">713</h5></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Zona 2</td>
                          <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td><h5 class="font-weight-bold mb-0">583</h5></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Zona 3</td>
                          <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td><h5 class="font-weight-bold mb-0">924</h5></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Zona 4</td>
                          <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td><h5 class="font-weight-bold mb-0">666</h5></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Zona 5</td>
                          <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td><h5 class="font-weight-bold mb-0">560</h5></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Zona 6</td>
                          <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td><h5 class="font-weight-bold mb-0">793</h5></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Zona 7</td>
                          <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td><h5 class="font-weight-bold mb-0">793</h5></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Zona 8</td>
                          <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td><h5 class="font-weight-bold mb-0">793</h5></td>
                        </tr>
                        <tr>
                          <td class="text-muted">Zona 9</td>
                          <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td><h5 class="font-weight-bold mb-0">793</h5></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3">
                    <canvas id="north-america-chart"></canvas>
                    <div id="north-america-legend"></div>
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
@endsection
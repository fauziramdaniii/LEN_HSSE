@extends('supervisor.dataapar.layout')
<?php $no = 1 ?>
@section ("content")

<div class="row">
  <div class="col-md-6 mb-4 stretch-card transparent">
    <div class="card card-tale">
      <div class="card-body">
        <p class="mb-4 text-center">JUMLAH APAR </p>
        <p class="fs-30 mb-2 text-center">{{$jumlahAPAR}}</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-4 stretch-card transparent">
    <div class="card card-dark-blue">
      <div class="card-body">
        <p class="mb-4 text-center">JUMLAH PERIODE </p>
        <p class="fs-30 mb-2 text-center">{{$jumlahPeriode}}</p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title text-right text-center">JENIS APAR </p>
        <p class="font-weight-500 text-center">Berikut adalah informasi dari jumlah jenis APAR yang ada</p>
        <canvas id="jenisChart"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title text-center">STATUS APAR </p>

        <p class="font-weight-500 text-center">Berikut adalah Informasi Jumlah dari status APAR {{date('Y')}}</p>
        <div id="sales-legends" class="chartjs-legend mt-4 mb-2"></div>
        <canvas id="sales-charts"></canvas>
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
                          <tr>
                            <td class="text-muted">Zona 1</td>
                            <td class="w-1- px-0">
                              <div class="progress progress-md mx-4">
                                @if($dataAPAR->where('zona',1)->count() != 0)
                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo round($dataAPAR->where('zona', 1)->count() / $jumlahAPAR * 100, 2) . "%" ?>" aria-valuenow="{{$dataAPAR->where('zona',1)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="{{$dataAPAR->where('zona',1)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                              </div>
                            </td>
                            <td>
                              <h5 class="font-weight-bold mb-0">{{$dataAPAR->where('zona',1)->count()}}</h5>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-muted">Zona 2</td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                @if($dataAPAR->where('zona',2)->count() != 0)
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo round($dataAPAR->where('zona', 2)->count() / $jumlahAPAR * 100, 2) . "%" ?>" aria-valuenow="{{$dataAPAR->where('zona',2)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="{{$dataAPAR->where('zona',1)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                              </div>
                            </td>
                            <td>
                              <h5 class="font-weight-bold mb-0">{{$dataAPAR->where('zona',2)->count()}}</h5>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-muted">Zona 3</td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                @if($dataAPAR->where('zona',3)->count() != 0)
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo round($dataAPAR->where('zona', 3)->count() / $jumlahAPAR * 100, 2) . "%" ?>" aria-valuenow="{{$dataAPAR->where('zona',3)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="{{$dataAPAR->where('zona',3)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                              </div>
                            </td>
                            <td>
                              <h5 class="font-weight-bold mb-0">{{$dataAPAR->where('zona',3)->count()}}</h5>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-muted">Zona 4</td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                @if($dataAPAR->where('zona',4)->count() != 0)
                                <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo round($dataAPAR->where('zona', 4)->count() / $jumlahAPAR  * 100, 2) . "%" ?>" aria-valuenow="{{$dataAPAR->where('zona',4)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="{{$dataAPAR->where('zona',4)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                              </div>
                            </td>
                            <td>
                              <h5 class="font-weight-bold mb-0">{{$dataAPAR->where('zona',4)->count()}}</h5>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-muted">Zona 5</td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                @if($dataAPAR->where('zona',5)->count() != 0)
                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo round($dataAPAR->where('zona', 5)->count() / $jumlahAPAR * 100, 2) . "%" ?>" aria-valuenow="{{$dataAPAR->where('zona',5)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="{{$dataAPAR->where('zona',5)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                              </div>
                            </td>
                            <td>
                              <h5 class="font-weight-bold mb-0">{{$dataAPAR->where('zona',5)->count()}}</h5>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-muted">Zona 6</td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                @if($dataAPAR->where('zona',6)->count() != 0)
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo round($dataAPAR->where('zona', 6)->count() / $jumlahAPAR  * 100, 2) . "%" ?>" aria-valuenow="{{$dataAPAR->where('zona',6)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="{{$dataAPAR->where('zona',6)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                              </div>
                            </td>
                            <td>
                              <h5 class="font-weight-bold mb-0">{{$dataAPAR->where('zona',6)->count()}}</h5>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-muted">Zona 7</td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                @if($dataAPAR->where('zona',7)->count() != 0)
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo round($dataAPAR->where('zona', 7)->count() / $jumlahAPAR * 100, 2) . "%" ?>" aria-valuenow="{{$dataAPAR->where('zona',7)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="{{$dataAPAR->where('zona',7)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                              </div>
                            </td>
                            <td>
                              <h5 class="font-weight-bold mb-0">{{$dataAPAR->where('zona',7)->count()}}</h5>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-muted">Zona 8</td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                @if($dataAPAR->where('zona',8)->count() != 0)
                                <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo round($dataAPAR->where('zona', 8)->count() / $jumlahAPAR  * 100, 2) . "%" ?>" aria-valuenow="{{$dataAPAR->where('zona',8)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="{{$dataAPAR->where('zona',8)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                              </div>
                            </td>
                            <td>
                              <h5 class="font-weight-bold mb-0">{{$dataAPAR->where('zona',8)->count()}}</h5>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-muted">Zona 9</td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                @if($dataAPAR->where('zona',9)->count() != 0)
                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo round($dataAPAR->where('zona', 9)->count() / $jumlahAPAR * 100, 2) . "%" ?>" aria-valuenow="{{$dataAPAR->where('zona',9)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="{{$dataAPAR->where('zona',9)->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                              </div>
                            </td>
                            <td>
                              <h5 class="font-weight-bold mb-0">{{$dataAPAR->where('zona',9)->count()}}</h5>
                            </td>
                          </tr>
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
@endsection

@section('script')
<script>
  // var tipe = @json($jenisApar);

  var jenis = <?php echo $jenisApar; ?>;
  var jumlahJenis = <?php echo $jumlahJenis; ?>;
  var tipe = <?php echo $tipeApar; ?>;
  var jumlahTipe = <?php echo $jumlahTipe; ?>;
  var periode = <?php echo $periode; ?>;
  var aktif = <?php echo $aktif; ?>;
  var service = <?php echo $service; ?>;
  var stock = <?php echo $stock; ?>;

  // console.log(jumlahJenis);
  //Jenis APAR
  var doughnutPieData = {
    datasets: [{
      data: jumlahJenis,
      backgroundColor: [
        '#4B49AC',
        '#57B657',
        '#FFC100',
        '#248AFD',
        '#FF4747',
        '#282f3a',
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: jenis
  };
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
  if ($("#jenisChart").length) {
    var pieChartCanvas = $("#jenisChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }

  //Status APAR
  if ($("#sales-charts").length) {
    var SalesChartCanvas = $("#sales-charts").get(0).getContext("2d");
    var SalesChart = new Chart(SalesChartCanvas, {
      type: 'bar',
      data: {
        labels: periode,
        datasets: [{
            label: 'AKTIF',
            data: aktif,
            backgroundColor: '#98BDFF'
          },
          {
            label: 'SERVICE',
            data: service,
            backgroundColor: '#4B49AC'
          },
          {
            label: 'STOCK',
            data: stock,
            backgroundColor: '#FFC100'
          }
        ]
      },
      options: {
        cornerRadius: 5,
        responsive: true,
        maintainAspectRatio: true,
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 20,
            bottom: 0
          }
        },
        scales: {
          yAxes: [{
            display: true,
            gridLines: {
              display: true,
              drawBorder: false,
              color: "#F2F2F2"
            },
            ticks: {
              display: true,
              min: 0,
              max: <?php echo $jumlahAPAR ?>,
              callback: function(value, index, values) {
                return value + '';
              },
              autoSkip: true,
              maxTicksLimit: 10,
              fontColor: "#6C7383"
            }
          }],
          xAxes: [{
            stacked: false,
            ticks: {
              beginAtZero: true,
              fontColor: "#6C7383"
            },
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
              display: false
            },
            barPercentage: 1
          }]
        },
        legend: {
          display: false
        },
        elements: {
          point: {
            radius: 0
          }
        }
      },
    });
    document.getElementById('sales-legends').innerHTML = SalesChart.generateLegend();
  }

  //Tipe APAR
  if ($("#tipeChart").length) {
    var areaData = {
      labels: tipe,
      datasets: [{
        data: jumlahTipe,
        backgroundColor: [
          "#4B49AC", "#FFC100", "#248AFD", '#57B657', '#FF4747', '#282f3a',
        ],
        borderColor: "rgba(0,0,0,0)"
      }]
    };
    var areaOptions = {
      responsive: true,
      maintainAspectRatio: true,
      segmentShowStroke: false,
      cutoutPercentage: 78,
      elements: {
        arc: {
          borderWidth: 4
        }
      },
      legend: {
        display: false
      },
      tooltips: {
        enabled: true
      },
      legendCallback: function(chart) {
        var text = [];
        var inc = 0;
        text.push('<div class="report-chart">');
        tipe.forEach(element => {
          text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[inc] + '"></div><p class="mb-0">' + element + '</p></div>');
          text.push('<p class="mb-0">' + jumlahTipe[inc] + '</p>');
          text.push('</div>');
          inc++;
        });
        text.push('</div>');

        return text.join("");
      },
    }
    var northAmericaChartPlugins = {
      beforeDraw: function(chart) {
        var width = chart.chart.width,
          height = chart.chart.height,
          ctx = chart.chart.ctx;

        ctx.restore();
        var fontSize = 3.125;
        ctx.font = "500 " + fontSize + "em sans-serif";
        ctx.textBaseline = "middle";
        ctx.fillStyle = "#13381B";

        var text = "<?php echo $jumlahAPAR ?>",
          textX = Math.round((width - ctx.measureText(text).width) / 2),
          textY = height / 2;

        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }
    var northAmericaChartCanvas = $("#tipeChart").get(0).getContext("2d");
    var northAmericaChart = new Chart(northAmericaChartCanvas, {
      type: 'doughnut',
      data: areaData,
      options: areaOptions,
      plugins: northAmericaChartPlugins
    });
    document.getElementById('tipeChart-legend').innerHTML = northAmericaChart.generateLegend();
  }
</script>
@endsection
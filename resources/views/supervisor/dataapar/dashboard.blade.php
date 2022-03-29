@extends('supervisor.dataapar.layout')
<?php $no = 1 ?>
@section ("content")

@include('layouts.dashboardAPAR')

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
  var jumlahInspeksi = <?php echo $jumlahInspeksi; ?>;

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

  var doughnutPieData2 = {
    datasets: [{
      data: jumlahInspeksi,
      backgroundColor: [
        '#FF4747',
        '#57B657',
        '#282f3a',
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: ['Belum Inspeksi', 'Sudah Inpeksi']
  };
  var doughnutPieOptions2 = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
  if ($("#jumlahInspeksiAPAR").length) {
    var pieChartCanvas = $("#jumlahInspeksiAPAR").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: doughnutPieData2,
      options: doughnutPieOptions2
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
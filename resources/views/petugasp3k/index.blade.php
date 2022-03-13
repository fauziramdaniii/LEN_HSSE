@extends('petugasp3k.layout')
<?php $no = 1 ?>
@section ("content")

@include('layouts.dashboardP3K')

@endsection

@section('script')
<script>
    var jumlahTipe = <?php echo $jumlahTipe; ?>;
    var jumlahInspeksi = <?php echo $jumlahInspeksi; ?>;
    var periode = <?php echo $periode; ?>;
    var lengkap = <?php echo $lengkap; ?>;
    var belum_lengkap = <?php echo $belum_lengkap ?>;

    //Inspeksi P3K
    var doughnutPieData = {
        datasets: [{
            data: jumlahInspeksi,
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
        labels: ['Sudah Inspeksi', 'Belum Inspeksi']
    };
    var doughnutPieOptions = {
        responsive: true,
        animation: {
            animateScale: true,
            animateRotate: true
        }
    };
    if ($("#inspeksiChart").length) {
        var pieChartCanvas = $("#inspeksiChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: doughnutPieData,
            options: doughnutPieOptions
        });
    }

    //status P3K
    if ($("#sales-charts").length) {
        var SalesChartCanvas = $("#sales-charts").get(0).getContext("2d");
        var SalesChart = new Chart(SalesChartCanvas, {
            type: 'bar',
            data: {
                labels: periode,
                datasets: [{
                        label: 'Lengkap',
                        data: lengkap,
                        backgroundColor: '#98BDFF'
                    },
                    {
                        label: 'Belum Lengkap',
                        data: belum_lengkap,
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
                            max: <?php echo $jumlahP3K ?>,
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


    //Tipe P3K
    if ($("#tipeChart").length) {
        var areaData = {
            labels: ['Tipe A', 'Tipe B', 'Tipe C'],
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

                text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[0] + '"></div><p class="mb-0"> Tipe A</p></div>');
                text.push('<p class="mb-0">' + jumlahTipe[0] + '</p>');
                text.push('</div>');

                text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[1] + '"></div><p class="mb-0"> Tipe B</p></div>');
                text.push('<p class="mb-0">' + jumlahTipe[1] + '</p>');
                text.push('</div>');

                text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[2] + '"></div><p class="mb-0"> Tipe C</p></div>');
                text.push('<p class="mb-0">' + jumlahTipe[2] + '</p>');
                text.push('</div>');
                inc++;

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

                var text = "<?php echo $jumlahP3K ?>",
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
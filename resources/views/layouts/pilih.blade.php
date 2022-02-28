@extends('layouts.app')
@section ("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin transparent">
            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-md-6">
                    <h3 class="font-weight-bold text-center">
                        <center>Selamat Datang {{Auth::User()->name}}
                    </h3>
                    <h6 class="font-weight-normal mb-0 text-center"> Berikut adalah Informasi terkait Inpeski APAR
                        dan P3K</h6>
                </div>
                <div class="col-md-3"> </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin transparent">
        <div class="row">
            <div class="col-md-3"> </div>
            <div class="col-md-3 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <center>
                            <p class="mb-4 text-center"> APAR </p>
                            <p class="fs-30 mb-2 text-center">{{$jumlahApar}}</p>
                            <p class="mb-2 text-center">(Jumlah APAR)</p>
                            <a href="/apar/dashboard" class="btn btn-info">Go</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <center>
                            <p class="mb-4 text-center">P3K</p>
                            <p class="fs-30 mb-2 text-center">{{$jumlahP3K}}</p>
                            <p class="mb-2 text-center">(Jumlah P3K)</p>
                            <a href="/p3k/dashboard" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3"> </div>

        </div>
    </div>
</div>

{{-- <script src="{{ asset ('template/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset ('template/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset ('template/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{ asset ('template/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset ('template/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset ('template/js/off-canvas.js') }}"></script>
<script src="{{ asset ('template/js/hoverable-collapse.js') }} "></script>
<script src="{{ asset ('template/js/template.js') }}"></script>
<script src="{{ asset ('template/js/settings.js') }} "></script>
<script src="{{ asset ('template/js/todolist.js') }} "></script>
<script src="{{ asset ('template/js/dashboard.js') }}"></script>
<script src="{{ asset ('template/js/Chart.roundedBarCharts.js') }} "></script> --}}

@endsection
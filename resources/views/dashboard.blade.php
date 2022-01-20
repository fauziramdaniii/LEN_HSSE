@extends('layouts.main')
@section ("content")
<!DOCTYPE html>
<html lang="en">
<head>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold text-justify">Selamat Datang Fauzi </h3>
                  <h6 class="font-weight-normal mb-0 text-justify"> Berikut adalah Informasi terkait Inpeski APAR dan P23K</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                  <p class="card-title"> Apar Report</p>
                  <a href="#" class="text-info">View all</a>
                  </div>
                  <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                  <div id="apar-legend" class="chartjs-legend mt-4 mb-2"></div>
                  <canvas id="apar-chart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                  <p class="card-title">P23K Report</p>
                  <a href="#" class="text-info">View all</a>
                  </div>
                  <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                  <div id="p23k-legend" class="chartjs-legend mt-4 mb-2"></div>
                  <canvas id="p23k-chart"></canvas>
                </div>
              </div>
            </div>
          </div>
        <div class="container">
            @yield("content")
        </div>    
      </div>
    </div>
  </div>
  <script src="{{ asset ('template/vendors/js/vendor.bundle.base.js') }}"></script>
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
  <script src="{{ asset ('template/js/Chart.roundedBarCharts.js') }} "></script>
</body>

</html>
@endsection
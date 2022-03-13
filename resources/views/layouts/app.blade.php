<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LEN HSSE</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset ('template/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset ('template/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset ('template/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset ('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset ('template/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset ('template/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset ('template/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset ('template/images/logo2.png') }}" />
</head>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/"><img src="{{ asset ('template/images/logo.png') }}" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="/"><img src="{{ asset ('template/images/logo2.png') }}" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset ('template/images/faces/face28.jpg') }}" style="width:100%" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <form action="/logout" method="post" id="form-id">
                @csrf
                <a class="dropdown-item" href="#" onclick="document.getElementById('form-id').submit();">
                  <i class="ti-power-off text-primary"></i>
                  Logout
                </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @yield("content")
    </div>

    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">COPYRIGHT © 2022 PT LEN INDUSTRI</span>
      </div>
    </footer>

    <script src="{{ asset ('template/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset ('template/vendors/chart.js/Chart.min.js')}}"></script>
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
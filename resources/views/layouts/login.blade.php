<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset ('template/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset ('template/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset ('template/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset ('template//css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset ('template/images/favicon.png') }}"  />
</head>

<body>
  @include('sweetalert::alert')
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="{{ asset ('template/images/logo.png')}}" alt="logo">
              </div>
              <h4>
                <center>Hello! let's get started
              </h4>
              <h6 class="font-weight-light text-center">Sign in to continue.</h6>
              <form class="pt-3" action="/login" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" value="{{old('email')}} ">
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset ('template/vendors/js/vendor.bundle.base.js')}} "></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset ('template/js/off-canvas.js')}} /template/js/off-canvas.js"></script>
  <script src="{{ asset ('template/js/hoverable-collapse.js') }} "></script>
  <script src="{{ asset ('template/js/template.js')}}"></script>
  <script src="{{ asset ('template/js/settings.js')}}"></script>
  <script src="{{ asset ('template/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>
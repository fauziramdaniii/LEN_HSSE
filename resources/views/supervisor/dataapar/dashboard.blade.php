@extends('supervisor.dataapar.layout')
<?php $no = 1 ?>
@section ("content")

<br>
<h3 class="font-weight-bold text-center">
  Dashboard
</h3>
<div class="col-sm-12">
  <br>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title">APAR DETAIL INFORMATION</p>
        <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
        <div class="d-flex flex-wrap mb-5">
          <div class="mr-5 mt-3">
            <p class="text-muted">Order value</p>
            <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
          </div>
          <div class="mr-5 mt-3">
            <p class="text-muted">Orders</p>
            <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
          </div>
          <div class="mr-5 mt-3">
            <p class="text-muted">Users</p>
            <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
          </div>
          <div class="mt-3">
            <p class="text-muted">Downloads</p>
            <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
          </div>
        </div>
        <canvas id="order-chart"></canvas>
      </div>
    </div>
  </div>
</div>


@endsection
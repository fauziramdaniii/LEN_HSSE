@extends('supervisor.dataapar.layout')
<?php $no = 1 ?>
@section ("content")
<div class="content-wrapper">
    <br>
    <h3>
        <center>List Periode Inpeksi</center>
    </h3>
    <center> <a href="masterinspeksi/create" class="btn btn-info"> Tambah Periode </a></center>
    <div class="col-sm-12">
        <br>
        @if (session()->get('success'))
        <div class="alert alert-sucess">
            {{ session()->get('sucess') }}
        </div>
        @endif
    </div>
    </center>
    <div class="row">
        @foreach ($periode as $periode)
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ date('F Y',strtotime ($periode->periode))  }}</h4>
                    <div class="media">

                        <div class="media-body">
                            <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection
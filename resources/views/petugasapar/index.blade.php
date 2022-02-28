@extends('petugasapar.layout')
<?php $no = 1 ?>
@section ("content")
<h3 class="font-weight-bold">
    <center>Dashboard</center>
</h3>
<div class="col-sm-12">
    <br>
    @if (session()->get('success'))
    <div class="alert alert-sucess">
        {{ session()->get('sucess') }}
    </div>
    @endif
</div>

@endsection

@section('modal')

@endsection
@extends('petugasp3k.layout')
<?php $no = 1 ?>
@section ("content")
<div class="content-wrapper">
    <br>
    <h3>
        <center>Dashboard P3K
    </h3>
    <div class="col-sm-12">
        <br>
        @if (session()->get('success'))
        <div class="alert alert-sucess">
            {{ session()->get('sucess') }}
        </div>
        @endif
    </div>
</div>
@endsection

@section('modal')

@endsection
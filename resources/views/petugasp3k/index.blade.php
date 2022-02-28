@extends('petugasp3k.layout')
<?php $no = 1 ?>
@section ("content")
<h3 class="font-weight-bold">
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
@endsection
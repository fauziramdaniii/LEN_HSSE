@extends('layouts.main')
@section('sidebar')
@if(Auth::User()->role == 'supervisor')
<li class="nav-item {{Request::is('p3k/dashboard*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item {{Request::is('p3k/datap3k*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/datap3k">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Master P3K</span>
    </a>
</li>
<li class="nav-item {{Request::is('p3k/masterinspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/masterinspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Master Inspeksi</span>
    </a>
</li>

<li class="nav-item {{Request::is('p3k/inspeksi*') ? 'active' : ''}}">
    <a class="nav-link" href="/p3k/inspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Inspeksi P3K</span>
    </a>
</li>
@else
<li class="nav-item">
    <a class="nav-link" href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/p3k/inspeksi">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Inspeksi P3K</span>
    </a>
</li>
@endif
@endsection

@section ("content")
<div class="content-wrapper">
    <br>
    <h3>
        <center>Input Inpeksi
    </h3>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="  table-responsive">
                <form action="/p3k/inputInpeksi/{{$inpeksi->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <table width="100%" class=" table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th width="35%">Isi</th>
                                <th width="15%">Standar</th>
                                <th widt="15%">Jumlah</th>
                                <th width="35%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inpeksi->isi as $isi)
                            <tr>
                                <td>
                                    <p class="ml-2">{{$isi->detail->isi}}
                                        @if (substr($isi->detail->isi,0,7) == 'Aquades' || substr($isi->detail->isi,0,7) == 'Alkohol' || substr($isi->detail->isi,0,7) == 'Povidon')
                                        <span class="text-danger">*</span>
                                        @endif
                                    </p>
                                </td>
                                <td class="text-center">{{$isi->detail->standar}}</td>
                                <td><input type="number" name="jumlah[{{$isi->id}}]" class="form-control" placeholder="Jumlah" required></td>
                                <td><input type="text" name="keterangan[{{$isi->id}}]" class="form-control" placeholder="Keterangan"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-2" style="float:right">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
@extends('superadmin.layout')

@section ("content")
@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Akun</h4>
            </div>
            <div class="card-body">
                <form action="/editAkun/{{Auth::User()->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::User()->name}}" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Email</label>
                        <input type="email" class="form-control" name="email" value="{{Auth::User()->email}}" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Password Lama</label>
                        <input type="password" class="form-control" name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Password Baru</label>
                        <input type="password" class="form-control" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" name="konf_new_password">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary" style="float: right;">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
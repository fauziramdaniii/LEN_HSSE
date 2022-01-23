{{-- @extends('layouts.main')
<?php $no=1 ?>
@section ("content")
<br>
<h3>Data Apar</h3>
    <a href="/apar/create" class="btn btn-danger"> Tambah Apar</a><br>
    <div class="col-sm-12"> <br>

        @if (session()->get('success'))
            <div class="alert alert-sucess">
                {{ session()->get('sucess') }}
            </div>
        @endif
    </div>
       
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Advanced Table</p>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="example" class="display expandable-table" style="width:100%">
                    <thead>
                      <tr>
                        <th>Quote#</th>
                        <th>Product</th>
                        <th>Business type</th>
                        <th>Policy holder</th>
                        <th>Premium</th>
                        <th>Status</th>
                        <th>Updated at</th>
                        <th></th>
                      </tr>
                    </thead>
                </table>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
  </div>
    <tbody>
    </tbody>
</table>
@endsection --}}
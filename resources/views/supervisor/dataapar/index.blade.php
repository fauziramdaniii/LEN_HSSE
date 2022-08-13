@extends('supervisor.dataapar.layout')
<?php $no = 1; ?>
@section('content')
    @include('sweetalert::alert')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">
                        DATA APAR
                    </h3>
                    <center>
                        <a href="dataapar/create" class="btn btn-info"> Tambah Data </a>
                        <a href="{{ $dataapar->count() > 0 ? 'dataapar/export' : '#' }}" class="btn btn-success"> Export Data
                        </a>
                    </center>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="table-responsive">
                                <table class="display expandable-table dataTable no-footer mb-2" id="order-listing"
                                    width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th> No </th>
                                            <th> Kode </th>
                                            <th> Tipe </th>
                                            <th> Jenis </th>
                                            <th> Berat </th>
                                            <!-- <th> Zona </th>
                                                                                                                                                                        <th> Titik </th> -->
                                            <th> Kedaluarsa </th>
                                            <th> Keterangan </th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataapar as $dataapar)
                                            <tr>
                                                <td> {{ $no++ }} </td>
                                                <td> {{ $dataapar->kd_apar }} </td>
                                                <td> {{ @$dataapar->Tipe->nama_tipe }} </td>
                                                <td> {{ @$dataapar->Jenis->nama_jenis }} </td>
                                                <td> {{ $dataapar->berat }} KG </td>
                                                <!-- <td> {{ @$dataapar->Zona->zona }} </td>
                                                                                                                                                                                                                                                            <td> {{ $dataapar->titik }} </td> -->
                                                <td
                                                    class="{{ date('Y-m-d') >= $dataapar->kedaluarsa ? 'text-danger' : '' }}">
                                                    {{ $dataapar->kedaluarsa }} </td>
                                                <td> {{ $dataapar->keterangan }} </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn btn-outline-secondary dropdown-toggle btn-lg p-3"
                                                            id="dropdownMenuIconButton3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuIconButton3">
                                                            <a class="dropdown-item p-2 btn-detail-apar"
                                                                data-id="{{ $dataapar->id }}"
                                                                href="javascript:void(0)">Detail</a>
                                                            <a class="dropdown-item p-2"
                                                                href="/apar/dataapar/{{ $dataapar->id }}/edit/">Edit</a>
                                                            <a class="dropdown-item p-2 deleteApar"
                                                                href="javascript:void(0)" data-id="{{ $dataapar->id }}"
                                                                data-toggle="modal" data-target="#modalDelete">Delete</a>
                                                            <a class="dropdown-item p-2"
                                                                href="/apar/inspeksiTahunan/{{ $dataapar->id }}/export">Report
                                                                Inspeksi</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus DATA APAR ini?
                </div>
                <div class="modal-footer">
                    <form id="deleteApar" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail APAR <span id="kodeApar"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tipe APAR</label>
                                <input class="form-control" type="text" name="" id="tipeApar" ut=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Jenis APAR</label>
                                <input class="form-control" type="text" name="" id="jenisApar" ut=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Berat APAR</label>
                                <input class="form-control" type="text" name="" id="beratApar" ut=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Lokasi</label>
                                <input class="form-control" type="text" name="" id="lokasi" ut=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Provinsi</label>
                                <input class="form-control" type="text" name="" id="provinsi" ut=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Kota</label>
                                <input class="form-control" type="text" name="" id="kota" ut=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Zona APAR</label>
                                <input class="form-control" type="text" name="" id="zonaApar" ut=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Gedung</label>
                                <input class="form-control" type="text" name="" id="gedung" ut=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Lantai</label>
                                <input class="form-control" type="text" name="" id="lantai" ut=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Titik</label>
                                <input class="form-control" type="text" name="" id="titik" ut=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal Kadaluarsa</label>
                                <input class="form-control" type="text" name="" id="tanggalKadaluarsa"
                                    ut="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Status</label>
                                <input class="form-control" type="text" name="" id="status" ut=""
                                    readonly>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <form id="deleteApar" method="post">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.deleteApar').on('click', function() {
            $('#deleteApar').prop('action', '/apar/dataapar/' + $(this).attr('data-id'));
        });

        $('#order-listing').DataTable();

        $(document).on('click', '.btn-detail-apar', function() {
            $.get(`/apar/dataapar/${$(this).attr('data-id')}/detail`, function(data) {
                $('#kodeApar').text(data.apar.kd_apar);
                $('#tipeApar').val(data.apar.tipe.nama_tipe);
                $('#jenisApar').val(data.apar.jenis.nama_jenis);
                $('#beratApar').val(data.apar.berat);
                $('#lokasi').val(data.apar.lokasi);
                $('#provinsi').val(data.apar.provinsi);
                $('#kota').val(data.apar.kota);
                $('#zonaApar').val(data.apar.zona.zona);
                $('#gedung').val(data.apar.gedung);
                $('#lantai').val(data.apar.lantai);
                $('#titik').val(data.apar.titik);
                $('#tanggalKadaluarsa').val(data.apar.kedaluarsa);
                $('#status').val(data.apar.keterangan);
            });
            $('#modalDetail').modal('show');
        });

        $(document).on('hidden.bs.modal', '#modalDetail', function() {
            $('#kodeApar').text('');
            $('#tipeApar').val('');
            $('#jenisApar').val('');
            $('#beratApar').val('');
            $('#lokasi').val('');
            $('#provinsi').val('');
            $('#kota').val('');
            $('#zonaApar').val('');
            $('#gedung').val('');
            $('#lantai').val('');
            $('#titik').val('');
            $('#tanggalKadaluarsa').val('');
            $('#status').val('');
        });
    </script>
@endsection

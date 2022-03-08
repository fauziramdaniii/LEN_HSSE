<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LAPORAN PEMERIKSAAN P3K TAHUNAN</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        .tab {
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px solid #ddd;
        }

        .tab td {
            font-size: x-small;
            padding: 5px 3px;
            padding-left: 10px;
        }

        .tab th {
            font-size: x-small;
            text-align: center;
            padding: 9px 3px;
        }

        tr td {
            font-size: x-small;
        }

        .baris tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .blue {
            background-color: #0275d8;
            color: white;
        }

        .imgLogo {
            object-fit: cover;
            width: 50px;
            height: 50px;
        }

        .rotate {
            display: inline-block;
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
            -webkit-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            transform: rotate(270deg);
        }
    </style>

</head>

<body>
    <table width="20%">
        <tr>
            <td> <img src="template/images/logo2.png" class="imgLogo" alt="logo"></td>
            <td> PT Len Industri (Persero)
                Jl Soekarno-Hatta No. 442
                Bandung</td>
        </tr>
    </table>
    <h2>
        <center>LAPORAN PEMERIKSAAN P3K</center>
    </h2>
    <table>
        <tr>
            <td><strong>Kode P3K</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{$p3k->id}}</strong></td>
        </tr>
        <tr>
            <td><strong>Tipe P3K</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{$p3k->tipe}}</strong></td>
        </tr>
        <tr>
            <td><strong>Lokasi</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{$p3k->lokasi}}</strong></td>
        </tr>
        <tr>
            <td><strong>Tahun</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{date('Y')}}</strong></td>
        </tr>

    </table>
    <br />

    <table width="100%" class="tab">
        <thead class="blue">
            <tr>
                <th rowspan="2">Item Periksa</th>
                <th colspan="12">Periode</th>
            </tr>
            <tr>
                @foreach($bulan as $data)
                <th>{{$data['bulan']}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="baris">
            @foreach($p3k->inspeksi->first()->isi as $isi)
            <tr>
                <td>{{$isi->detail->isi}}</td>
                @foreach($bulan as $data)
                @php
                $jumlah = null;
                $getPeriode = App\Models\MasterInspeksiP3K::whereYear('periode', date('Y'))->whereMonth('periode',$data['key'])->first();
                $inspeksi = $p3k->inspeksi->where('periode_id',@$getPeriode->id)->first();
                @endphp
                <td>
                    @if(empty($inspeksi))
                    @php continue; @endphp
                    @else
                    @php $jumlah = $inspeksi->isi->where('isi_id',$isi->id)->first(); @endphp
                    @endif

                    {{!empty($jumlah->jumlah) ? ($jumlah->jumlah >= $jumlah->detail->standar ? 'OK' : 'Not OK') : ''}}
                </td>
                @endforeach
            </tr>
            @endforeach
            <tr>
                <td><b>Keterangan</b></td>
                @foreach($bulan as $data)
                @php
                $jumlah = null;
                $getPeriode = App\Models\MasterInspeksiP3K::whereYear('periode', date('Y'))->whereMonth('periode',$data['key'])->first();
                $inspeksi = $p3k->inspeksi->where('periode_id',@$getPeriode->id)->first();
                @endphp
                <td>
                    @if(empty($inspeksi))
                    @php continue; @endphp
                    @endif
                    {{$inspeksi->keterangan}}
                </td>
                @endforeach
            </tr>
            <tr>
                <td><b>Nama Pelaksana</b></td>
                @foreach($bulan as $data)
                @php
                $jumlah = null;
                $getPeriode = App\Models\MasterInspeksiP3K::whereYear('periode', date('Y'))->whereMonth('periode',$data['key'])->first();
                $inspeksi = $p3k->inspeksi->where('periode_id',@$getPeriode->id)->first();
                @endphp
                <td>
                    @if(empty($inspeksi))
                    @php continue; @endphp
                    @endif
                    {{$inspeksi->pemeriksa}}
                </td>
                @endforeach
            </tr>
            <tr>
                <td><b>Tanggal</b></td>
                @foreach($bulan as $data)
                @php
                $jumlah = null;
                $getPeriode = App\Models\MasterInspeksiP3K::whereYear('periode', date('Y'))->whereMonth('periode',$data['key'])->first();
                $inspeksi = $p3k->inspeksi->where('periode_id',@$getPeriode->id)->first();
                @endphp
                <td>
                    @if(empty($inspeksi))
                    @php continue; @endphp
                    @endif
                    {{$inspeksi->tanggal}}
                </td>
                @endforeach
            </tr>

        </tbody>
    </table>

</body>

</html>
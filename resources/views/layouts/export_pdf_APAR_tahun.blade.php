<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LAPORAN PEMERIKSAAN APAR</title>

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
            text-align: center;
            padding: 5px 3px;
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
        <center>LAPORAN PEMERIKSAAN APAR</center>
    </h2>
    <table>
        <tr>
            <td><strong>Kode APAR</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{$apar->kd_apar}}</strong></td>
        </tr>
        <tr>
            <td><strong>Jenis APAR</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{@$apar->Jenis->nama_jenis}}</strong></td>
        </tr>
        <tr>
            <td><strong>Lokasi</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{$apar->lokasi}}</strong></td>
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
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">Periode</th>
                <th colspan="10">Item Periksa</th>
                <th rowspan="2">Nama Pemeriksa</th>
            </tr>
            <tr>
                <th>PRESSURE</th>
                <th>NOOZLE</th>
                <th>SELANG</th>
                <th>TABUNG</th>
                <th>RAMBU</th>
                <th>LABEL</th>
                <th>KONDISI CAT</th>
                <th>SAFETY PIN</th>
                <th>RODA</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody class="baris">
            @foreach($bulan as $data)
            @php
            $getPeriode = App\Models\MasterInspeksi::whereYear('periode', date('Y'))->whereMonth('periode',$data['key'])->first();
            $inspeksi = App\Models\DetailInpeksiApar::where('apart_id',$apar->id)->where('periode_id',@$getPeriode->id)->first();
            @endphp

            <tr>
                <td>{{empty($inspeksi->tanggal) ? '' : date('d/m',strtotime($inspeksi->tanggal))}}</td>
                <td>{{$data['bulan']}}</td>
                <td>{{@$inspeksi->jenis}}</td>
                <td>{{@$inspeksi->noozle}}</td>
                <td>{{@$inspeksi->selang}}</td>
                <td>{{@$inspeksi->tabung}}</td>
                <td>{{@$inspeksi->rambu}}</td>
                <td>{{@$inspeksi->label}}</td>
                <td>{{@$inspeksi->cat}}</td>
                <td>{{@$inspeksi->pin}}</td>
                <td>{{@$inspeksi->roda}}</td>
                <td>{{@$inspeksi->keterangan}}</td>
                <td>{{@$inspeksi->pemeriksa}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table width="100%">
        <tr style="font-size:small">
            <td style="text-align:left;vertical-align:top" width=85%>Disusun Oleh,</td>
            <td style="text-align:left;vertical-align:top">Mengetahui,</td>
        </tr>
        <tr>
            <td style="text-align:left;vertical-align:top"></td>
            <td style="text-align:left;vertical-align:top">Manager K3L</td>
        </tr>
        <tr style="font-size:small">
            <td style="text-align:left;vertical-align:top;padding-top:80px"><b>____________________</b></td>
            <td style="text-align:left;vertical-align:top;padding-top:80px"><b>____________________</b></td>
        </tr>
        <tr style="font-size:small">
            <td style="text-align:left;vertical-align:top">NIK.</td>
            <td style="text-align:left;vertical-align:top">NIK.</td>
        </tr>
    </table>
</body>

</html>
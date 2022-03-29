<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Data APAR</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        .tab {
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px solid #ddd;
        }

        .tab tr,
        .tab td,
        .tab th {
            font-size: x-small;
            text-align: center;
            padding: 9px;
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
        <center>Data APAR</center>
    </h2>
    <br />
    <table>
        <tr>
            <td><strong>Nama Perusahaan</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>PT.Len Industri (Persero)</strong></td>
        </tr>
        <tr>
            <td><strong>Tanggal</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{date('d F Y')}}</strong></td>
        </tr>

    </table>
    <br>

    <table width="100%" class="tab">
        <thead class="blue">
            <tr>
                <th>No</th>
                <th>KODE APAR</th>
                <th>TIPE</th>
                <th>JENIS</th>
                <th>BERAT</th>
                <th>LOKASI</th>
                <th>PROVINSI</th>
                <th>KOTA</th>
                <th>ZONA</th>
                <th>GEDUNG</th>
                <th>LANTAI</th>
                <th>TITIK</th>
                <th>EXPIRE</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody class="baris">
            @foreach($apars as $apar)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$apar->kd_apar}}</td>
                <td>{{@$apar->Tipe->nama_tipe}}</td>
                <td>{{@$apar->Jenis->nama_jenis}}</td>
                <td>{{$apar->berat}} KG</td>
                <td>{{$apar->lokasi}}</td>
                <td>{{$apar->provinsi}}</td>
                <td>{{$apar->kota}}</td>
                <td>{{@$apar->Zona->zona}}</td>
                <td>{{$apar->gedung}}</td>
                <td>{{$apar->lantai}}</td>
                <td>{{$apar->titik}}</td>
                <td>{{$apar->kedaluarsa}}</td>
                <td>{{$apar->keterangan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
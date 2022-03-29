<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Data P3K</title>

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
        <center>Data Master P3K</center>
    </h2>
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
    <br />
    <table width="100%" class="tab">
        <thead class="blue">
            <tr>
                <th>NO</th>
                <th>KODE P3K</th>
                <th>TIPE</th>
                <th>ALAMAT</th>
                <th>PROVINSI</th>
                <th>KOTA</th>
                <th>ZONA</th>
                <th>LOKASI</th>
                <th>LANTAI</th>
                <th>TITIK</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody class="baris">
            @foreach($p3k as $data)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$data->kd_p3k}}</td>
                <td>{{$data->tipe}}</td>
                <td>{{$data->lokasi}}</td>
                <td>{{$data->provinsi}}</td>
                <td>{{$data->kota}}</td>
                <td>{{@$data->Zona->zona}}</td>
                <td>{{$data->gedung}}</td>
                <td>{{$data->lantai}}</td>
                <td>{{$data->titik}}</td>
                <td>{{$data->keterangan}}</td>
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
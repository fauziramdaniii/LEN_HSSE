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

        .tab td {
            font-size: x-small;
            text-align: center;
            padding: 5px 3px;
        }

        .tab th {
            font-size: x-small;
            text-align: center;
            padding: 20px 3px;
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
        <center>INSPEKSI CHECKLIST APAR</center>
    </h2>
    @foreach($periode->DetailInspeksi as $period)
    <table>
        <tr>
            <td><strong>Kode P3K</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{$period->p3k_id}}</strong></td>
        </tr>
        <tr>
            <td><strong>Tipe P3K</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{$period->dataP3K->tipe}}</strong></td>
        </tr>
        <tr>
            <td><strong>Lokasi</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{$period->dataP3K->lokasi}}</strong></td>
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
                <th>No</th>
                <th>Isi</th>
                <th>Standar</th>
                <th>Jumlah</th>
                <th>Keterangan/Tindak Lanjut</th>
            </tr>
        </thead>
        <tbody class="baris">
            @foreach($period->isi as $isi)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$isi->detail->isi}}</td>
                <td>{{$isi->detail->standar}}</td>
                <td>{{$isi->jumlah}}</td>
                <td>{{$isi->keterangan}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <br>

    <br>
    <br>
    @endforeach
</body>

</html>
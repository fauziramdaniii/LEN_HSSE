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

        .tab td {
            font-size: x-small;
            text-align: center;
            padding: 5px 3px;
        }

        .tab th {
            font-size: x-small;
            text-align: center;
            padding: 35px 3px;
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
    <table>
        <tr>
            <td><strong>PERIODE</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{date('F Y',strtotime($periode->periode))}}</strong></td>
        </tr>

    </table>
    <br />

    <table width="100%" class="tab">
        <thead class="blue">
            <tr>
                <th>No</th>
                <th>KODE APAR</th>
                <th>TIPE</th>
                <th>JENIS</th>
                <th>BERAT</th>
                <th>TITIK</th>
                <th>EXPIRE</th>
                <th>
                    <div class="rotate">PRESSURE G/CATRIDGE</div>
                </th>
                <th>
                    <div class="rotate">NOZZLE</div>
                </th>
                <th>
                    <div class="rotate">SELANG</div>
                </th>
                <th>
                    <div class="rotate">TABUNG</div>
                </th>
                <th>
                    <div class="rotate">RAMBU</div>
                </th>
                <th>
                    <div class="rotate">LABEL</div>
                </th>
                <th>
                    <div class="rotate">KONDISI CAT</div>
                </th>
                <th>
                    <div class="rotate">SAFETY PIN</div>
                </th>
                <th>
                    <div class="rotate">RODA</div>
                </th>
                <th>
                    <div class="rotate">TANGGAL PERIKSA</div>
                </th>
                <th>
                    <div class="rotate">KETERANGAN</div>
                </th>
            </tr>
        </thead>
        <tbody class="baris">
            @foreach($periode->DetailInspeksi as $periode)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$periode->Apart->id}}</td>
                <td>{{@$periode->Apart->Tipe->nama_tipe}}</td>
                <td>{{@$periode->Apart->Jenis->nama_jenis}}</td>
                <td>{{$periode->Apart->berat}}</td>
                <td>{{$periode->Apart->titik}}</td>
                <td>{{$periode->Apart->kedaluarsa}}</td>
                <td>{{$periode->jenis}}</td>
                <td>{{$periode->noozle}}</td>
                <td>{{$periode->selang}}</td>
                <td>{{$periode->tabung}}</td>
                <td>{{$periode->rambu}}</td>
                <td>{{$periode->label}}</td>
                <td>{{$periode->cat}}</td>
                <td>{{$periode->pin}}</td>
                <td>{{$periode->roda}}</td>
                <td>{{$periode->tanggal}}</td>
                <td>{{$periode->keterangan}}</td>
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
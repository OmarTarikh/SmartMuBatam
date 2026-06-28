<!DOCTYPE html>
<html>

<head>

    <title>Data Keuangan Sedekah</title>

    <style>

        body{
            font-family:sans-serif;
            font-size:12px;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,
        td{
            border:1px solid #000;
            padding:6px;
            text-align:center;
            vertical-align:middle;
        }

        th{
            background:#dddddd;
        }

    </style>

</head>

<body>

    <h2>

        DATA KEUANGAN SEDEKAH MUHAMMADIYAH BATAM

    </h2>

    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Cabang</th>

                <th>Masjid</th>

                <th>Jumlah</th>

                <th>Keterangan</th>

                <th>Lokasi</th>

                <th>Tanggal</th>

            </tr>

        </thead>

        <tbody>

            @foreach($sedekahs as $item)

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $item->cabang->nama_cabang ?? '-' }}

                </td>

                <td>

                    {{ $item->masjid->nama_masjid ?? '-' }}

                </td>

                <td style="text-align:right;">

                    Rp {{ number_format(optional($item->sedekah)->jumlah ?? 0,0,',','.') }}

                </td>

                <td style="text-align:left;">

                    {{ optional($item->sedekah)->keterangan ?? '-' }}

                </td>

                <td>

                    {{ $item->lokasi }}

                </td>

                <td>

                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <br><br>

    <div align="right">

        Dicetak tanggal :

        {{ now()->format('d-m-Y') }}

    </div>

</body>

</html>
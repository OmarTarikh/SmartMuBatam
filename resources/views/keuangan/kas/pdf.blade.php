<!DOCTYPE html>
<html>

<head>

    <title>Data Keuangan Kas</title>

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

        DATA KEUANGAN KAS MUHAMMADIYAH BATAM

    </h2>

    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Cabang</th>

                <th>Jenis Kas</th>

                <th>Jumlah</th>

                <th>Keterangan</th>

                <th>Lokasi</th>

                <th>Tanggal</th>

            </tr>

        </thead>

        <tbody>

            @foreach($kas as $item)

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $item->cabang->nama_cabang ?? '-' }}

                </td>

                <td>

                    @if(optional($item->kas)->tipe == 'masuk')

                        KAS MASUK

                    @else

                        KAS KELUAR

                    @endif

                </td>

                <td style="text-align:right;">

                    Rp {{ number_format(optional($item->kas)->jumlah ?? 0,0,',','.') }}

                </td>

                <td style="text-align:left;">

                    {{ optional($item->kas)->keterangan ?? '-' }}

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
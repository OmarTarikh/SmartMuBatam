<!DOCTYPE html>
<html>

<head>

    <title>Data Program Kerja & Agenda</title>

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

        DATA PROGRAM KERJA & AGENDA MUHAMMADIYAH BATAM

    </h2>

    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Nama Kegiatan</th>

                <th>Cabang</th>

                <th>Jenis</th>

                <th>Target</th>

                <th>Progress</th>

                <th>Tanggal Mulai</th>

                <th>Tanggal Selesai</th>

                <th>Lokasi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($kegiatans as $item)

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td style="text-align:left;">

                    {{ $item->nama_kegiatan }}

                </td>

                <td>

                    {{ $item->cabang->nama_cabang ?? '-' }}

                </td>

                <td>

                    {{ $item->jenis == 'agenda'
                        ? 'AGENDA'
                        : 'PROGRAM KERJA' }}

                </td>

                <td style="text-align:left;">

                    {{ $item->target }}

                </td>

                <td>

                    {{ $item->progres_persen }}%

                </td>

                <td>

                    {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }}

                </td>

                <td>

                    {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}

                </td>

                <td style="text-align:left;">

                    {{ $item->lokasi }}

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="9">

                    Tidak ada data kegiatan.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    <br><br>

    <div align="right">

        Dicetak tanggal :

        {{ now()->format('d-m-Y') }}

    </div>

</body>

</html>
<!DOCTYPE html>
<html>
<head>

    <title>Data Anggota</title>

    <style>

        body{
            font-family: sans-serif;
            font-size:11px;
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
            border:1px solid black;
            padding:6px;
            text-align:center;
            vertical-align:middle;
        }

        th{
            background:#dddddd;
        }

        .text-left{
            text-align:left;
        }

    </style>

</head>
<body>

<h2>

    DATA ANGGOTA MUHAMMADIYAH BATAM

</h2>

<table>

    <thead>

        <tr>

            <th>No</th>

            <th>NIK</th>

            <th>Nama</th>

            <th>Kelamin</th>

            <th>Tgl Lahir</th>

            <th>Alamat</th>

            <th>Cabang</th>

            <th>Ranting</th>

            <th>Pekerjaan</th>

            <th>Pendidikan</th>

            <th>Status</th>

        </tr>

    </thead>

    <tbody>

        @forelse($anggotas as $anggota)

        <tr>

            <td>

                {{ $loop->iteration }}

            </td>

            <td>

                {{ $anggota->nik }}

            </td>

            <td class="text-left">

                {{ $anggota->nama }}

            </td>

            <td>

                {{ $anggota->jenis_kelamin }}

            </td>

            <td>

                {{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('d-m-Y') }}

            </td>

            <td class="text-left">

                {{ $anggota->alamat }}

            </td>

            <td>

                {{ $anggota->cabang->nama_cabang ?? '-' }}

            </td>

            <td>

                {{ $anggota->ranting->nama_ranting ?? '-' }}

            </td>

            <td>

                {{ $anggota->pekerjaan }}

            </td>

            <td>

                {{ $anggota->pendidikan }}

            </td>

            <td>

                {{ strtoupper($anggota->status) }}

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="11">

                Tidak ada data anggota

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
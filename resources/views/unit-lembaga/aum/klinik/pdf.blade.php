<!DOCTYPE html>
<html>

<head>

    <title>Data AUM Klinik</title>

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

        DATA AUM KLINIK MUHAMMADIYAH BATAM

    </h2>

    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Nama Klinik</th>

                <th>Cabang</th>

                <th>Ranting</th>

                <th>Jumlah Pasien</th>

                <th>Jumlah Dokter</th>

                <th>Kapasitas</th>

                <th>Tahun</th>

                <th>Status Perizinan</th>

                <th>Alamat</th>

            </tr>

        </thead>

        <tbody>

            @foreach($aums as $aum)

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $aum->nama_aum }}

                </td>

                <td>

                    {{ $aum->cabang->nama_cabang ?? '-' }}

                </td>

                <td>

                    {{ $aum->ranting->nama_ranting ?? '-' }}

                </td>

                <td>

                    {{ optional($aum->klinik)->jumlah_pasien ?? '-' }}

                </td>

                <td>

                    {{ optional($aum->klinik)->jumlah_dokter ?? '-' }}

                </td>

                <td>

                    {{ optional($aum->klinik)->kapasitas ?? '-' }}

                </td>

                <td>

                    {{ $aum->tahun ?? '-' }}

                </td>

                <td>

                    {{ strtoupper($aum->status_perizinan) }}

                </td>

                <td style="text-align:left;">

                    {{ $aum->alamat }}

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
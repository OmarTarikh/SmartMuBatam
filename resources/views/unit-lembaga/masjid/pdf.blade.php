<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Data Masjid Muhammadiyah</title>

    <style>

        body{
            font-family:sans-serif;
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
            border:1px solid #000;
            padding:7px;
            text-align:left;
            vertical-align:top;
        }

        th{
            background:#eaeaea;
            text-align:center;
        }

        .text-center{
            text-align:center;
        }

    </style>

</head>

<body>

    <h2>

        DATA MASJID MUHAMMADIYAH

    </h2>

    <table>

        <thead>

            <tr>

                <th width="5%">
                    No
                </th>

                <th width="20%">
                    Nama Masjid
                </th>

                <th width="15%">
                    Cabang
                </th>

                <th width="15%">
                    Ranting
                </th>

                <th>
                    Alamat
                </th>

                <th width="15%">
                    Status Legalitas
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($masjids as $masjid)

            <tr>

                <td class="text-center">

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $masjid->nama_masjid }}

                </td>

                <td>

                    {{ $masjid->ranting?->cabang?->nama_cabang ?? '-' }}

                </td>

                <td>

                    {{ $masjid->ranting?->nama_ranting ?? '-' }}

                </td>

                <td>

                    {{ $masjid->alamat }}

                </td>

                <td class="text-center">

                    @if($masjid->status_legalitas == 'sertifikat')

                        SERTIFIKAT

                    @elseif($masjid->status_legalitas == 'proses')

                        PROSES

                    @else

                        BELUM

                    @endif

                </td>

            </tr>

            @empty

            <tr>

                <td
                    colspan="6"
                    class="text-center">

                    Tidak ada data masjid

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</body>

</html>
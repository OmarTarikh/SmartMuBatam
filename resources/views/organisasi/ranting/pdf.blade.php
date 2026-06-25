<!DOCTYPE html>
<html>
<head>

    <title>Data Ranting</title>

    <style>

        body{
            font-family: sans-serif;
        }

        h2{
            text-align: center;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        th,td{
            border:1px solid black;
            padding:8px;
            text-align:center;
        }

        th{
            background:#dddddd;
        }

    </style>

</head>
<body>

<h2>
    DATA RANTING MUHAMMADIYAH BATAM
</h2>

<table>

    <thead>

        <tr>

            <th>No</th>

            <th>ID</th>

            <th>Nama Ranting</th>

            <th>Cabang</th>

            <th>Status</th>

        </tr>

    </thead>

    <tbody>

        @foreach($rantings as $ranting)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $ranting->id }}
            </td>

            <td>
                {{ $ranting->nama_ranting }}
            </td>

            <td>
                {{ $ranting->cabang->nama_cabang }}
            </td>

            <td>
                {{ $ranting->status }}
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
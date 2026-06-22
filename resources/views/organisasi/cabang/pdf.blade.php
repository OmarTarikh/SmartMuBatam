<!DOCTYPE html>
<html>
<head>
    <title>Data Cabang</title>

    <style>

        body{
            font-family: sans-serif;
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

<h2 align="center">
    DATA CABANG MUHAMMADIYAH BATAM
</h2>

<table>

    <thead>

        <tr>

            <th>No</th>

            <th>ID</th>

            <th>Nama Cabang</th>

            <th>Status</th>

        </tr>

    </thead>

    <tbody>

        @foreach($cabangs as $cabang)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $cabang->id }}</td>

            <td>{{ $cabang->nama_cabang }}</td>

            <td>{{ $cabang->status }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>
</html>
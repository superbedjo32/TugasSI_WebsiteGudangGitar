<!DOCTYPE html>
<html>
<head>
    <title>Print</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Laporan Data Pengiriman</h2>
    
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Nama Admin</th>
            <th>Nama Gitar</th>
            <th>Jumlah</th>
            <th>Waktu Pengiriman</th>
            <th>Supir</th>
            <th>Outlet</th>
        </tr>
        </tr>
        @php
        $no = 1;
        @endphp
        <tr class="text-center">
            @foreach ($data as $item)
                <td>{{ $no++ }}</td>
                <td>{{ $item->id_users }}</td>
                <td>{{ $item->id_Gitar }}</td>
                <td>{{ $item->Jumlah }}</td>
                <td>{{ $item->Waktu_Pengiriman }}</td>
                <td>{{ $item->id_Supir }}</td>
                <td>{{ $item->id_Rute }}</td>
            @endforeach
        </tr>
    </table>
</body>
</html>
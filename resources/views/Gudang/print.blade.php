<!DOCTYPE html>
<html>

<head>
    <title>Arkit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Laporan Data Gudang</h2>
    
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Nama Gudang</th>
            <th>Alamat Gudang</th>
        </tr>
        @php
        $no = 1;
        @endphp
        <tr class="text-center">
            @foreach ($data as $item)
                <td>{{ $no++ }}</td>
                <td>{{ $item->Nama_Gudang }}</td>
                <td>{{ $item->Alamat_Gudang }}</td>
            @endforeach
        </tr>
    </table>
</body>
</html>
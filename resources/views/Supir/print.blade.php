<!DOCTYPE html>
<html>

<head>
    <title>Print</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center">Laporan Data Supir</h2>

    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telp</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $item)
            <tr class="text-center">
                <td>{{ $no++ }}</td>
                <td>{{ $item->Nama_Supir }}</td>
                <td>{{ $item->Alamat_Supir }}</td>
                <td>{{ $item->Telp_Supir }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>

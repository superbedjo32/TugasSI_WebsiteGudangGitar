@extends('layout')

@section('content')
    <h1 class="h2">Pengiriman</h1><br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
    </button>
    <a href="{{ route('PrintPengiriman') }}" type="button" class="btn btn-danger mb-3 ">
        Print
    </a>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('Pengiriman') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Isi Modal -->
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nama Admin</label>
                            <select class="form-select" name="user" aria-label="Default select example">
                                <option selected disabled>Pilih Nama Admin</option>
                                @foreach ($User as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nama Gitar</label>
                            <select class="form-select" name="gitar" aria-label="Default select example">
                                <option selected disabled>Pilih Nama Gitar</option>
                                @foreach ($Gitar as $item)
                                    <option value="{{ $item->id }}">{{ $item->Nama_Gitar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Waktu Pengiriman</label>
                            <input type="date" name="waktu" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Supir</label>
                            <select class="form-select" name="supir" aria-label="Default select example">
                                <option selected disabled>Pilih Outlet Tujuan</option>
                                @foreach ($Supir as $item)
                                    <option value="{{ $item->id }}">{{ $item->Nama_Supir }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Rute</label>
                            <select class="form-select" name="Rute" aria-label="Default select example">
                                <option selected disabled>Pilih Rute Tujuan</option>
                                @foreach ($Rute as $item)
                                    <option value="{{ $item->id }}">{{ $item->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Admin</th>
                <th scope="col">Nama Gitar</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Waktu Pengiriman</th>
                <th scope="col">Supir</th>
                <th scope="col">Outlet</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($Pengiriman as $tampil)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $tampil->user->name }}</td>
                    <td>{{ $tampil->gitar->Nama_Gitar }}</td>
                    <td>{{ $tampil->Jumlah }}</td>
                    <td>{{ $tampil->Waktu_Pengiriman }}</td>
                    <td>{{ $tampil->supir->Nama_Supir }}</td>
                    <td>{{ $tampil->id_Rute }}</td>
                    <td><a href="" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $tampil->id }}">edit</a><br><a
                            href="{{ route('DelGudang', ['id' => $tampil->id]) }}">hapus</a></td>
                </tr>
                {{-- Update --}}
                <div class="modal fade" id="editModal{{ $tampil->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('UpdatePengiriman', ['id' => $tampil->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="modal-body">
                                    <!-- Isi Modal -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Nama Admin</label>
                                        <select class="form-select" name="user" value="{{ $tampil->id_users }}">
                                            <option selected disabled>Pilih Nama Admin</option>
                                            @foreach ($User as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Nama Gitar</label>
                                        <select class="form-select" name="gitar" value="{{ $tampil->id_Gitar }}">
                                            <option selected disabled>Pilih Nama Gitar</option>
                                            @foreach ($Gitar as $item)
                                                <option value="{{ $item->id }}">{{ $item->Nama_Gitar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Jumlah</label>
                                        <input type="text" name="jumlah" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->Jumlah }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Waktu
                                            Pengiriman</label>
                                        <input type="date" name="waktu" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->Waktu_Pengiriman }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Supir</label>
                                        <select class="form-select" name="supir" value="{{ $tampil->id_Supir }}">
                                            <option selected disabled>Pilih Outlet Tujuan</option>
                                            @foreach ($Supir as $item)
                                                <option value="{{ $item->id }}">{{ $item->Nama_Supir }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Rute</label>
                                        <select class="form-select" name="Rute" value="{{ $tampil->id_Rute }}">
                                            <option selected disabled>Pilih Rute Tujuan</option>
                                            @foreach ($Rute as $item)
                                                <option value="{{ $item->id }}">{{ $item->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layout')

@section('content')
    <h1 class="h2">Outlet</h1><br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
    </button>
    <button type="button" class="btn btn-danger mb-3 ">
        Print
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('StoreOutlet') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Isi Modal -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Outlet</label>
                            <input type="text" name="NamaO" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                            <input type="text" name="Almt" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">No. Telp</label>
                            <input type="text" name="telp" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">ID Pengguna</label>
                            <select class="form-select" name="id" aria-label="Default select example">
                                <option selected disabled>Pilih ID Pengguna</option>
                                @foreach ($Users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                <th scope="col">Nama Outlet</th>
                <th scope="col">Alamat</th>
                <th scope="col">No. Telp</th>
                <th scope="col">ID Pengguna</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($Outlet as $tampil)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $tampil->Nama_Outlet }}</td>
                    <td>{{ $tampil->Alamat_Outlet }}</td>
                    <td>{{ $tampil->Telp_Outlet }}</td>
                    <td>{{ $tampil->users->name }}</td>
                    <td><a href="#" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $tampil->id }}">edit</a><br><a
                            href="{{ route('DelOutlet', ['id' => $tampil->id]) }}">hapus</a></td>
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
                            <form action="{{ route('UpdateOutlet', ['id' => $tampil->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="modal-body">
                                    <!-- Isi Modal -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Outlet</label>
                                        <input type="text" name="NamaO" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->Nama_Outlet }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                        <input type="text" name="Almt" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->Alamat_Outlet }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">No. Telp</label>
                                        <input type="text" name="telp" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->Telp_Outlet }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">ID Pengguna</label>
                                        <select class="form-select" name="id" value="{{ $tampil->id_users }}">
                                            <option selected disabled>Pilih ID Pengguna</option>
                                            @foreach ($Users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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

@extends('layout')

@section('content')
    <h1 class="h2">Users</h1><br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
    </button>
    <a href="{{ route('PrintUsers') }}" type="button" class="btn btn-danger mb-3 ">
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
                <form action="{{ route('StoreUsers') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Isi Modal -->
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">ID Role</label>
                            <select class="form-select" name="IDRole" aria-label="Default select example">
                                <option selected disabled>Pilih ID Role</option>
                                @foreach ($Role as $item)
                                    <option value="{{ $item->id }}">{{ $item->role }}</option>
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
                <th scope="col">Nama</th>
                <th scope="col">email</th>
                <th scope="col">ID Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($Users as $tampil)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $tampil->name }}</td>
                    <td>{{ $tampil->email }}</td>
                    <td>{{ $tampil->roles->role }}</td>
                    <td><a href="" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $tampil->id }}">edit</a><br><a
                            href="{{ route('DelUsers', ['id' => $tampil->id]) }}">hapus</a></td>
                </tr>
                {{-- Update --}}
                <div class="modal fade" id="editModal{{ $tampil->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('UpdateUsers', ['id' => $tampil->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="modal-body">
                                    <!-- Isi Modal -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">email</label>
                                        <input type="email" name="email" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                        <input type="password" name="pass" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->Nama_Outlet }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">ID Role</label>
                                        <select class="form-select" name="IDRole" value="{{ $tampil->id_role }}">
                                            <option selected disabled>Pilih ID Role</option>
                                            @foreach ($Role as $item)
                                                <option value="{{ $item->id }}">{{ $item->role }}</option>
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

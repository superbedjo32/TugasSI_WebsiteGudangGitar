@extends('layout')

@section('content')
    <h1 class="h2">Data Gitar</h1><br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
    </button>
    <a href="{{ route('PrintDataGitar') }}" type="button" class="btn btn-danger mb-3 ">
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
                <form action="{{ route('StoreDataGitar') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Isi Modal -->
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Stok</label>
                            <input type="text" name="stok" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Jenis</label>
                            <select class="form-select" name="jenis" aria-label="Default select example">
                                <option selected disabled>Pilih Jenis Gitar</option>
                                @foreach ($JenisGitar as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
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
                <th scope="col">Stok</th>
                <th scope="col">Jenis</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            {{-- gitar dari controller, tampil untuk mecah data menjadi per field --}}
            @foreach ($gitar as $tampil)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $tampil->Nama_Gitar }}</td>
                    <td>{{ $tampil->Stok }}</td>
                    <td>{{ $tampil->jenis->nama_jenis }}</td>
                    <td><a href="" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $tampil->id }}">edit</a><br><a
                            href="{{ route('DelDataGitar', ['id' => $tampil->id]) }}">hapus</a></td>
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
                            <form action="{{ route('UpdateDataGitar', ['id' => $tampil->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="modal-body">
                                    <!-- Isi Modal -->
                                    <!-- Isi Modal -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->Nama_Gitar }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Stok</label>
                                        <input type="text" name="stok" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->Stok }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Jenis</label>
                                        <select class="form-select" name="jenis" value="{{ $tampil->id_Jenis }}">
                                            <option selected disabled>Pilih Jenis Gitar</option>
                                            @foreach ($JenisGitar as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
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
            @endforeach
        </tbody>
    </table>
@endsection

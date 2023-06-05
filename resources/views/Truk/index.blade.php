@extends('layout')

@section('content')
    <h1 class="h2">Truk</h1><br>
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

                <!-- Isi Modal -->
                <form action="{{ route('StoreTruk') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nopol</label>
                            <input type="text" name="nopol" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = N 6969 HH">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">ID Supir</label>
                            <select class="form-select" name="IDSupir" aria-label="Default select example">
                                <option selected disabled>Pilih ID Supir</option>
                                @foreach ($Supir as $item)
                                    <option value="{{ $item->id }}">{{ $item->Nama_Supir }}</option>
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
                <th scope="col">Nopol</th>
                <th scope="col">ID Supir</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($Truk as $tampil)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $tampil->Nopol_Truk }}</td>
                    <td>{{ $tampil->supir->Nama_Supir }}</td>
                    <td><a href="" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $tampil->id }}">edit</a><br><a
                            href="{{ route('DelTruk', ['id' => $tampil->id]) }}">hapus</a></td>
                </tr>
                <div class="modal fade" id="editModal{{ $tampil->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('UpdateTruk', ['id' => $tampil->id]) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <!-- Isi Modal -->
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nopol</label>
                                            <input type="text" class="form-control" name="nopol"
                                                value="{{ $tampil->Nopol_Truk }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">ID Supir</label>
                                            <select class="form-select" name="IDSupir" aria-label="Default select example">
                                                <option selected disabled>Pilih ID Supir</option>
                                                @foreach ($Supir as $item)
                                                    <option value="{{ $item->id }}">{{ $item->Nama_Supir }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
            @endforeach
        </tbody>
    </table>
@endsection

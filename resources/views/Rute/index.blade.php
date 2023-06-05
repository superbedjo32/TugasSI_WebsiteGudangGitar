@extends('layout')

@section('content')
    <h1 class="h2">Rute</h1><br>
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
                <form action="{{ route('Rute') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Isi Modal -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Gudang</label>
                                <select class="form-select" name="gudang" aria-label="Default select example">
                                    <option selected disabled>Pilih Gudang Tujuan</option>
                                    @foreach ($Gudang as $item)
                                        <option value="{{ $item->id }}">{{ $item->Nama_Gudang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Outlet Tujuan</label>
                                <select class="form-select" name="outlet" aria-label="Default select example">
                                    <option selected disabled>Pilih Outlet Tujuan</option>
                                    @foreach ($Outlet as $item)
                                        <option value="{{ $item->id }}">{{ $item->Nama_Outlet }}</option>
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
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gudang</th>
                <th scope="col">Outlet Tujuan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($Rute as $tampil)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $tampil->gudang->Nama_Gudang }}</td>
                    <td>{{ $tampil->outlet->Nama_Outlet }}</td>
                    <td><a href="" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $tampil->id }}">edit</a><br><a href="{{ route('DelRute',['id'=>$tampil->id]) }}">hapus</a></td>
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
                            <div class="modal-body">
                                <form action="{{ route('UpdateRute',['id'=>$tampil->id]) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <!-- Isi Modal -->
                                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Gudang</label>
                                <select class="form-select" name="gudang" aria-label="Default select example">
                                    <option selected disabled>Pilih Gudang Tujuan</option>
                                    @foreach ($Gudang as $item)
                                        <option value="{{ $item->id }}">{{ $item->Nama_Gudang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Outlet Tujuan</label>
                                <select class="form-select" name="outlet" aria-label="Default select example">
                                    <option selected disabled>Pilih Outlet Tujuan</option>
                                    @foreach ($Outlet as $item)
                                        <option value="{{ $item->id }}">{{ $item->Nama_Outlet }}</option>
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
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection

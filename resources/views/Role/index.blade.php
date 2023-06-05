@extends('layout')

@section('content')
    <h1 class="h2">Role</h1><br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
    </button>
    <button type="button" class="btn btn-danger mb-3 ">
        Print
    </button>
    <!-- Modal (dialog box ke database) -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('StoreRole') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Isi Modal -->
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Role</label>
                            <input type="text" name="role" class="form-control" id="exampleFormControlInput1"
                                placeholder="contoh = yakali perlu dicontohin">
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
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($Role as $tampil)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $tampil->role }}</td>
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
                            <form action="{{ route('UpdateRole', ['id' => $tampil->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="modal-body">
                                    <!-- Isi Modal -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Role</label>
                                        <input type="text" name="role" class="form-control"
                                            id="exampleFormControlInput1" value="{{ $tampil->role }}">
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

@extends('dashboard.layout.main')

@Section('tittle')
    <title> SISDA | dashboard Users </title>

@Section('container')


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Halaman Pengguna</h1>
    </div>
    <div class="table-responsive col-lg-11">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="/users/create" class="btn btn-primary mb-2"><span data-feather="user-plus"></span> Add New User</a>


        {{-- Table Users --}}
        <table class="table table-striped table-sm ms-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Role</th>
                    @can('Admin')
                        <th scope="col">Aksi</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->name }}</td>
                        <td>{{ $barang->status }}</td>
                        <td>{{ $barang->role->name }}</td>
                        @can('Admin')
                            <td>
                                <a href="/users/{{ $barang->id }}" class="badge bg-success border-0">
                                    <span data-feather="eye"></span></a>
                                <a href="/users/{{ $barang->id }}/edit" class="badge bg-warning border-0">
                                    <span data-feather="user-check"></span></a>

                                @can('SuperAdmin')
                                    <form action="/users/{{ $barang->id }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="badge bg-danger border-0" {{ $barang->role_id == 1 ? 'hidden' : '' }}
                                            onclick="return confirm('Yakin Ingin Menghapus Data? {{ $barang->nama }}')"><i
                                                data-feather="user-minus"></i></button>
                                    </form>
                                @endcan

                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- End Table Users --}}
    </div>
    {{ $users->links() }}

@endsection

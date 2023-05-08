@extends('dashboard.layout.main')

@Section('tittle')
    <title> Sisda | Category </title>

@Section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Halaman Categories</h1>
    </div>
    <div class="table-responsive col-lg-11 ms-4">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <a href="/categories/create" class="btn btn-primary mb-2"> Add New Category</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kode Inventaris</th>
                    @can('SuperAdmin')
                        <th scope="col">Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->name }}</td>
                        <td> {{ $barang->categoryCode }}</td>
                        <td>

                            <a href="/categories/{{ $barang->id }}/edit" class="badge bg-warning border-0 d-inline"><span
                                    data-feather="edit"></span></a>
                            @can('SuperAdmin')
                                <form action="/categories/{{ $barang->id }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Yakin Ingin Menghapus Data? {{ $barang->nama }}')"><i
                                            data-feather="trash-2"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}
@endsection

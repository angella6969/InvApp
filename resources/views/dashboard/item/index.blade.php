@extends('dashboard.layout.main')
@Section('tittle')
    <title>
        Sisda | Item </title>
@Section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Inventarisasi</h1>
    </div>
    <div class="table-responsive col-lg-11 ms-4">
        {{-- Alert Success --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert --}}

        {{-- Alert Fail --}}
        @if (session()->has('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert --}}

        {{-- Alert error --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{-- End Alert error --}}

        {{-- Button Create --}}
        <a href="/dashboard/item/create" class="btn btn-primary mb-2"><span data-feather="file-plus"> </span>Tambah
            Barang</a>
        {{-- End Button Create --}}

        {{-- Button Rent Item --}}
        <a href="/rent-item" class="btn btn-warning mb-2 ms-4"><i class="fa fa-tasks"></i> Peminjaman Barang </a>
        {{-- End Button Rent Item --}}

        {{-- Button Import --}}
        {{-- @can('SuperAdmin')
            <form action="/item/import" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">File Excel</label>
                    <input type="file" name="file" class="form-control" accept=".CSV">
                </div>
                <button type="submit" class="btn btn-primary">Upload Data</button>
            </form>
        @endcan --}}
        {{-- End Button Import --}}

        {{-- Form Pencarian --}}
        <form action="/dashboard/item">
            <div class="row">
                <div class="col-6 col-sm-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search By Item Name..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit" id="basic-addon2">Search</button>
                    </div>
                </div>
            </div>
        </form>
        {{-- End form Pencarian --}}


        {{-- Form Index --}}
        <div class="table-responsive-sm">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Total Unit </th>
                        <th scope="col">Tahun Pengadaan</th>
                        <th scope="col">Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($a as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                        width="100">
                                @endif
                            </td>
                            <td> {{ $item->name }}</td>
                            <td> {{ $item->total }}</td>
                            <td> {{ $item->brand }}</td>
                            <td>
                                <a href="/dashboard/item/detail/{{ $item->name }}/{{ $item->category_id }}"
                                    class="badge bg-success border-0 "><span data-feather="eye"></span></a>

                                {{-- <a href="/dashboard/item/update/{{ $item->name }}/{{ $item->category_id }}"
                                    class="badge bg-warning border-0 "><span data-feather="edit"></span></a> --}}

                                <form action="/dashboard/item/{{ $item->name }}/{{ $item->category_id }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Yakin Ingin Menghapus Data yang berhubungan dengan? {{ $item->name }}')"><span
                                            data-feather="file-minus"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- End Form Index --}}
    </div>

@endsection

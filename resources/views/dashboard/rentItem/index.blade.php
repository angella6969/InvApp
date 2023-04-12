@extends('dashboard.layout.main')
@Section('tittle')
    <title> Sisda | Rent Item </title>
@Section('container')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Rent Item</h1>
    </div>
    <div class="table-responsive col-lg-11">
        {{-- Alert Success --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}

        {{-- Alert Fail --}}
        @if (session()->has('Fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('Fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Fail --}}

        {{-- Form Pencarian --}}
        <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
            <form action="/rent-item" method="post">
                @csrf
                <div class="row">
                    {{-- Pencarian User --}}
                    <div class="mb-3">
                        <label for="">Peminjam</label>
                        <select name="user_id" id="user_id" class=" userBox form-control ">
                            <option selected>User</option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- End Pencarian User --}}

                    {{-- Pencarian Item --}}
                    <div>
                        <label for="">Barang</label>
                        <select name="item_id" id="item_id" class=" userBox form-control ">
                            <option selected>Item</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} <===> {{ $item->status }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- End Pencarian Item --}}

                    {{-- Button Rent --}}
                    <div class="mt-2 d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit" id="basic-addon2">Rent</button>
                    </div>
                    {{-- End Button Rend --}}

                </div>
            </form>

            {{-- End form Pencarian --}}

           

        </div>
        {{-- Form Index --}}

        
        <div class="ms-4">
            <label for="" class="mt-4">Item Rent log</label>
             {{-- Form Pencarian --}}
             <form action="/rent-item">
                <div class="row">
                    <div class="col-6 col-sm-8">
                        <div>
                            <select name="search" class=" userBox form-control ">
                                <option selected>Search User Rent</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary mt-2" type="submit" id="basic-addon2">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            {{-- End form Pencarian --}}
        </div>
        <div class="table-responsive-sm ms-4">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">User</th>
                        <th scope="col">Item</th>
                        <th scope="col">Rent Date </th>
                        <th scope="col">Return Date </th>
                        <th scope="col">Actual Return Date </th>
                        @can('SuperAdmin')
                            <th scope="col">Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $barang)
                        <tr
                            class="{{ $barang->actual_return_date == null
                                ? ''
                                : ($barang->return_date >= $barang->actual_return_date
                                    ? 'bg-success'
                                    : 'bg-secondary') }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->user->name }}</td>
                            <td>{{ $barang->item->name }}</td>
                            <td>{{ $barang->rent_date }}</td>
                            <td>{{ $barang->return_date }}</td>
                            <td>{{ $barang->actual_return_date }}</td>

                            <td>
                                @can('SuperAdmin')
                                    {{-- Button eye --}}
                                    <a href="/users/{{ $barang->user_id }}" class="badge bg-warning border-0 d-inline"><span
                                            data-feather="eye"></span></a>
                                    {{-- End Button Detail --}}

                                    {{-- Button Edit --}}
                                    {{-- <a href="/rent-item/{{ $barang->id }}/edit"
                                        class="badge bg-warning border-0 d-inline"><span data-feather="edit"></span></a> --}}
                                    {{-- End Button Edit --}}

                                    {{-- Button Hapus --}}
                                    {{-- <form action="/rent-item/{{ $barang->id }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Yakin Ingin Menghapus Data? {{ $barang->nama }}')"><span
                                                data-feather="file-minus"></span></button>
                                    </form> --}}
                                    {{-- End Button Hapus --}}
                                @endcan

                                {{-- Return Item --}}
                                <form action="/rent-item/return/{{ $barang->id }}" class="d-inline" method="POST">
                                    @csrf

                                    <button class="badge bg-success border-0"
                                        {{ $barang->actual_return_date != null ? 'hidden' : '' }}
                                        onclick="return confirm('Yakin Ingin Mengembalikan Item? {{ $barang->item->name }}')"><span
                                            data-feather="git-pull-request"></span></button>
                                </form>
                                {{-- End Return Item --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- End Form Index --}}
    </div>

    {{ $logs->links() }}

@endsection

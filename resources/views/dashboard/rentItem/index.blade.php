@extends('dashboard.layout.main')
@Section('tittle')
<title> Sisda | Rent Item </title>
@Section('container')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Rent Item</h1>
</div>
<div class="table-responsive col-lg-11">
    {{-- Alert --}}
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('Fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('Fail') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br />
    @endif
    {{-- End Alert --}}

    {{-- Button Create --}}
    {{-- <a href="/dashboard/item/create" class="btn btn-primary mb-2"><span data-feather="file-plus"> </span> New Item
    </a> --}}
    {{-- End Button Create --}}

    {{-- Button Rent Item --}}
    {{-- <a href="/dashboard/item/create" class="btn btn-primary mb-2"><i class="fa fa-tasks"></i> Rent Item </a> --}}
    {{-- End Button Rent Item --}}

    {{-- Form Pencarian --}}
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">


        <form action="/rent-item" method="post">
            @csrf
            <div class="row">
                <div>
                    <select name="user_id" id="user_id" class="mb-3 userBox form-select " placeholder="Category">
                        <option selected>User</option>
                        @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <select name="item_id" id="item_id" class="mb-3 userBox form-select " placeholder="Category">
                        <option selected>items</option>
                        @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} <==> {{ $item->status }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div>
                    <div class="input-group mb-3 mt-3">
                        <input type="text" class="form-control" placeholder="Search By Item Name..." name="search"
                            value="{{ request('search') }}">
                    </div>
                </div> --}}
                <div class="mt-3">

                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </div>
        </form>
    </div>
    {{-- End form Pencarian --}}

    {{-- Form Index --}}
    <label for="">Item Rent log</label>
    <x-rent  :logs='$logs'/>
    {{-- <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Meminjam </th>
                <th scope="col">Tgl Meminjam </th>
                <th scope="col">Tgl Kembali By System</th>
                <th scope="col">Tgl Dikembalikan</th>
                @can('SuperAdmin')
                <th scope="col">Action</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $barang)
            <tr
                class="{{ $barang->actual_return_date == null ? '' : ($barang->return_date <= $barang->actual_return_date ? 'bg-danger text-white' : 'bg-success text-white') }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barang->user->name}}</td>
                <td>{{ $barang->item->name}}</td>
                <td>{{ $barang->rent_date}}</td>
                <td>{{ $barang->return_date}}</td>
                <td>{{ $barang->actual_return_date}}</td>
                <td>
                    @can('SuperAdmin')
                    <a href="/dashboard/item/{{ $barang->id }}" class="badge bg-warning border-0 d-inline"><span
                            data-feather="eye"></span></a>

                    <a href="/dashboard/item/{{ $barang->id }}/edit" class="badge bg-warning border-0 d-inline"><span
                            data-feather="edit"></span></a>
                    <form action="/dashboard/item/{{ $barang->id }}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="badge bg-danger border-0"
                            onclick="return confirm('Yakin Ingin Menghapus Data? {{ $barang->nama }}')"><span
                                data-feather="file-minus"></span></button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}
    {{-- End Form Index --}}
</div>

{{ $logs->links() }}

@endsection
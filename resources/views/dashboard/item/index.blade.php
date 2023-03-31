@extends('dashboard.layout.main')
@Section('tittle')
    <title> Sisda | Item </title>
@Section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Inventarisasi</h1>
    </div>
    <div class="table-responsive col-lg-11">
        {{-- Alert --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert --}}

        {{-- Button Create --}}
        <a href="/dashboard/item/create" class="btn btn-primary mb-2"><span data-feather="file-plus"> </span> New Item </a>
        {{-- End Button Create --}}

        {{-- Form Pencarian --}}
        <form action="/dashboard/item">
            <div class="row">
                {{-- <div class="col-12 col-sm-6">
                    <select name="categories" id="categories" class="form-select" placeholder="Category">
                        <option value="">Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="col-12 col-sm-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{request('search')}}">
                        <button class="btn btn-primary" type="submit" id="basic-addon2">Search</button>
                    </div>
                </div>
            </div>
        </form>
        {{-- End form Pencarian --}}

        {{-- Form Index --}}
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Item Code</th>
                    <th scope="col">Status </th>
                    <th scope="col">owner </th>
                    <th scope="col">location </th>
                    <th scope="col">brand </th>
                    <th scope="col">category </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->name }}</td>
                        <td>{{ $barang->item_code }}</td>
                        <td>{{ $barang->status }}</td>
                        <td>{{ $barang->owner }}</td>
                        <td>{{ $barang->location }}</td>
                        <td>{{ $barang->brand }}</td>
                        <td>{{ $barang->Category->name }}</td>

                        <td>
                            {{-- <button class="badge bg-info border-0 d-inline" data-bs-toggle="modal" data-bs-target="#DetailModal"  --}}

                            {{-- ><span data-feather="eye"></span></button> --}}


                            <a href="/dashboard/item/{{ $barang->id }}/edit"
                                class="badge bg-warning border-0 d-inline"><span data-feather="edit"></span></a>
                            <form action="/dashboard/item/{{ $barang->id }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Yakin Ingin Menghapus Data? {{ $barang->nama }}')"><span
                                        data-feather="file-minus"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- End Form Index --}}
    </div>
    {{ $items->links() }}
@endsection

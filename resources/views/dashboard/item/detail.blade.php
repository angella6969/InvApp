@extends('dashboard.layout.main')
@Section('tittle')
    <title> Sisda | Item </title>
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

        {{-- Form Pencarian --}}
        {{-- <form action="/dashboard/item/detail">
            <div class="row">
                <label for="">Form Pencarian</label>
                <div class="col-6 col-sm-4">
                    <select name="categories" id="categories" class="form-select " placeholder="Category">
                        <option value="">Category</option>
                        <optgroup label="Komputer Unit/Jaringan">
                            @foreach ($categories as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Personal Komputer">
                            @foreach ($categories1 as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Peralatan Komputer Mainframe">
                            @foreach ($categories2 as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Peralatan Mini Komputer">
                            @foreach ($categories3 as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Peralatan Personal Komputer">
                            @foreach ($categories4 as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Peralatan Jaringan">
                            @foreach ($categories5 as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    </select>
                </div>


                <div class="col-6 col-sm-4">
                    <select name="status" id="status" class="form-select" placeholder="Category">
                        <option value="">Status</option>
                        <option value="rusak">Rusak</option>
                        <option value="hilang">Hilang</option>
                        <option value="terpinjam">Terpinjam</option>
                        <option value="in stock">In Stock</option>
                    </select>
                </div>

                <div class="col-6 col-sm-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search By Item Name..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit" id="basic-addon2">Search</button>
                    </div>
                </div>
            </div>
        </form> --}}
        {{-- End form Pencarian --}}

        {{-- Form Index --}}
        <div class="table-responsive-sm">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kode Kategori </th>
                        <th scope="col">Status </th>
                        <th scope="col">Kategori </th>
                        @can('SuperAdmin')
                            <th scope="col">Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $barang)
                        <tr
                            class="{{ $barang->status == 'in stock'
                                ? ''
                                : ($barang->status == 'Terpinjam'
                                    ? 'bg-success'
                                    : ($barang->status == 'rusak'
                                        ? 'bg-warning'
                                        : 'bg-danger')) }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->name }}</td>
                            <td>{{ $barang->item_code }}</td>
                            <td>{{ $barang->status }}</td>
                            <td>{{ $barang->category->name }}</td>

                            <td>
                                <a href="/dashboard/item/{{ $barang->id }}" class="badge bg-success border-0 "><span
                                        data-feather="eye"></span></a>

                                <a href="/dashboard/item/{{ $barang->id }}/edit" class="badge bg-warning border-0 "><span
                                        data-feather="edit"></span></a>
                                @can('SuperAdmin')
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
            </table>
        </div>
        {{-- End Form Index --}}
    </div>
    {{-- {{ $items->links() }} --}}

@endsection

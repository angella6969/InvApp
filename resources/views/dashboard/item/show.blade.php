@extends('dashboard.layout.main')

@Section('tittle')

    <title> Sisda | Detail Item </title>

@Section('container')

    <div class="mt-5">
        <div class="row" style="display: block;">
            <div class="table table-striped table-sm">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Barang : {{ $item->name }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div style="width:300px; height:200px; overflow: hidden;"
                                        class="d-flex justify-content-center">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Nama</td>
                                                <td> : </td>
                                                <td>{{ $item->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kode Barang</td>
                                                <td> : </td>
                                                <td>{{ $item->item_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tahun Pengadaan </td>
                                                <td> : </td>
                                                <td>{{ $item->brand }}</td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi</td>
                                                <td> : </td>
                                                <td>{{ $item->location }}</td>
                                            </tr>
                                            <tr>
                                                <td>Sumber Dana</td>
                                                <td> : </td>
                                                <td>{{ $item->owner }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td> : </td>
                                                <td>{{ $item->status }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kategori</td>
                                                <td> : </td>
                                                <td>{{ $item->category->name }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Index --}}

    <div class="x_content">
        <h1> Daftar Barang</h1>
        <table class="table table-striped table-sm mt-2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kode Kategori</th>
                    <th scope="col">Status </th>
                    <th scope="col">category </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $barang)
                    <tr   class="{{ $barang->status == 'in stock'
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
                            <a href="/dashboard/item/{{ $barang->id }}" class="badge bg-warning border-0 d-inline"><span
                                    data-feather="eye"></span></a>

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
    </div>
    {{-- End Form Index --}}
    {{ $items->links() }}
@endsection

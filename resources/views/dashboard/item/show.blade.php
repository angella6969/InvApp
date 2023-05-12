@extends('dashboard.layout.main')

@Section('tittle')

    <title> Sisda | Detail Item </title>

@Section('container')

    <div class="mt-5">
        <div class="row" style="display: block;">
            <div class="table table-striped table-sm">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Item : {{ $item->name }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div style="max-height: 350px; overflow: hidden; " class="d-flex justify-content-center">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="">
                      </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No ID</th>
                                        <th>Name</th>
                                        <th>Item Code</th>
                                        <th>Brand</th>
                                        <th>location</th>
                                        <th>owner</th>
                                        <th>status</th>
                                        <th>category</th>
                                        <th> Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->item_code }}</td>
                                        <td>{{ $item->brand }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>{{ $item->owner }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Index --}}
        <div class="x_content">
            <table class="table table-striped table-sm mt-5">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        {{-- <th scope="col">Item Code</th> --}}
                        <th scope="col">Status </th>
                        {{-- <th scope="col">owner </th>
          <th scope="col">location </th>
          <th scope="col">brand </th> --}}
                        <th scope="col">category </th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->name }}</td>
                            {{-- <td>{{ $barang->item_code }}</td> --}}
                            <td>{{ $barang->status }}</td>
                            {{-- <td>{{ $barang->owner }}</td>
          <td>{{ $barang->location }}</td>
          <td>{{ $barang->brand }}</td> --}}
                            <td>{{ $barang->category->name }}</td>

                            <td>
                                {{-- <button class="badge bg-info border-0 d-inline" data-bs-toggle="modal" data-bs-target="#DetailModal"
              --}} {{-- ><span data-feather="eye"></span></button> --}}

                                <a href="/dashboard/item/{{ $barang->id }}"
                                    class="badge bg-warning border-0 d-inline"><span data-feather="eye"></span></a>

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

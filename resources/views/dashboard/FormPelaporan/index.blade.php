@extends('dashboard.layout.main')
@Section('tittle')
    <title> Sisda | Item </title>
@Section('container')

    <div class="row justify-conten-center">
        <div class="col-md-12">
            <div class="card mt-2">
                <h5> Laporan</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row justify-content-end gx-2">



                                {{--  --}}
                                <form action="/dashboard/formlaporan">
                                    <div class="row">

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">From<span
                                                    class="required">*</span></label>
                                            <div class="col-md-3 col-sm-12">
                                                <input class="form-control" class='date' type="date" name="from_date"
                                                    value="{{ request('from_date') }}" required='required'>
                                            </div>

                                            <label class="col-form-label col-md-3 col-sm-3  label-align">To<span
                                                    class="required">*</span></label>
                                            <div class="col-md-3 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="to_date"
                                                    required='required' value="{{ request('to_date') }}">
                                            </div>
                                            
                                            <div class="col-6 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        placeholder="Search By Item Name..." name="search"
                                                        value="{{ request('search') }}">
                                                    <button class="btn btn-primary" type="submit"
                                                        id="basic-addon2">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>

                                {{--  --}}
                            </div>

                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Status </th>
                                        <th scope="col">category </th>
                                        <th scope="col">tanggal</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $barang)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barang->name }}</td>
                                            <td>{{ $barang->status }}</td>
                                            <td>{{ $barang->category->name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($barang->created_at)) }}</td>

                                            <td>
                                                {{-- <button class="badge bg-info border-0 d-inline" data-bs-toggle="modal"
                                                data-bs-target="#DetailModal" --}} {{-- ><span data-feather="eye"></span></button> --}}

                                                @can('SuperAdmin')
                                                    <a href="/dashboard/item/{{ $barang->id }}"
                                                        class="badge bg-warning border-0 d-inline"><span
                                                            data-feather="eye"></span></a>

                                                    <a href="/dashboard/item/{{ $barang->id }}/edit"
                                                        class="badge bg-warning border-0 d-inline"><span
                                                            data-feather="edit"></span></a>
                                                    <form action="/dashboard/item/{{ $barang->id }}" class="d-inline"
                                                        method="POST">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

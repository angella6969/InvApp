
@extends('dashboard.layout.main')

@Section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Inventarisasi</h1>
</div>
<div class="table-responsive col-lg-11">

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <a href="/dashboard/item/create" class="btn btn-primary mb-2"><span data-feather="file-plus">  </span> New Item </a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        {{-- <th scope="col">Kode</th> --}}
        <th scope="col">Item Code</th>
        <th scope="col">Status </th>
        <th scope="col">owner </th>
        <th scope="col">location </th>
        <th scope="col">brand </th>
        <th scope="col">category </th>
        <th scope="col">Action</th>
        {{-- <th scope="col">jumlah</th> --}}
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $barang)
          
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td >{{ $barang->name }}</td>
        <td >{{ $barang->item_code }}</td>
        <td >{{ $barang->status }}</td>
        <td >{{ $barang->owner }}</td>
        <td >{{ $barang->location }}</td>
        <td >{{ $barang->brand }}</td>
        <td >{{ $barang->Category->name}}</td>
        {{-- <td class="text-center">{{ $barang->status->status }}</td> --}}
        {{-- <td >{{ $barang->kepemilikan }}</td> --}}
        {{-- <td class="text-center">{{ $barang->jumlah }}</td> --}}

        <td> 
          {{-- <button class="badge bg-info border-0 d-inline" data-bs-toggle="modal" data-bs-target="#exampleModal" ><span data-feather="eye"></span></button> --}}
      
          
          <a href="/dashboard/item/{{ $barang->id }}/edit" class="badge bg-warning border-0 d-inline"><span data-feather="edit"></span></a>
          <form action="/dashboard/item/{{ $barang->id }}" class="d-inline" method="POST">
            @csrf
            @method('DELETE')
            <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Menghapus Data? {{ $barang->nama }}')"><span data-feather="file-minus"></span></button>
          </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{ $items->links() }}

@endsection
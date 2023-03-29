
@extends('dashboard.layout.main')

@Section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Halaman Categories</h1>
</div>
<div class="table-responsive col-lg-11">

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <a href="/users/create" class="btn btn-primary mb-2"> Add Akun</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Status</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $barang)
          
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td >{{ $barang->name }}</td>
        <td >{{ $barang->status }}</td>
        <td >{{ $barang->role->name }}</td>

        <td> 
          <button class="badge bg-info border-0 d-inline" data-bs-toggle="modal" data-bs-target="#exampleModal" ><span data-feather="eye"></span></button>    
          <a href="/users/{{ $barang->id }}/edit" class="badge bg-warning border-0 d-inline"><span data-feather="edit"></span>Activated Akun</a>
          <form action="/users/{{ $barang->id }}" class="d-inline" method="POST">
            @csrf
            @method('DELETE')
            <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Menghapus Data? {{ $barang->nama }}')"><i data-feather="trash-2"></i></button>
          </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{ $users->links() }}

@endsection
@extends('dashboard.layout.main')

@Section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Category Create</h1>
  </div>
<div class="col-lg-8">
  
    <form method="post" action="/dashboard/role">
        @csrf
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="mb-2">
          <label for="nama" class="form-label ">Role Name</label>
          <input placeholder="Category Name" type="text" name='name' class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ old('name') }}" >
          @error('name')
              <div class="invalit-feedback">
                {{ $message }}
              </div>
              @enderror
        </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
@extends('dashboard.layout.main')

@Section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create</h1>
  </div>
<div class="col-lg-8">
  
    <form method="post" action="/dashboard/inventarisasi">
        @csrf

        <div class="mb-2">
          {{-- <label for="nama" class="form-label ">nama Item</label> --}}
          <input placeholder="Nama Barang" type="text" name='nama' class="form-control @error('nama') is-invalid @enderror" id="nama" required value="{{ old('nama') }}" >
          @error('nama')
              <div class="invalit-feedback">
                {{ $message }}
              </div>
              @enderror
        </div>
        

      <div class="mb-2">
        {{-- <label for="kode_barang" class="form-label ">kode Item</label> --}}
        <input placeholder="kode Barang" type="text" name='kode_barang' class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang " required value="{{ old('kode_barang') }}" >
        @error('kode_barang')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
      </div>

      <div class="mb-2">
        {{-- <label for="jenis_barang" class="form-label ">Jenis Item</label> --}}
        {{-- <input placeholder="jenis Barang" type="text"name='jenis_barang'  class="form-control @error('jenis_barang') is-invalid @enderror" id="jenis_barang" required value="{{ old('jenis_barang') }}" > --}}
        <select class="form-select" name= kategori_id>
        @foreach ($kategoris as $item)
        @if(old('kategori_id') == $item->id)
          <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
          @else
          <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endif
        @endforeach
        
        </select>
        @error('jenis_barang')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
      </div>
      <div class="mb-2">
        {{-- <label for="status" class="form-label ">Status Item</label> --}}
        <input placeholder="status Barang" type="text" name='status' class="form-control @error('status') is-invalid @enderror" id="status" required value="{{ old('status') }}" >
        @error('status')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
      </div>
      <div class="mb-2">
        {{-- <label for="kepemilikan" class="form-label ">kepemilikan Item</label> --}}
        <input placeholder="kepemilikan Barang" type="text" name='kepemilikan' class="form-control @error('kepemilikan') is-invalid @enderror" id="kepemilikan" required value="{{ old('kepemilikan') }}" >
        @error('kepemilikan')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
      </div>
      <div class="mb-2">
        {{-- <label for="jumlah" class="form-label ">jumlah Item</label> --}}
        <input placeholder="jumlah Barang" type="text" name='jumlah' class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" required value="{{ old('jumlah') }}" >
        @error('jumlah')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
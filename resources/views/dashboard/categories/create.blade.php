@extends('dashboard.layout.main')

@Section('tittle')
    <title> Sisda | Tambah Kategori </title>

@Section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kategori</h1>
    </div>
    <div class="col-lg-8">

        <form method="post" action="/categories">
            @csrf
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="mb-2">
                <label for="nama" class="form-label ">Nama Kategori</label>
                <input placeholder="Category Name" type="text" name='name'
                    class="form-control @error('name') is-invalid @enderror" id="name" required
                    value="{{ old('name') }}">
                @error('name')
                    <div class="invalit-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">
                <label for="">Set Kode Kategori</label>
                <div class="col-6 col-sm-4">
                    <select name="golongan" id="golongan" class="form-select ">
                        <option value="">Golongan</option>
                        <option value="02.06.03">Elektronik</option>
                        <option value="01.06.02">Non-Elektronik</option>
                    </select>
                    @error('golongan')
                    <div class="invalit-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="col-6 col-sm-4">
                    <select name="unit" id="unit" class="form-select">
                        <option value="">unit</option>
                        <option value="01">Komputer Unit/Jaringan</option>
                        <option value="02">Personal Komputer</option>
                        <option value="03">Peralatan Komputer Minframe</option>
                        <option value="04">Peralatan Mini Komputer</option>
                        <option value="05">Peralatan Personal Komputer</option>
                        <option value="06">Peralatan Jaringan</option>
                    </select>
                    @error('unit')
                    <div class="invalit-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="col-6 col-sm-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="kode">
                    </div>
                    @error('kode')
                        <div class="invalit-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- End form Pencarian --}}




            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

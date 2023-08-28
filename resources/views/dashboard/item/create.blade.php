@extends('dashboard.layout.main')

@Section('tittle')

    <title> Sisda | Create Item </title>

@Section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penambahan Barang</h1>
    </div>
    {{-- Body --}}
    <div class="col-lg-8 ms-4">

        {{-- Field Create --}}

        <form method="post" action="/dashboard/item" enctype="multipart/form-data">
            @csrf

            {{-- Field Item Category --}}
            <div class="mb-2">
                <label class="form-label ">Kategori Barang</label>
                <select class="form-select userbox" name="category_id">
                    <option value="">Category</option> 
                    @if (count($categories) > 0)
                        <optgroup label="Komputer Unit/Jaringan">
                            @foreach ($categories as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endif
                    @if (count($categories1) > 0)
                        <optgroup label="Personal Komputer">
                            @foreach ($categories1 as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endif
                    @if (count($categories2) > 0)
                        <optgroup label="Peralatan Komputer Mainframe">
                            @foreach ($categories2 as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endif
                    @if (count($categories3) > 0)
                        <optgroup label="Peralatan Mini Komputer">
                            @foreach ($categories3 as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endif
                    @if (count($categories4) > 0)
                        <optgroup label="Peralatan Personal Komputer">
                            @foreach ($categories4 as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endif
                    @if (count($categories5) > 0)
                        <optgroup label="Peralatan Jaringan">
                            @foreach ($categories5 as $item)
                                @if (old('category_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endif

                </select>
                @error('category_id')
                <div class="invalit-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            {{-- End Field Item Category --}}

            {{-- Field Item Name --}}
            <div class="mb-2">
                <label for="name" class="form-label ">Nama Barang</label>
                <input placeholder="Nama Barang" type="text" name='name'
                    class="form-control @error('name') is-invalid @enderror" id="name" required
                    value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- End Field Item Name --}}

            {{-- Field Tahun Pengadaan --}}
            <div class="mb-2">
                <label for="brand" class="form-label ">Tahun Pengadaan</label>
                <input placeholder="Hanya Angka Saja" name='brand' type="text"
                    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                    class="form-control @error('brand') is-invalid @enderror" id="brand" required
                    value="{{ old('brand') }}">
                @error('brand')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- End Tahun Pengadaan --}}

            {{-- Field Unit --}}
            <div class="mb-2">
                <label for="unit" class="form-label ">Unit</label>
                <input placeholder="Hanya Angka Saja" name='unit' type="text"
                    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                    class="form-control @error('unit') is-invalid @enderror" id="unit" required
                    value="{{ old('unit') }}">
                @error('unit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- End Unit --}}

            {{-- Field Item Location --}}
            <div class="mb-2">
                <label for="location" class="form-label ">Lokasi Barang/ Keterangan</label>
                <input placeholder="Keterangan Lokasi" type="text" name='location'
                    class="form-control @error('location') is-invalid @enderror" id="location" required
                    value="{{ old('location') }}">
                @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- End Field Item Location --}}

            {{-- Field Item Owner --}}
            <div class="mb-2">
                <label for="owner" class="form-label ">Sumber Dana</label>
                <input placeholder="Sumber Pendanaan Barang" type="text" name='owner'
                    class="form-control @error('owner') is-invalid @enderror" id="owner" required
                    value="{{ old('owner') }}">
                @error('owner')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- End Field Item Owner --}}

            {{-- Field Foto --}}
            <div class="mt-3 mb-3">
                <label for="image">Foto Barang</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    onchange="previewImage()" name="image">
                <h6>Photo Max 1 MB</h6>

                @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Field Foto --}}

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        {{-- End Field Create --}}

    </div>
    {{-- End Body --}}


    <script>
        function showDropdowns() {
            var select1 = document.getElementById("golongan");
            var select2 = document.getElementById("unit1");
            var select3 = document.getElementById("unit2");

            // Tampilkan dropdown kedua jika opsi pertama dipilih
            if (select1.value == "1") {
                select2.style.display = "block";
                select3.style.display = "none";
            }

            // Tampilkan dropdown ketiga jika opsi kedua dipilih
            else if (select1.value == "2") {
                select2.style.display = "none";
                select3.style.display = "block";

            }
        }

        function previewImage() {

            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();

            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection

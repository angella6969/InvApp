@extends('dashboard.layout.main')

@Section('tittle')

<title> Sisda | Create Item </title>

@Section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create</h1>
</div>
<div class="col-lg-8">

    {{-- Field Create --}}

    <form method="post" action="/dashboard/item">
        @csrf

        {{-- Field Item Name --}}
        <div class="mb-2">
            <label for="name" class="form-label ">name Item</label>
            <input placeholder="Item Name" type="text" name='name'
                class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ old('name') }}">
            @error('name')
            <div class="invalit-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- End Field Item Name --}}

        {{-- Field Item Brand --}}
        <div class="mb-2">
            <label for="brand" class="form-label ">brand Item</label>
            <input placeholder="Item brand" type="text" name='brand'
                class="form-control @error('brand') is-invalid @enderror" id="brand" required
                value="{{ old('brand') }}">
            @error('brand')
            <div class="invalit-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- End Field Item Brand --}}

        {{-- Field Item Location --}}
        <div class="mb-2">
            <label for="location" class="form-label ">location Item</label>
            <input placeholder="Item location" type="text" name='location'
                class="form-control @error('location') is-invalid @enderror" id="location" required
                value="{{ old('location') }}">
            @error('location')
            <div class="invalit-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- End Field Item Location --}}

        {{-- Field Item Owner --}}
        <div class="mb-2">
            <label for="owner" class="form-label ">owner Item</label>
            <input placeholder="Item owner" type="text" name='owner'
                class="form-control @error('owner') is-invalid @enderror" id="owner" required
                value="{{ old('owner') }}">
            @error('owner')
            <div class="invalit-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- End Field Item Owner --}}

        {{-- Field Item Item Code --}}
        <div class="mb-2">
            <label for="Item Code" class="form-label ">kode Item</label>
            <input placeholder="Item Code" type="text" name='item_code'
                class="form-control @error('item_code') is-invalid @enderror" id="item_code " required
                value="{{ old('item_code') }}">
            @error('item_code')
            <div class="invalit-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- End Field Item Code --}}

        {{-- Field Item Category --}}
        <div class="mb-2">
            <label for="Item Code" class="form-label ">Category Item</label>
            <select class="form-select" name=category_id>

                @foreach ($categories as $item)

                @if (old('category_id') == $item->id)
                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                @else
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endif

                @endforeach

            </select>
            @error('category_id')
            <div class="invalit-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- End Field Item Category --}}

        {{-- End Field Create --}}


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
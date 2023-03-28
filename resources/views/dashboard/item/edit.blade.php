@extends('dashboard.layout.main')

@Section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create</h1>
  </div>
<div class="col-lg-8">
  
    <form method="post" action="/dashboard/item/{{ $items->id }}">
      @method('put')
        @csrf

        <div class="mb-2">
          <label for="name" class="form-label ">name Item</label>
          <input placeholder="Item Name" type="text" name='name' class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ old('name',$items->name)}}" >
          @error('name')
              <div class="invalit-feedback">
                {{ $message }}
              </div>
              @enderror
        </div>
        <div class="mb-2">
          <label for="status" class="form-label ">Status Item</label>
          <input placeholder="status Item" type="text" name='status' class="form-control @error('status') is-invalid @enderror" id="status" required value="{{ old('status',$items->status)}}" >
          @error('status')
              <div class="invalit-feedback">
                {{ $message }}
              </div>
              @enderror
        </div>
        

      <div class="mb-2">
        <label for="Item Code" class="form-label ">kode Item</label>
        <input placeholder="Item Code" type="text" name='item_code' class="form-control @error('item_code') is-invalid @enderror" id="item_code " required value="{{ old('item_code',$items->name)}}" >
        @error('item_code')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
      </div>

      <div class="mb-2">
        <label for="Item Code" class="form-label ">Category Item</label>
           <select class="form-select" name=category_id id=category_id>

        @foreach ($categories as $item)
        @if(old('category_id',$items->id ) == $item->id)
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
      
      
     
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
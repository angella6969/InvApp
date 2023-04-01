@extends('dashboard.layout.main')

@Section('tittle')

<title> Sisda | Edit Item </title>

@Section('container')
{{ $items}}
<h1> ini adalah {{ $items->name}}</h1>
<h1> dengan code item{{ $items->item_code}}</h1>
<h1> dengan brand{{ $items->brand}}</h1>
<h1> dengan category{{ $items->category->name}}</h1>
{{-- @foreach ($items as $barang)
<h1> ini adalah {{ $barang->name}}</h1>
<h1> dengan code item{{ $barang->item_code}}</h1>
<h1> dengan brand{{ $barang->brand}}</h1>
<h1> dengan category{{ $barang->category->name}}</h1>
{{-- {{ $barang->item_code}}
{{ $barang->brand}}s
{{ $barang->category}} --}}
{{-- @endforeach --}}
@endsection
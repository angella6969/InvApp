
@extends('dashboard.layout.main')

@Section('container')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Wellcame Back, {{ auth()->user()->name }} </h1>
  </div>

    <div class="container">
        <div class="row">
            <x-wrap text="Total Category" text1="{{ $categories }}" url="/categories"/>
            <x-wrap text="Total Users" text1="{{ $users }}" url="/users"/>
            <x-wrap text="Total Items" text1="{{ $items }}" url="/dashboard/item"/>
            <x-wrap text="Total Roles" text1="{{ $roles }}" url="/dashboard/role"/>
        </div>
    </div>        
@endsection
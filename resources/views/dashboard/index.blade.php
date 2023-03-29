
@extends('dashboard.layout.main')

@Section('container')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Wellcame Back, {{ auth()->user()->name }} </h1>
  </div>
 
    <div class="container">
        <div class="row">
            <x-wrap text="Total Category" text1="{{ $categories }}" url="/categories" text2="card bg-success text-white"/>
            <x-wrap text="Total Users" text1="{{ $users }}" url="/users" text2="card bg-info text-dark"/>
            <x-wrap text="Total Items" text1="{{ $items }}" url="/dashboard/item" text2="card bg-danger text-dark"/>
            <x-wrap text="Total Roles" text1="{{ $roles }}" url="/dashboard/role" text2="card bg-warning text-dark"/>
        </div>
       
    </div>        
@endsection
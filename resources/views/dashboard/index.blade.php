
@extends('dashboard.layout.main')

@Section('container')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Wellcame Back, {{ auth()->user()->name }} </h1>
  </div>
 
    <div class="container">
        <div class="row">
            <x-wrap text="Total Category" text1="{{ $categories }}" url="/categories" text2="card bg-success text-white  h-100" text3=""/>
            <x-wrap text="Total Users" text1="{{ $users }}" url="/users" text2="card bg-info text-white h-100" text3=""/>
            {{-- <x-wrap text="Total Items" text1="{{ $items }}" url="/dashboard/item" text2="card bg-danger text-white  h-100" text3=""/> --}}
            <x-wrap text="Total Roles" text1="{{ $roles }}" url="/dashboard/role" text2="card bg-warning text-white  h-100" text3=""/>
            


          <div class="col-xl-3 col-md-6 mb-2">
              <div class="card bg-danger text-white  h-100">
                  <div class="card-body">Total Item 
                    <h3>{{ $items }}</h3> 
                    <table class="table text-white">
                      <thead>
                        <tr>
                          <th scope="col">Lost</th>
                          <th scope="col">Broken</th>
                          <th scope="col">Rent</th>
                          <th scope="col">stored</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>{{ $items1 }}</th>
                          <th>{{ $items2 }}</th>
                          <th>{{ $items3 }}</th>
                          <th>{{ $items4 }}</th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                      <a href="/dashboard/item" class="small text-white stretched-link"> Views Detail </a>
                      <div class="small text-white"><i class="fas fa-angel-right"></i></div>
                  </div>
              </div>
          </div>




            
        </div>
       
    </div>        
@endsection
@extends('dashboard.layout.main')

@Section('tittle')
    <title> | dashboard 12 </title>
@Section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">Wellcame Back,{{ auth()->user()->role->name }} : {{ auth()->user()->name }} </h1>
    </div>
    <div class="container">
        <div class="row">

            {{-- View Table User --}}
            <div class="col-xl-4 col-md-6 mb-2">
                <div class="card bg-info text-white  h-100">
                    <div class="card-body">
                        <h2>Total Users</h2>
                        <h3>{{ $users->count() }}</h3>
                        <div class="table-responsive">
                            <table class="table text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">Super Admin</th>
                                        <th scope="col">Admin</th>
                                        <th scope="col">Clien</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>{{ $users->where('role_id', '1')->count() }}</th>
                                        <th>{{ $users->where('role_id', '2')->count() }}</th>
                                        <th>{{ $users->where('role_id', '3')->count() }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="/users" class="small text-white stretched-link"> Views Detail </a>
                        <div class="small text-white"><i class="fas fa-angel-right"></i></div>
                    </div>
                </div>
            </div>
            {{-- End View Table User --}}

            {{-- View Table Category --}}
            <div class="col-xl-4 col-md-6 mb-2">
                <div class="card bg-success text-white  h-100">
                    <div class="card-body">
                        <h2>Total Category</h2>
                        <h3>{{ $categories->count() }}</h3>
                        <div class="table-responsive">
                            <table class="table text-white  table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Non Elektronik</th>
                                        <th scope="col">Elektronik</th>
                                        <th scope="col">Software</th>
                                        <th scope="col">Hardware</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col">{{ $items->where('category_id', '1')->count() }}</th>
                                        <th scope="col">{{ $items->where('category_id', '2')->count() }}</th>
                                        <th scope="col">{{ $items->where('category_id', '3')->count() }}</th>
                                        <th scope="col">{{ $items->where('category_id', '4')->count() }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="/categories" class="small text-white stretched-link"> Views Detail </a>
                        <div class="small text-white"><i class="fas fa-angel-right"></i></div>
                    </div>
                </div>
            </div>
            {{-- End View Table Category --}}

            {{-- View Table Items --}}
            <div class="col-xl-4 col-md-6 mb-2">
                <div class="card bg-danger text-white  h-100">
                    <div class="card-body">
                        <h2>Total Item</h2>
                        <h3>{{ $items->count() }}</h3>
                        <div class="table-responsive">
                            <table class="table text-white table-sm fs-6">
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
                                        <th scope="col">{{ $items->where('status', 'hilang')->count() }}</th>
                                        <th scope="col">{{ $items->where('status', 'rusak')->count() }}</th>
                                        <th scope="col">{{ $items->where('status', 'terpinjam')->count() }}</th>
                                        <th scope="col">{{ $items->where('status', 'in stock')->count() }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="/dashboard/item" class="small text-white stretched-link"> Views Detail </a>
                        <div class="small text-white"><i class="fas fa-angel-right"></i></div>
                    </div>
                </div>
            </div>
            {{-- End View Table Items --}}
        </div>
    </div>
@endsection

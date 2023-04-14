@extends('dashboard.layout.main')

@Section('tittle')
    <title> SISDA | Dashboard Users </title>

@Section('container')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    {{-- Profile --}}
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img " width="200"
                                    src="{{ asset('storage/images/LOGO%20SISDA.png') }}" alt="LOGO%20SISDA.png">
                            </div>

                            <h3 class="profile-username text-center">{{ $users->name }}</h3>

                            <p class="text-muted text-center">{{ $users->username }}</p>
                        </div>
                    </div>
                    {{-- End Profile --}}

                    {{-- About Me --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                            <p class="text-muted"> {{ $users->address }} </p>
                            <hr>
                            <strong><i class="fa fa-envelope-square mr-1"></i> Email</strong>
                            <p class="text-muted">{{ $users->email }}</p>
                            <hr>
                            <strong><i class="fa fa-mobile-phone mr-1"></i> Phone</strong>
                            <p class="text-muted">{{ $users->phone }}</p>
                            <hr>
                        </div>
                    </div>
                    {{-- End About Me --}}

                </div>
                {{-- Log Peminjaman --}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <h1> Log Peminjaman</h1>
                                    <div class="table-responsive-sm">
                                        <x-rent :logs='$logs' />
                                        {{ $logs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Log Peminjaman --}}
            </div>
        </div>
    </section>

@endsection

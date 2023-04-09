@extends('dashboard.layout.main')

@Section('tittle')
<title> SISDA | dashboard Users </title>

@Section('container')

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img " width="200" src="{{ asset('storage/images/LOGO%20SISDA.png') }}"
                      alt="LOGO%20SISDA.png">
                  </div>

                  <h3 class="profile-username text-center">{{ $users->name }}</h3>

                  <p class="text-muted text-center">{{ $users->username }}</p>

                  {{-- <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Followers</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                  </ul>

                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                </div>
              </div>

          
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">About Me</h3>
                </div>
                <div class="card-body">
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                  <p class="text-muted">
                    {{ $users->address }}
                  </p>

                  <hr>

                  <strong><i class="fa fa-envelope-square mr-1"></i> Email</strong>

                  <p class="text-muted">{{ $users->email }}</p>

                  <hr>

                  <strong><i class="fa fa-mobile-phone mr-1"></i> Phone</strong>

                  <p class="text-muted">{{ $users->phone }}</p>

                  <hr>

                  {{-- <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                  <p class="text-muted">
                    <span class="tag tag-danger">UI Design</span>
                    <span class="tag tag-success">Coding</span>
                    <span class="tag tag-info">Javascript</span>
                    <span class="tag tag-warning">PHP</span>
                    <span class="tag tag-primary">Node.js</span>
                  </p> --}}

                  <hr >

                  {{-- <strong><i class="far fa-file-alt mr-1"></i> Notes</strong> --}}

                  {{-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum
                    enim
                    neque.</p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card">
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <h1> Log Peminjaman</h1>
                      <x-rent :logs='$logs' />
                      {{ $logs->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

  @endsection
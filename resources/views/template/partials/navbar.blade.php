<nav class="navbar navbar-expand-lg  bg-primary  navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Sisda</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        {{-- <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/about">inventaris</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/blog">blog</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/categories">categories</a>
          </li>
        </ul> --}}

        
        
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" arial-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-wtf"></i> My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"> <i class="bi bi-box-arrow-right"></i> 
                    logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="#" class="nav-link" > <i class="bi bi-map"></i>  WebGis</a>
          </li>
          <li class="nav-item">
            <a href="/login" class="nav-link" > <i class="bi bi-box-arrow-in-right"></i>  login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
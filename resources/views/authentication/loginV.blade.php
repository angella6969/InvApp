@extends('template.layout.loginLayout')

@section('container')

<div class="login_wrapper">
  <div class="container">
    <div class="row">

      {{-- Alert --}}
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
      </div>
      @endif
    
      @if(session()->has('loginError'))
    
      <div class="alert alert-danger d-flex justify-content-center" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <br/>
      @endif
      {{-- End Aler --}}
      
    </div>
  </div>


  <div class="animate form login_form">
    <section class="login_content">
      <form action="/login" method="post">
        @csrf
        <h1>Login Form</h1>
        <div class="form-floating">
          <input type="email" name='email' class="form-control @error('email') is-invalid @enderror " id="email"
            placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          <label for="floatingInput">Email address</label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div>
          <input type="password" name='password' class="form-control @error('password') is-invalid @enderror "
            id=" password" placeholder="Password" required>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div>

      </form>
      <button class="w-100 btn btn-lg btn-light" type="submit">Login</button>


      {{-- Footer --}}
      <div class="separator">
        <small class="d-block text-center">Not Registered? <a href="/registrasi"> Registrasi Now</a>
        </small>

        <div class="clearfix"></div>
        <br /><br />

        <div>
          <a class="btn btn-light" href="#">
            <h1><i class="fa fa-paw"></i> S . I . S . D . A</h1>
          </a>
          <p>Sistem Informasi Sumber Daya Air</p>
          <p>BBWS Serayu Opak</p>
        </div>
      </div>
      {{-- End Footer --}}





  </div>
  </form>
  </section>
</div>
@endsection
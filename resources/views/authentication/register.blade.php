@extends('template.layout.loginLayout')

@section('container')

<div class="row justify-content-center align-items-center">
  <div class="col-lg-5">
    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
      <form action="/registrasi" method="post">
        @csrf
        {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <div class="form-floating mb-1">
            <input type="text" name='name' class="form-control rounded-top @error('name') is-invalid @enderror " id="name" placeholder="name" required value="{{ old('name') }}" >
            <label for="name">name</label>
            @error('name')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-floating mb-1">
            <input type="text" name='username' class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}"  >
            <label for="username">username</label>
            @error('username')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>



        <div class="form-floating mb-1">
          <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="email" required value="{{ old('email') }}" >
          <label for="floatingInput">Email address</label>
          @error('email')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-1">
          <input type="text" name='role_id' class="form-control @error('role_id') is-invalid @enderror" id="floatingInput" placeholder="role_id" required value="{{ old('role_id') }}" >
          <label for="floatingInput">role_id</label>
          @error('role_id')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>


        <div class="form-floating mb-1">
          <input type="password" name='password' class="form-control rounded-bottom @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
          @error('password')
            <div class="invalit-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted"></p>
      </form>
      <small class="d-block text-center mb-5">Alredy Registered? <a href="/login"> Login</a>
      </small>
    </main>
  </div>
</div>



@endsection





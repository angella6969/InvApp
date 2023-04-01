<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>S . I . S . D . A . | Login</title>
  @include('dashboard.layout.link')
  <!-- Bootstrap -->
  <link href="{{ asset('gentelella-master') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('gentelella-master') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('gentelella-master') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="{{ asset('gentelella-master') }}/vendors/animate.css/animate.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="{{ asset('gentelella-master') }}/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  
  <div>
    
    {{-- <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a> --}}

@yield('container')


    {{-- <div class="login_wrapper">
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

          <div class="separator">
            <small class="d-block text-center">Not Registered? <a href="/registrasi"> Registrasi Now</a>
            </small>

            <div class="clearfix"></div>
            <br /><br />

            <div>
              <a class="btn btn-light" href="#" ><h1><i class="fa fa-paw"></i> S . I . S . D . A</h1></a>
              <p>Sistem Informasi Sumber Daya Air</p>
              <p>BBWS Serayu Opak</p>
            </div>
          </div>
          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
      </div>
      </form>
      </section>
    </div> --}}

    {{-- <div id="register" class="animate form registration_form">
      <section class="login_content">
        <form>
          <h1>Create Account</h1>
          <div>
            <input type="text" class="form-control" placeholder="Username" required="" />
          </div>
          <div>
            <input type="email" class="form-control" placeholder="Email" required="" />
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Password" required="" />
          </div>
          <div>
            <a class="btn btn-default submit" href="index.html">Submit</a>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Already a member ?
              <a href="#signin" class="to_register"> Log in </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
              <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
            </div>
          </div>
        </form>
      </section>
    </div> --}}
  </div>
  </div>
</body>

</html>
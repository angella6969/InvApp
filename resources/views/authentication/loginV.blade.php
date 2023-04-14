@extends('template.layout.loginLayout')

@section('container')
    <div class="login_wrapper">
        <div class="container">
            <div class="row">

                {{-- Alert Success --}}
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- End Aler Success --}}

                {{-- Alert loginError --}}
                @if (session()->has('loginError'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                    </div>
                    <br />
                @endif
                {{-- End Aler --}}

            </div>
        </div>
        <main class="form-signin w-100 m-auto">

            {{-- Form Login --}}
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="/login" method="post">
                        @csrf
                        <h1>Login Form</h1>
                        {{-- Masukan Email --}}
                        <div class="form-floating">
                            <input type="email" name='email' class="form-control @error('email') is-invalid @enderror "
                                id="email" placeholder="name@example.com" autofocus required
                                value="{{ old('email') }}">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- End Masukan Email --}}

                        {{-- Masukan Password --}}
                        <div>
                            <input type="password" name='password'
                                class="form-control @error('password') is-invalid @enderror " id=" password"
                                placeholder="Password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            {{-- End Masukan Password --}}
                    </form>
                    <button class="w-100 btn btn-lg btn-light" type="submit">Login</button>

                    {{-- Footer --}}
                    <div class="separator">
                        <small class="d-block text-center">Not Registered? <a href="/registrasi"> Registrasi Now</a>
                        </small>
                        <div class="clearfix"></div>
                        <br /><br />
                        <div>
                            <a class="btn btn-link" href="#">
                                <img class="img-thumbnail" src={{ asset('storage/images/LOGO%20SISDA.png') }}
                                    alt="LOGO SISDA.png">
                            </a>
                            <p>Sistem Informasi Sumber Daya Air</p>
                            <p>BBWS Serayu Opak</p>
                        </div>
                    </div>
                    {{-- End Footer --}}

                </section>
            </div>
            {{-- End Form Login --}}
        </main>
    </div>
@endsection

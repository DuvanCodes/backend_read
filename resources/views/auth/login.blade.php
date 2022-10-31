@extends('layouts.p3app_auth')

@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">
                        
                        <div class="text-center w-75 m-auto">
                            <a href="index.html">
                                <!--<span><img src="{{ asset('img/logo-single.png') }}" alt="" height="80"></span>-->
                            </a>
                            <h4>eBook King</h4>
                        </div>

                        <h5 class="auth-title">ACCESO PRIVADO</h5>

                        @if (isset($url))
                            <form method="POST" action="{{ route('login.' . $url) }}">
                        @else
                            <form method="POST" action="{{ route('login') }}">
                        @endif
                            
                            @csrf

                            <div class="form-group mb-3">
                                <label for="emailaddress">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Contraseña</label>
                                <input class="form-control @error('password') is-invalid @enderror"  type="password" id="password" name="password" placeholder="Ingrese su contraseña" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="checkbox-signin">Recordarme</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-danger btn-block" type="submit"> LOGIN </button>
                            </div>

                        </form>

                        

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
@endsection

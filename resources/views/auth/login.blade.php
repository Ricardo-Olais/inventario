@extends('maestra')
<style type="text/css">
      body {
    background-image: url(img/fondo2-e.jpg);
    
    background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: 100% 100%;
    z-index: -100;
}
</style>
@section("titulo")
    Login
@endsection
@section('contenido')

    <div class="row justify-content-center">
        <div class="col-md-3" style="margin-top:30px;"> 
            <div class="card" style="background-color:#fff;opacity: 1;color: #000;">
                <div class="card-header" style="text-align: center;">Inventario Cercam</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <!--label for="email"
                                   class="col-md-4 col-form-label text-md-right">Correo electrónico</label-->

                           
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                           
                        </div>

                        <div class="form-group">
                            <!--label for="password"
                                   class="col-md-4 col-form-label text-md-right">Contraseña</label-->

                            
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password" placeholder="Contraseña">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            
                        </div>

                       

                        <div class="form-group row mb-0">
                            
                                <button type="submit" class="btn btn-dark" style="width: 100%;height: 40px;">
                                    Entrar
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <center>
    <img src="img/logo.png" >
    </center>
@endsection

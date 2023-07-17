
@extends('maestra')
<style type="text/css">
      body {
    background-image: url(img/fondo-ok.jpg);
    background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: 100% 100%;
    z-index: -100;
}
</style>
@section("titulo", "Inicio")
@section('contenido')
<style type="text/css">
    
</style>
    <!--div class="col-12 text-center">
        <h1 style="color:#fff;">Bienvenido, {{Auth::user()->name}}</h1>
    </div-->
    <center>
    <!--img src="img/logo.png" clientes abajo-->
    </center>
    @foreach([
    ["productos", "ventas", "vender"],
    ["usuarios"]
    ] as $modulos)
        <!--div class="col-12 pb-2">
            <div class="row">
                @foreach($modulos as $modulo)
                    <div class="col-12 col-md-2">
                        <div class="card">
                            <img class="card-img-top" src="{{url("/img/$modulo.png")}}" >
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{$modulo === "acerca_de" ? "Acerca de" : ucwords($modulo)}}
                                </h5>
                                <a href="{{route("$modulo.index")}}" class="btn btn-success">
                                    Ir a&nbsp;{{$modulo === "acerca_de" ? "Acerca de" : ucwords($modulo)}}
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div-->
    @endforeach
@endsection

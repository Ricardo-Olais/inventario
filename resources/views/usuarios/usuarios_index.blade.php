
@extends("maestra")
@section("titulo", "Usuarios")
@section("contenido")

  <!-- Bootstrap CSS -->
       
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>

    $(document).ready(function(){

       //document.requestFullscreen();

       // new DataTable('#productos');

      var dataUsuarios= $('#usuarios').DataTable(
        {

        orderCellsTop: true,
        fixedHeader: true,
   
        "processing": true,
       // "scrollCollapse": true,
        "paging": true,
       
        "language": {
                    "lengthMenu": "Mostrar _MENU_ usuarios por página",
                    "search": "Buscar",
                    "zeroRecords": "No existen usuarios",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay ordenes disponibles",
                    "infoFiltered": "(Encontrado de _MAX_ ordenes)",
                    "paginate": {
                        "first":      "Inicio",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                },
         aaSorting : [[0, 'desc']],



        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      
        
        "columnDefs": []
       
    });




    });
</script>
<style type="text/css">
      .btn-group-xs>.btn, .btn-xs {
                padding: 1px 5px;
                font-size: 12px;
                line-height: 1.5;
                border-radius: 3px;
            }

          .btn-flotante {
                font-size: 16px; /* Cambiar el tamaño de la tipografia */
                text-transform: uppercase; /* Texto en mayusculas */
                font-weight: bold; /* Fuente en negrita o bold */
                color: #ffffff; /* Color del texto */
                border-radius: 25px; /* Borde del boton */
                letter-spacing: 2px; /* Espacio entre letras */
                background-color: #E91E63; /* Color de fondo */
                padding: 12px 17px; /* Relleno del boton */
                position: fixed;
                bottom: 40px;
                right: 40px;
                transition: all 300ms ease 0ms;
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                z-index: 99;
                width: 50px;
                height: 50px;


        }
            .btn-flotante:hover {
                background-color: #2c2fa5; /* Color de fondo al pasar el cursor */
                box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
                transform: translateY(-7px);
                color: #ffffff; /* Color del texto */
            }
            @media only screen and (max-width: 600px) {
                .btn-flotante {
                    font-size: 14px;
                    padding: 12px 20px;
                    bottom: 20px;
                    right: 20px;
                }
</style>

    <div class="row">
        <div class="col-12">
            <h3>Usuarios <i class="fa fa-users"></i></h3>
            <a href="{{route("usuarios.create")}}" class="btn-flotante"><i class="fa fa-plus" aria-hidden="true"></i></a>
            @include("notificacion")
            <div class="table-responsive">
                <table class="display" id="usuarios">
                    <thead>
                    <tr>
                        <th>Correo electrónico</th>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{route("usuarios.edit",[$usuario])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("usuarios.destroy", [$usuario])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

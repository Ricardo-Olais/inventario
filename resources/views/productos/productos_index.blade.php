
@extends("maestra")
@section("titulo", "Productos")
@section("contenido")


  <!-- Bootstrap CSS -->
       
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>


        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
       
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
} 
        </style>

<script>

    $(document).ready(function(){

       //document.requestFullscreen();

       // new DataTable('#productos');

      var dataUsuarios= $('#productos').DataTable(
        {

        orderCellsTop: true,
        fixedHeader: true,
   
        "processing": true,
       // "scrollCollapse": true,
        "paging": true,
       
        "language": {
                    "lengthMenu": "Mostrar _MENU_ productos por página",
                    "search": "Buscar",
                    "zeroRecords": "No existen productos",
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
        dom: 'Bfrtip',
            buttons: [{
                //Botón para Excel
                extend: 'csvHtml5',
                footer: true,
                title: 'Archivo',
                filename: 'Export_File',

                //Aquí es donde generas el botón personalizado
                text: '<button class="btn btn-success">Exportar a Excel <i class="fas fa-file-excel"></i></button>'
              }
            ],

      
        
        "columnDefs": []
       
    });




    });
</script>



    <div class="row">
        <div class="col-12">
            <h3>Productos <i class="fa fa-box"></i></h3>
            <a href="{{route("productos.create")}}" class="btn-flotante"><i class="fa fa-plus" aria-hidden="true"></i></a>
            @include("notificacion")
            <div class="table-responsive">
                <table class="display" id="productos">
                    <thead>
                    <tr>
                        <th>Código de barras</th>
                        <th>Descripción</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
                        <th>Utilidad</th>
                        <th>Existencia</th>

                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->codigo_barras}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->precio_compra}}</td>
                            <td>{{$producto->precio_venta}}</td>
                            <td>{{$producto->precio_venta - $producto->precio_compra}}</td>
                            <td>{{$producto->existencia}}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{route("productos.edit",[$producto])}}">
                                    <i class="fa fa-edit" ></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("productos.destroy", [$producto])}}" method="post">
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


@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")

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

</style>

<script>

    $(document).ready(function(){

       //document.requestFullscreen();

       // new DataTable('#productos');

      var dataUsuarios= $('#ventas').DataTable(
        {

        orderCellsTop: true,
        fixedHeader: true,
   
        "processing": true,
       // "scrollCollapse": true,
        "paging": true,
       
        "language": {
                    "lengthMenu": "Mostrar _MENU_ ventas por página",
                    "search": "Buscar",
                    "zeroRecords": "No existen ventas",
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
            <h3>Ventas <i class="fa fa-list"></i></h3>
            @include("notificacion")
            <div class="table-responsive">
                <table class="display" id="ventas">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Ticket de venta</th>
                        <th>Detalles</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ventas as $venta)
                        <tr>
                            <td>{{$venta->created_at}}</td>
                            <td>{{$venta->cliente->nombre}}</td>
                            <td>${{number_format($venta->total, 2)}}</td>
                            <td>
                                <a class="btn btn-info btn-xs" href="{{route("ventas.ticket", ["id"=>$venta->id])}}">
                                    <i class="fa fa-print"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-xs" href="{{route("ventas.show", $venta)}}">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("ventas.destroy", [$venta])}}" method="post">
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

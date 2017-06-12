@extends('layouts.admin')



@section('contenido')


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css">



   <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Barrios DOS<a href="barriodos/create"><button class="btn btn-success">Nuevo</button></a></h3>
      </div>
   </div>
   <div class="row">
   
    
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="table-responsive">
   
    <table class="table table-striped table-bordered" id="example" cellspacing="0" width="100%">
   
        <thead>
            <tr>
           <!--     <th style="visibility:hidden">ID</th>-->
                <th>NOMBRE BARRIO</th>
                <th>CIUDAD</th>  
                <th>ESTADO</th>  
                <th>ACCIONES</th>       
            </tr>
        </thead>
             <tfoot>
            <tr>
         <!--       <th style="visibility: hidden"></th>-->
                <th style="visibility: hidden">NOMBRE BARRIO</th>
                <th>CIUDAD</th>
                <th>ESTADO</th>
                <ht style="visibility: hidden">ACCIONES</ht>
                      
            </tr>
        </tfoot>
        <tbody>
      @foreach($barrios as $bar)
       <tr>
    <!--   <td>
    {{$bar->idbarrio}}
    </td>-->
      <td>{{$bar->nombre}}</td>
      <td>

           @foreach($ciudades as $ciu)
         @if($bar->idciudad == $ciu->idciudad)
              {{$ciu->nombre}}
              @endif
       @endforeach
       </td>
       <td>
       {{$bar->estado}}
       </td>
       <td >
    
            <a href="{{URL::action('BarriodosController@edit',$bar->idbarrio)}}"><button class="btn btn-info">Editar</button></a>

            <a href="#" Onclick='Mostrar({{$bar->idbarrio}});' data-toggle='modal' data-target="#myModal"><button class="btn btn-info">Editar</button></a>
         
            <a href="" data-target="#modal-delete-{{$bar->idbarrio}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>
             @include('inventario/barriodos/modal')
       </td>
       </tr>
     
       @endforeach
         </tbody>

       </table>  


    </div>
</div>
</div>

   </div>

@include('inventario.barriodos.modaledit')

@section('javascript')

<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
  <script>
$(document).ready(function() {
    $('#example').DataTable( {
      "language": {
           "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
        },
        
        "lengthMenu": [[5, 10, -1], [5, 10, "All"]],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select style="border-radius:3px" ><option  value="">Todos</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
  </script>
  @endsection
   @stop



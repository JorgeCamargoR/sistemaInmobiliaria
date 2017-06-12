@extends('layouts.admin')

@section('contenido')
  
   <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Barrios <a href="barrio/create"><button class="btn btn-success">Nuevo</button></a></h3>
      </div>
   </div>
   <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    

    <div id="list-producto"></div>

    </div>
</div>

   </div>


@include('inventario.barrio.modaledit')
@section('javascript')
  <script>

$(document).ready(function(){
  listProduct();
});


  $(document).on('click','.pagination li a', function(e){
    e.preventDefault();
    var url = $(this).attr("href");
    $.ajax({
      type:'get',
      url:url,
      success: function(data){
        $('#list-producto').empty().html(data);
      }
    });
  });

  var listProduct = function()
  {
    $.ajax({
      type:'get',
      url:'{{url('listall')}}',
      success: function(data){
        $('#list-producto').empty().html(data);
      }
    });
  }

  var Mostrar=function(id){
    var route="{{url('inventario/barrio')}}/"+id+"/editmodal";
    $.get(route,function(data){
      $("#idbarrio").val(data.idbarrio);
      $("#nombre").val(data.nombre);
      $("#idciudad").val(data.idciudad);

    });
  }

  $("#Guardar").click(function(){

    var id=$("#idbarrio").val();
    var nombre=$("#nombre").val();
    var route = "{{url('inventario/barrio')}}/"+id+"";
    var token = $("#token").val();

    $.ajax({
      url:route,
      headers:{'X-CSRF-TOKEN':token},
      type:'PUT',
      dataType:'json',
      data:{name:nombre},
      success:function(data){
        if(data.success == 'true')
        {
          listmark();
         $("#myModal").modal('toggle');
         $("#message-error").fadeIn();
      
          }
        },
        error:function(data){
          $("#error").html(data.responseJSON.nombre);
          $("#message-error").fadeIn();
          if(data.status =422){
            console.clear();
          }
        }
        });
  });

  $("#myModal").on("hidden.bs.modal",function(){
    $("#message-error").fadeOut()
  });
      
  </script>
  @endsection
   @stop



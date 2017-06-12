@extends('layouts.admin')

@section('contenido')
  
   <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Inmuebles <a href="inmueble/create"><button class="btn btn-success">Nuevo</button></a></h3>
      </div>
   </div>
   <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
@include('inventario/inmueble/partials/filters')

<table class="table">
        <thead>
            <tr>
                <th>TIPO</th>
                <th>NOMBRE</th>
                <th>BARRIO</th>
                <th>CIUDAD</th>
                <th>CODIGO</th>
                <th>PRECIO</th>
                <th>ESTADO</th>
                <th>FOTO</th>
               <th>OPCIONES</th>
           
            </tr>
        </thead>
        <tbody>
      @foreach($inmuebles as $art)
       <tr>
       <td>
       @foreach($categorias as $cat)
         @if($art->idcategoria == $cat->idcategoria)
              {{$cat->nombre}}
              @endif
       @endforeach
 
    </td>
      <td>{{$art->nombre}}</td>
      <td>
     @foreach($barrios as $bar)
         @if($art->idbarrio == $bar->idbarrio)
              {{$bar->nombre}}
              @endif
       @endforeach
      </td>

      <td>@foreach($ciudades as $ciu)
         @if($art->idciudad == $ciu->idciudad)
              {{$ciu->nombre}}
              @endif
       @endforeach
      </td>
      <td>{{$art->codigo}} </td>
      <td>{{$art->precio_venta}}</td>
      <td>{{$art->estado}}</td>
        <td>
        <img src="{{asset('img/articulos/'.$art->imagenPrincipal)}}" alt="{{$art->nombre}}" height="180px" width="150px" class="img-thumbnail">
       </td>
       <td>
     
           <br><br>

          <a href="{{URL::action('InmuebleController@edit',$art->idinmueble)}}"><button class="btn btn-info">Editar</button></a>

              
            <a href="" data-target="#modal-delete-{{$art->idinmueble}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>
       </td>
       </tr>
       @include('inventario.inmueble.modal')
       @endforeach
       	 </tbody>

       </table>
       <div style="text-align: center">
          {{$inmuebles->links()}}
       </div>


    </div>
</div>
<!--{{$inmuebles->render()}}-->
   </div>

   @stop


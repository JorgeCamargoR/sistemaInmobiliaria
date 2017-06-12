@extends('layouts.admin')

@section('contenido')
  
   <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Ciudades <a href="ciudad/create"><button class="btn btn-success">Nuevo</button></a></h3>
      </div>
   </div>
   <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
@include('inventario/ciudad/partials/filters')
<table class="table" id="myTable">
        <thead>
             <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>          
            </tr>
        </thead>
        <tbody>
      @foreach($ciudades as $ciu)
       <tr>
       <td>{{$ciu->idciudad}}</td>
      <td>{{$ciu->nombre}}</td>
     <td>{{$ciu->estado}}</td>
       <td>
        
            <a href="" data-target="#modal-delete-{{$ciu->idciudad}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>

              @include('inventario/ciudad/modal')
       </td>
       </tr>
       @endforeach
       	 </tbody>

       </table>
       <div style="text-align: center">
          {{$ciudades->links()}}
       </div>


    </div>
</div>
   </div>


   @stop



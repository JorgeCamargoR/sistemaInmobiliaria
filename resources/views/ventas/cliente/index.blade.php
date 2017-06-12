@extends('layouts.admin')
@section('contenido')
   

   <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
      @include('ventas/cliente/search')
      </div>

   </div>


   <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">

       <table class="table table-striped table-bordered table-condensed table-hover">

       <thead>
       <th>Id</th>
       <th>Nombre</th>
       <th>Tipo Documento</th>
       <th>Num documento</th>
       <th>Dirección</th>
       <th>Teléfono</th>
       <th>Email</th>
       <th>País</th>
       <th>Ciudad</th>
       <th>Estado</th>
       <th>Opciones</th>    


       </thead>

       @foreach($clientes as $clien)
       <tr>

       <td>{{$clien->idcliente}}</td>
       <td>{{$clien->nombre}}</td>
       <td>{{$clien->tipo_documento}}</td>
       <td>{{$clien->num_documento}}</td>
       <td>{{$clien->direccion}}</td>
       <td>{{$clien->telefono}}</td>
       <td>{{$clien->email}}</td>
       <td>{{$clien->pais}}</td>
       <td>{{$clien->ciudad}}</td>
       <td>{{$clien->estado}}</td>
              
       <td>
            <a href="{{URL::action('ClienteController@edit',$clien->idcliente)}}"><button class="btn btn-info">Editar</button></a>
            <a href="" data-target="#modal-delete-{{$clien->idcliente}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>
       </td>
       </tr>
       @include('ventas.cliente.modal')
       @endforeach
       	
       </table>

    </div>
</div>
{{$clientes->render()}}
   </div>



@endsection
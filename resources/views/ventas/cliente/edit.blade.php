@extends('layouts.admin')
@section('contenido')


<div class="row">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

<h3>Editar Cliente {{$cliente->nombre}}</h3>
@if(count($errors)>0)
<div class="alert alert-danger">

<ul>
  @foreach($errors->all() as $error)
   <li>
   	{{$error}}
   </li>
   @endforeach
</ul>

</div>
@endif
</div>
</div>


{!!Form::model($cliente,['method'=>'PATCH','route'=>['cliente.update',$cliente->idcliente]])!!}
{{Form::token()}}

<div class="row">
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label for="nombre">Nombre</label>
   <input type="text" name="nombre" class="form-control" required value="{{$cliente->nombre}}" placeholder="Nombre...">
  
</div>

<div class="form-group">
   <label for="direccion">Dirección</label>
   <input type="text" name="direccion" class="form-control" value="{{$cliente->direccion}}" placeholder="Dirección...">
  
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label>Tipo Documento</label>
   <select name="tipo_documento" class="form-control">
   @if($cliente->tipo_documento=='C.C')
    <option value="C.C" selected>Cédula de cidadania</option>
    <option value="T.I">Tarjeta de Identidad</option>
    <option value="NIT">NIT</option>
    <option value="PasaporteExtranjero">Pasaporte extranjeria</option>
    @elseif($cliente->tipo_documento=='T.I')
      <option value="C.C" >Cédula de cidadania</option>
    <option value="T.I" selected>Tarjeta de Identidad</option>
    <option value="NIT">NIT</option>
    <option value="PasaporteExtranjero">Pasaporte extranjeria</option>
    @elseif($cliente->tipo_documento=='NIT')
     <option value="C.C" >Cédula de cidadania</option>
    <option value="T.I" >Tarjeta de Identidad</option>
    <option value="NIT" selected>NIT</option>
    <option value="PasaporteExtranjero">Pasaporte extranjeria</option>
    @else
    <option value="C.C" >Cédula de cidadania</option>
    <option value="T.I" >Tarjeta de Identidad</option>
    <option value="NIT">NIT</option>
    <option value="PasaporteExtranjero" selected>Pasaporte extranjeria</option>
    @endif
   </select>
  
</div>

<div class="form-group">
<label>Número documento</label>
<input type="text" name="num_documento" value="{{$cliente->num_documento}}" class="form-control" placeholder="Número de documento...">
</select>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label >Teléfono</label>
   <input type="text" name="telefono" value="{{$cliente->telefono}}" class="form-control" required placeholder="Teléfono...">
  
</div>

<div class="form-group">
   <label >E-mail</label>
   <input type="email" name="email" value="{{$cliente->email}}" class="form-control" placeholder="Email...">
  
</div>

</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label >Pais</label>
   <input type="text" name="pais" required value="{{$cliente->pais}}" class="form-control" placeholder="País de residencia...">
  
</div>
</div>



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label for="ciudad">Ciudad</label>
   <input type="text" name="ciudad" value="{{$cliente->ciudad}}" class="form-control" placeholder="Ciudad de residencia...">
  
</div>

<div class="form-group">
<label>Estado:</label>

   <input type="radio" name="estado" value="Activo" <?php if($cliente->estado=='Activo') print "checked=true"?> />Activo
   <input type="radio" name="estado" value="Inactivo" <?php if($cliente->estado=='Inactivo') print "checked=true"?> />Inactivo
    </div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<button class="btn btn-primary" type="submit">Guardar</button>
<button class="btn btn-danger" type="reset">Cancelar</button>
</div>
</div>


{!!Form::close()!!}



@endsection
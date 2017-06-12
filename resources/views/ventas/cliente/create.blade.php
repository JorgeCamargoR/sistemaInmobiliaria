@extends('layouts.admin')
@section('contenido')


<div class="row">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

<h3>Nuevo Cliente</h3>
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

{!!Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

<div class="row">
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label for="nombre">Nombre</label>
   <input type="text" name="nombre" class="form-control" required value="{{old('nombre')}}" placeholder="Nombre...">
  
</div>

<div class="form-group">
   <label for="direccion">Dirección</label>
   <input type="text" name="direccion" class="form-control" value="{{old('dirección')}}" placeholder="Dirección...">
  
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label>Tipo Documento</label>
   <select name="tipo_documento" class="form-control">
    <option value="C.C">Cédula de cidadania</option>
    <option value="T.I">Tarjeta de Identidad</option>
    <option value="NIT">NIT</option>
    <option value="PasaporteExtranjero">Pasaporte extranjeria</option>
   </select>
  
</div>

<div class="form-group">
<label>Número documento</label>
<input type="text" name="num_documento" value="{{old('num_documento')}}" class="form-control" placeholder="Número de documento...">
</select>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label >Teléfono</label>
   <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" required placeholder="Teléfono...">
  
</div>

<div class="form-group">
   <label >E-mail</label>
   <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email...">
  
</div>

</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label >Pais</label>
   <input type="text" name="pais" required value="{{old('pais')}}" class="form-control" placeholder="País de residencia...">
  
</div>
</div>



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label for="ciudad">Ciudad</label>
   <input type="text" name="ciudad" value="{{old('ciudad')}}" class="form-control" placeholder="Ciudad de residencia...">
  
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
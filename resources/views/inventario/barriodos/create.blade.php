@extends('layouts.admin')
@section('contenido')


<div class="row">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

<h3>Nuevo Barrio</h3>
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

{!!Form::open(array('url'=>'inventario/barriodos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}

<div class="row">
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="nombre">Nombre</label>
   <input type="text" name="nombre" class="form-control" required value="{{old('nombre')}}" placeholder="Nombre...">
  
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Ciudad</label>
<select name="idciudad" class="form-control">
@foreach($ciudades as $ciu)

<option value="{{$ciu->idciudad}}">
{{$ciu->nombre}}
  
</option>
@endforeach
  
</select>
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
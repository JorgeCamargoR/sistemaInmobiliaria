@extends('layouts.admin')
@section('contenido')

<div class="row">

   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

     <h3>Edit barrio: {{$barrios->nombre}}</h3>

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


     {!!Form::model($barrios,['method'=>'PATCH','route'=>['barrio.update',$barrios->idbarrio]])!!}

     {{Form::token()}}

     <div class="form-group">

       <label form="nombre">Nombre</label>
       <input type="text" name="nombre" class="form-control" value="{{$barrios->nombre}}" placeholder="Nombre...">
       </div>

       <div class="form-group">
<label>Ciudad</label>
<select name="idciudad" class="form-control">
<option value="{{$barrios->idciudad}}"></option>
       @foreach($ciudades as $ciu)
     @if($ciu->idciudad==$barrios->idciudad)
<option value="{{$ciu->idciudad}}" selected>
{{$ciu->nombre}}
</option>
   @else
<option value="{{$ciu->idciudad}}" >
{{$ciu->nombre}}
</option>
    @endif

@endforeach
</select>



</div>

<div class="form-group">
  <button class="btn btn-primary" type="submit">Guardar</button>
  <button class="btn btn-danger" type="reset">Cancelar</button>

</div>
{!!Form::close()!!}
</div>

</div>
@endsection
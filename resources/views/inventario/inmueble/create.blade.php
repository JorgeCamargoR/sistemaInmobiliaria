@extends('layouts.admin')
@section('contenido')


<div class="row">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

<h3>Nuevo Inmueble</h3>
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

{!!Form::open(array('url'=>'inventario/inmueble','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
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
<label>Categoria</label>
<select name="idcategoria" class="form-control">
@foreach($categorias as $cat)

<option value="{{$cat->idcategoria}}">
{{$cat->nombre}}
  
</option>
@endforeach
  
</select>
</div>

<div class="form-group">
<label>Ciudad</label>
<select name="idciudad" class="form-control" id="ciudad">
<option value=""></option>
@foreach($ciudades as $ciu)

<option value="{{$ciu->idciudad}}">
{{$ciu->nombre}}
  
</option>
@endforeach
  
</select>
</div>



<div class="form-group">
<label>Barrio</label>
<select name="idbarrio" class="form-control" id="barrio" >

<option></option>
  

</select>
</div>

</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="codigo">Código</label>
   <input type="text" name="codigo" required value="{{old('codigo')}}" class="form-control" required placeholder="Código del articulo...">
  
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="precio_venta">Precio Venta</label>
   <input type="text" name="precio_venta" required value="{{old('precio_venta')}}" class="form-control" placeholder="Precio  del articulo...">
  
</div>
</div>



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="descripcion">Descripcion</label>
   <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Descripción del articulo...">
  
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="imagenPrincipal">Imagen Principal</label>
   <input type="file" name="imagenPrincipal" class="form-control">
  
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="imagen1">Imagen 1</label>
   <input type="file" name="imagen1" class="form-control">
  
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="imagen2">Imagen 2</label>
   <input type="file" name="imagen2" class="form-control">
  
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="imagen3">Imagen 3</label>
   <input type="file" name="imagen3" class="form-control">
  
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="imagen4">Imagen 4</label>
   <input type="file" name="imagen4" class="form-control">
  
</div>
</div>





<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<button class="btn btn-primary" type="submit">Guardar</button>
<button class="btn btn-danger" type="reset">Cancelar</button>
</div>
</div>

{!!Form::close()!!}

@section('javascript')
  <script>
     $('#ciudad').on('change',function(e){
      console.log(e);
      var ciu_id = e.target.value;

      $.get('create/ajax-barrio?ciu_id='+ciu_id, function(data){

         $('#barrio').empty();

           $.each(data, function(create,barObj){

            $('#barrio').append('<option value="'+barObj.idbarrio+'">'+barObj.nombre+'</option');
           });

      });
     });
  </script>
  @endsection


@endsection
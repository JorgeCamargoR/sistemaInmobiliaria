@extends('layouts.admin')
@section('contenido')


<div class="row">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

<h3>Editar inmueble: {{$inmueble->nombre}}</h3>
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


{!!Form::model($inmueble,['method'=>'PATCH','route'=>['inmueble.update',$inmueble->idinmueble],'files'=>'true'])!!}
{{Form::token()}}

<div class="row">
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="nombre">Nombre</label>
   <input type="text" name="nombre" class="form-control" required value="{{$inmueble->nombre}}" >
  
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="codigo">Código</label>
   <input type="text" name="codigo" required value="{{$inmueble->codigo}}" class="form-control" >
  
</div>


</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label>Categoria</label>
<select name="idcategoria" class="form-control">
<option value="{{$inmueble->idcategoria}}"></option>
@foreach($categorias as $cat)
     @if($cat->idcategoria==$inmueble->idcategoria)
<option value="{{$cat->idcategoria}}" selected>
{{$cat->nombre}}
</option>
   @else
<option value="{{$cat->idcategoria}}" >
{{$cat->nombre}}
</option>
    @endif

@endforeach
  
</select>
</div>

</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label>Ciudad</label>
<select name="idciudad" class="form-control" id="ciudad">
@foreach($ciudades as $ciu)
  @if($ciu->idciudad==$inmueble->idciudad)
<option value="{{$ciu->idciudad}}" selected>
{{$ciu->nombre}}</option>

@endif
@endforeach
  
</select>
</div>

<div class="form-group">
<label>Barrio:</label>
<select name="idbarrio" class="form-control" id="barrio" >
@foreach($barrios as $bar)
  @if($bar->idbarrio==$inmueble->idbarrio)
<option value="{{$inmueble->idbarrio}}" selected>
{{$bar->nombre}}</option>

@endif
@endforeach
</select>
</div>

</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="precioventa">Precio Venta</label>
   <input type="text" name="precio_venta" required value="{{$inmueble->precio_venta}}" class="form-control" >
  
</div>
<div class="form-group">
<label>Estado:</label>

   <input type="radio" name="estado" value="Activo" <?php if($inmueble->estado=='Activo') print "checked=true"?> />Activo
   <input type="radio" name="estado" value="Inactivo" <?php if($inmueble->estado=='Inactivo') print "checked=true"?> />Inactivo
    </div>
</div>



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="descripcion">Descripcion</label>
   <input type="text" name="descripcion" value="{{$inmueble->descripcion}}" class="form-control">
  
</div>


</div>

<div class="col-lg-12 col-md-12 col-xs-12">

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="imagenPrincipal">Imagen Principal</label>
   <input type="file" name="imagenPrincipal" class="form-control">
    @if (($inmueble->imagenPrincipal)!="")
    <img src="{{asset('img/articulos/'.$inmueble->imagenPrincipal)}}" height="300px" width="300px">

    @endif
</div>

<div class="form-group">
   <label form="imagen1">Imagen1</label>
   <input type="file" name="imagen1" class="form-control">
    @if (($inmueble->imagen1)!="")
    <img src="{{asset('img/articulos/'.$inmueble->imagen1)}}" height="300px" width="300px">

    @endif
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
   <label form="imagen2">Imagen2</label>
   <input type="file" name="imagen2" class="form-control">
    @if (($inmueble->imagen2)!="")
    <img src="{{asset('img/articulos/'.$inmueble->imagen2)}}" height="300px" width="300px">

    @endif
</div>

<div class="form-group">
   <label form="imagen3">Imagen3</label>
   <input type="file" name="imagen3" class="form-control">
    @if (($inmueble->imagen3)!="")
    <img src="{{asset('img/articulos/'.$inmueble->imagen3)}}" height="300px" width="300px">

    @endif
</div>
<div class="form-group">
   <label form="imagen4">Imagen4</label>
   <input type="file" name="imagen4" class="form-control">
    @if (($inmueble->imagen4)!="")
    <img src="{{asset('img/articulos/'.$inmueble->imagen4)}}" height="300px" width="300px">

    @endif
</div>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<button class="btn btn-primary" type="submit">Guardar</button>
<button class="btn btn-danger" type="reset">Cancelar</button>
</div>
</div>
</div>


{!!Form::close()!!}

@section('javascript')
  <script>
     $('#ciudad').on('change',function(e){
      console.log(e);
      var ciu_id = e.target.value;

      $.get('edit/ajax-barrio?ciu_id='+ciu_id, function(data){

         $('#barrio').empty();

           $.each(data, function(create,barObj){

            $('#barrio').append('<option value="'+barObj.idbarrio+'">'+barObj.nombre+'</option');
           });

      });
     });
  </script>
  @endsection
@endsection
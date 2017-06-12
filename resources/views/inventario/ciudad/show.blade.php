@extends('layouts.admin')
@section('contenido')



{!!Form::model($articulo,['route'=>['articulo.show',$articulo->idarticulo],'files'=>'true'])!!}
{{Form::token()}}

<div class="row">

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div >
 {{$articulo->nombre}} - @foreach($categorias as $cat)
     @if($cat->idcategoria==$articulo->idcategoria)
{{$cat->nombre}} @endif @endforeach- {{$articulo->codigo}} - 

    <h4>PRECIO:{{$articulo->precio_venta}}</h4>

</div>
 <div class="container-fluid" style="display:block; margin: 2px">
<div class="col-md-6">

    <img src="{{asset('img/articulos/'.$articulo->imagenPrincipal)}}" width="200" height="200">
    </div>


<div class="col-md-6">

    <img src="{{asset('img/articulos/'.$articulo->imagen1)}}" width="200" height="200">
    </div>

<br>
<div class="col-md-12"></div>
<div class="col-md-6">

    <img src="{{asset('img/articulos/'.$articulo->imagen2)}}" width="200" height="200">
    </div>


<div class="col-md-6">

    <img src="{{asset('img/articulos/'.$articulo->imagen3)}}" width="200" height="200">
    </div>

</div>
</div>

</div>

{!!Form::close()!!}
@endsection
@extends('layouts.admin')
@section('css')

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     @endsection
@section('contenido')



{!!Form::model($inmueble,['route'=>['inmueble.show',$inmueble->idinmueble],'files'=>'true'])!!}
{{Form::token()}}

<div class="row">

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div >

<h3>NOMBRE: {{$inmueble->nombre}}</h3>

@foreach($categorias as $cat)
     @if($cat->idcategoria==$inmueble->idcategoria)
<h3>CATEGORIA: {{$cat->nombre}}</h3>
     @endif
@endforeach

<h3>CÓDIGO: {{$inmueble->codigo}}</h3>

<h3>PRECIO: {{$inmueble->precio_venta}}</h3>

</div>


<div class="container-fluid">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="{{asset('img/articulos/'.$inmueble->imagenPrincipal)}}" alt="Chania">
    </div>

    <div class="item">
      <img src="{{asset('img/articulos/'.$inmueble->imagen1)}}" alt="Chania">
    </div>

    <div class="item">
      <img src="{{asset('img/articulos/'.$inmueble->imagen2)}}" alt="Flower">
    </div>

    <div class="item">
      <img src="{{asset('img/articulos/'.$inmueble->imagen2)}}" alt="Flower">
    </div>
    <div class="item">
      <img src="{{asset('img/articulos/'.$inmueble->imagen3)}}" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
</div>

</div>

{!!Form::close()!!}
@endsection
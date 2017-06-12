@extends('layouts.admin')

@section('contenido')

<h3>Google Chart</h3>
<div class="col-md-12">
@include('inventario/inmciudades')
<p>Relaciona la tabla Inmueble con tabla Ciudad y muestra la cantidad de Inmuebles que hay en cada ciudad.
</div>



@stop
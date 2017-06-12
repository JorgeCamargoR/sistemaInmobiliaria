{!!Form::open(array('url'=>'esquema','method'=>'GET'))!!}

<div class="col-md-2">

<!--{{Form::text('search')}}-->
<div class="form-group">
<label>Busqueda:</label>

   <div class="input-group">
       <input type="text" class="form-control" name="search" placeholder="Buscar por codigo...">
       <span class="input-group-btn">   	   
       </span>
   </div>
</div>
</div>

<div class="col-md-2">

<!--{{Form::select('published',[''=>'Select status','0'=>'Draft','1'=>'Published'])}}-->
<label>Estado:</label>

<select name="estado" class="form-control" type="button">
  <option value=""></option> 
  <option value="Activo">Activo</option>
  <option value="Inactivo">Inactivo</option>
</select>


</div>

<div class="col-md-2">
<label>Tipo Inmueble:</label>

<!--{{Form::select('published',[''=>'Select status','0'=>'Draft','1'=>'Published'])}}-->
<select name="idcategoria" class="form-control" type="button">

  <option value=""></option> 
  @foreach($categorias as $cat)
  <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
  @endforeach
</select>


</div>



<div class="col-md-2">
<label>Ciudad:</label>

<select name="idciudad" class="form-control" type="button" id="ciudad">

  <option value=""></option> 
  <hr>
  @foreach($ciudades as $ciu)
  <option value="{{$ciu->idciudad}}">{{$ciu->nombre}}</option>
  @endforeach
</select>
</div>
<!--
<div class="col-md-2">
<label>Barrio:</label>

<select name="idbarrio" class="form-control" type="button" id="barrio">

  <option value="" style="font-weight: bold"></option>
  <hr>
  </select>
</div>-->
<!--{{Form::select('menu',[''=>'Menu status','0'=>'Not in menu','1'=>'Show in menu'])}}-->

<div class="col-md-2">
<label>Barrio:</label>

<select name="idbarrio" class="form-control" type="button" id="barrio">

  <option value="" style="font-weight: bold"></option>
  <hr>
  </select>
</div>

<div class="col-md-2">

<label>Filtrar:</label>
<button type="submit" class="btn btn-primary">Filter sections</button>
</div>
<!--{{Form::button('Filter sections',['type'=>'submit','class'=>'btn btn-primary'])}}-->
<hr>
{{Form::close()}}



@section('javascript')
  <script>
     $('#ciudad').on('change',function(e){
      console.log(e);
      var ciu_id = e.target.value;

      $.get('esquema/partials/filters/ajax-barr?ciu_id='+ciu_id, function(data){

         $('#barrio').empty();
        $('#barrio').append('<option value="" style="font-weight:bold"></option><hr>');
           $.each(data, function(filters,barObj){
            $('#barrio').append('<option value="'+barObj.idbarrio+'">'+barObj.nombre+'</option>');
           });

      });
     });
  </script>
  @endsection

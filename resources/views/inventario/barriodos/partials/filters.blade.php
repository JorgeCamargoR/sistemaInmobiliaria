{!!Form::open(array('url'=>'almacen/barrio','method'=>'GET'))!!}

<div class="col-md-2">

<!--{{Form::text('search')}}-->
<div class="form-group">

   <div class="input-group">
       <input type="text" class="form-control" name="search" placeholder="Buscar por codigo...">
       <span class="input-group-btn">   	   
       </span>
   </div>
</div>
</div>

<div class="col-md-2">

<!--{{Form::select('published',[''=>'Select status','0'=>'Draft','1'=>'Published'])}}-->
<select name="idciudad" class="form-control" type="button">

  <option value="">Ciudad</option> 
  @foreach($ciudades as $ciu)
  <option value="{{$ciu->idciudad}}">{{$ciu->nombre}}</option>
  @endforeach
</select>


</div>

<!--{{Form::select('menu',[''=>'Menu status','0'=>'Not in menu','1'=>'Show in menu'])}}-->

<button type="submit" class="btn btn-primary" id="filtrar">Filter sections</button>
<!--{{Form::button('Filter sections',['type'=>'submit','class'=>'btn btn-primary'])}}-->
<hr>
{{Form::close()}}
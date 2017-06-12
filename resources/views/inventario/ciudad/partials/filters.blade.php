{!!Form::open(array('url'=>'inventario/ciudad','method'=>'GET'))!!}

<div class="col-md-2">

<!--{{Form::text('search')}}-->
<div class="form-group">

   <div class="input-group">
       <input type="text" class="form-control" name="search" placeholder="Buscar por nombre...">
       <span class="input-group-btn">   	   
       </span>
   </div>
</div>
</div>




<!--{{Form::select('menu',[''=>'Menu status','0'=>'Not in menu','1'=>'Show in menu'])}}-->

<button type="submit" class="btn btn-primary">Filter sections</button>
<!--{{Form::button('Filter sections',['type'=>'submit','class'=>'btn btn-primary'])}}-->
<hr>
{{Form::close()}}
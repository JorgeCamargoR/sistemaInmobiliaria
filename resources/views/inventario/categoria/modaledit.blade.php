<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-editar-{{$cat->idcategoria}}">
  
 

<div class="modal-dialog">

   <div class="modal-content">

      <div class="modal-header">
     
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"/>
         <span aria-hidden="true">X</span>

   

       </div>


       <div class="modal-body">
                 <h3 >Edit categoría: {{$cat->nombre}}</h3>

       <!--   @if(count($errors)>0)

     <div class="alert alert-danger ">

     <ul>
       @foreach($errors->all() as $error)
         <li>
           {{$error}}
         </li>

        @endforeach 

     </ul>

     </div>
     @endif-->
      {!!Form::model($cat,['method'=>'PATCH','route'=>['categoria.update',$cat->idcategoria]])!!}

     {{Form::token()}}
     <div class="form-group">

       <label form="nombre">Nombre</label>
       <input type="text" name="nombre" id="example" class="form-control" value="{{$cat->nombre}}" placeholder="Nombre...">
       </div>

      

   <div class="form-group">
     <button class="modal-action waves-effect waves-green btn btn-primary" id="cl" type="submit">Guardar</button>
     <button class="btn btn-danger" type="reset">Cancelar</button>
       </div>
   {{Form::Close()}}
     
      </div>   
   </div>
</div>


</div>

@section('javascript')
  <script>
       $( "#cl" ).click(function() {
       if($("#example").val() === ""){
         alert("Rellene todos los campos");
       }else{
         $('#modal-editar-{{$cat->idcategoria}}').closeModal();
       }
      
    });
  </script>
  @endsection
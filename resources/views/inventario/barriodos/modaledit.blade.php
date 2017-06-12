<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Barrio</h4>
      </div>
      <div class="modal-body">
      <div id="message-error" class="alert alert-danger danger" role="alert" style="display:none">
      	<strong id="error"></strong>
      </div>
        {!!Form::open(['id'=>'form'])!!}
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
         <input type="hidden" id="idbarrio">
         {!!form::label('Nombre')!!}
         {!!form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Digite Barrio'])!!}

          <div class="form-group">
       <!--  {!!form::label('Ciudad')!!}
         {!!form::text('idciudad',null,['id'=>'idciudad','class'=>'form-control','placeholder'=>'Digite Barrio'])!!}-->




</div>
         {!!Form::Close()!!}
         </div>
      <div class="modal-footer">
        {!!link_to('#',$title='Guardar',$attributes=['id'=>'Guardar','class'=>'btn btn-primary'])!!}
      </div>
    </div>
  </div>
</div>
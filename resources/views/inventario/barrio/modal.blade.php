<div class="modal fade modal-slide-in-right" aira-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$bar->idbarrio}}">

{{Form::Open(array('action'=>array('BarrioController@destroy',$bar->idbarrio),'method'=>'delete'))}}
	
<div class="modal-dialog">
	<div class="modal-content">
     
     <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">x</span>

     </div>
     <div class="modal-body">     <p>Confirme si desea Eliminar el barrio</p>
</div>

     <div class="modal-footer">
     	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
     </div>


	</div>

</div>
{{Form::Close()}}
</div>
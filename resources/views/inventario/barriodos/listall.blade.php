
<div class="table-responsive">
   
    <table class="table">
     @include('almacen/barriodos/partials/filters')
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE BARRIO</th>
                <th>CIUDAD</th>           
            </tr>
        </thead>
        <tbody>
      @foreach($barrios as $bar)
       <tr>
       <td>
    {{$bar->idbarriodos}}
    </td>
      <td>{{$bar->nombre}}</td>
      <td>

           @foreach($ciudades as $ciu)
         @if($bar->idciudad == $ciu->idciudad)
              {{$ciu->nombre}}
              @endif
       @endforeach
       </td>
       <td>
    
            <a href="{{URL::action('BarriodosController@edit',$bar->idbarriodos)}}"><button class="btn btn-info">Editar</button></a>

            <a href="#" Onclick='Mostrar({{$bar->idbarriodos}});' data-toggle='modal' data-target="#myModal"><button class="btn btn-info">Editar</button></a>
         
            <a href="" data-target="#modal-delete-{{$bar->idbarriodos}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>
             @include('almacen/barriodos/modal')
       </td>
       </tr>
     
       @endforeach
       	 </tbody>

       </table>  
       <div class="text-center">
 {{$barrios->links()}}
 </div>

 </div>



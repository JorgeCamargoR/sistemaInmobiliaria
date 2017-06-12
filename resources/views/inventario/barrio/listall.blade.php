
<div class="table-responsive">
   
    <table class="table">
     @include('inventario/barrio/partials/filters')
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
    {{$bar->idbarrio}}
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
    
            <a href="{{URL::action('BarrioController@edit',$bar->idbarrio)}}"><button class="btn btn-info">Editar</button></a>

            <a href="#" Onclick='Mostrar({{$bar->idbarrio}});' data-toggle='modal' data-target="#myModal"><button class="btn btn-info">Editar</button></a>
         
            <a href="" data-target="#modal-delete-{{$bar->idbarrio}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>
             @include('inventario/barrio/modal')
       </td>
       </tr>
     
       @endforeach
       	 </tbody>

       </table>  
       <div class="text-center">
 {{$barrios->links()}}
 </div>

 </div>



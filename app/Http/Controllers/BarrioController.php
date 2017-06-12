<?php

namespace sistemaPractica\Http\Controllers;

use Illuminate\Http\Request;
use sistemaPractica\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaPractica\Http\Requests\BarrioFormRequest;
use sistemaPractica\Ciudad;
use sistemaPractica\Barrio;
use sistemaPractica\Base;
use DB;

class BarrioController extends Controller
{
      public function __construct(){
        $this->middleware('auth');

    }

    public function index(){


        return view('inventario.barrio.index');
    }

    public function listall(){
       
$barrios=DB::table('barrio')->where('estado','=','Activo')->paginate(5);
         $ciudades=DB::table('ciudad')->get();
        return view('inventario.barrio.listall',["barrios"=>$barrios,"ciudades"=>$ciudades]);
    }

        public function create(){

            
       $ciudades=DB::table('ciudad')->get();

    	return view("inventario.barrio.create",["ciudades"=>$ciudades]);

    }



    public function store(BarrioFormRequest $request){

    	$barrio = new Barrio;

    	$barrio->idciudad=$request->get('idciudad');
    	$barrio->nombre=$request->get('nombre');
        $barrio->estado='Activo';
    	
    	$barrio->save();
    	return Redirect::to('inventario/barrio');

    }


    public function edit($id){

        $barrios=Barrio::findOrFail($id);
          $ciudades = Ciudad::all();
        
        return view("inventario.barrio.edit",["ciudades"=>$ciudades,"barrios"=>$barrios]);
    }

    public function editmodal($id){
        $barrios = Barrio::findOrFail($id);


        return response()->json($barrios);
    }

         public function update(BarrioFormRequest $request,$id){

  $barrio=Barrio::findOrFail($id);
    $barrio->nombre=$request->get('nombre');
    $barrio->update();
    return Redirect::to('inventario/barrio');

   /* if($request->ajax())
    {
        $barrios = Barrio::findOrfail($id);
        $input = $request->all();
        $result = $barrios->fill($input)->save();

        if($result)
        {
            return response()->json(['success'=>'true']);

        }
        else
        {
            return response()->json(['success'=>'false']);
        }
    }*/

    }



      public function destroy($id){

        $barrio=Barrio::findOrFail($id);
        $barrio->estado='Inactivo';

        $barrio->update();
        return Redirect::to('inventario/barrio');
    }
}

<?php

namespace sistemaPractica\Http\Controllers;

use Illuminate\Http\Request;
use sistemaPractica\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;
use sistemaPractica\Http\Requests\BarrioFormRequest;
use sistemaPractica\Ciudad;
use sistemaPractica\Barrio;
use sistemaPractica\Base;
use DB;

class BarriodosController extends Controller
{
      public function __construct(){
        $this->middleware('auth');

    }

    public function index(){
         $barrios=DB::table('barrio')->paginate();
         $ciudades=DB::table('ciudad')->get();
        return view('inventario.barriodos.index',["barrios"=>$barrios,"ciudades"=>$ciudades]);
    }

    public function listall(){
       
$barrios=DB::table('barrio')->where('estado','=','Activo')->paginate(7);
         $ciudades=DB::table('ciudad')->get();
        return view('inventario.barriodos.listall',["barrios"=>$barrios,"ciudades"=>$ciudades]);
    }

        public function create(){

            
       $ciudades=DB::table('ciudad')->where('estado','=','Activo')->get();

    	return view("inventario.barriodos.create",["ciudades"=>$ciudades]);

    }



    public function store(BarrioFormRequest $request){

    	$barrio = new Barrio;

    	$barrio->idciudad=$request->get('idciudad');
    	$barrio->nombre=$request->get('nombre');
        $barrio->estado='Activo';
    	
    	$barrio->save();
    	return Redirect::to('inventario/barriodos');

    }


    public function edit($id){

        $barrios=Barrio::findOrFail($id);
          $ciudades=DB::table('ciudad')->where('estado','=','Activo')->get();
        
        return view("inventario.barriodos.edit",["ciudades"=>$ciudades,"barrios"=>$barrios]);
    }

    public function editmodal($id){
        $barrios = Barrio::findOrFail($id);


        return response()->json($barrios);
    }


        public function update(BarrioFormRequest $request,$id){

   $barrio=Barrio::findOrFail($id);
    $barrio->nombre=$request->get('nombre');
    $barrio->update();
    return Redirect::to('inventario/barriodos');


    }



      public function destroy($id){

        $barrio=Barrio::findOrFail($id);
        $barrio->estado='Inactivo';

        $barrio->update();
        return Redirect::to('inventario/barriodos');
    }
}

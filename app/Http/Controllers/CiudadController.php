<?php

namespace sistemaPractica\Http\Controllers;

use Illuminate\Http\Request;
use sistemaPractica\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaPractica\Http\Requests\CiudadFormRequest;
use sistemaPractica\Ciudad;
use sistemaPractica\Base;
use DB;

class CiudadController extends Controller
{
      public function __construct(){
        $this->middleware('auth');

    }

    public function index(){
    	 $ciudades=Ciudad::searchCiudades(Input::all(),Base::PAGINATE);

        return view('inventario.ciudad.index',["ciudades"=>$ciudades]);
    }

    public function create(){

            

    	return view("inventario.ciudad.create");

    }



    public function store(CiudadFormRequest $request){

    	$ciudad = new Ciudad;

    	$ciudad->nombre=$request->get('nombre');
        $ciudad->estado='Activo';

    	$ciudad->save();
    	return Redirect::to('inventario/ciudad');

    }

          public function destroy($id){

        $ciudad=Ciudad::findOrFail($id);
        $ciudad->estado='Inactivo';

        $ciudad->update();
        return Redirect::to('inventario/ciudad');
    }

}

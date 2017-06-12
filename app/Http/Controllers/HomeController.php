<?php

namespace sistemaPractica\Http\Controllers;

use Illuminate\Http\Request;


use sistemaPractica\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaPractica\Http\Requests\InmuebleFormRequest;
use sistemaPractica\Inmueble;
use sistemaPractica\Ciudad;
use sistemaPractica\Barrio;
use sistemaPractica\Base;
use Response;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inmuebles=Inmueble::searchInmuebles(Input::all(),Base::PAGINATE);

      $categorias=DB::table('categoria')->where('condicion','=','1')->get();
            $barrios=DB::table('barrio')->where('estado','=','Activo')->get();
            $ciudades=DB::table('ciudad')->where('estado','=','Activo')->get();

        return view('esquema.home',["inmuebles"=>$inmuebles,"categorias"=>$categorias,"barrios"=>$barrios,"ciudades"=>$ciudades]);
    }
    public function getBarrios(){

  $ciu_id=Input::get('ciu_id');
   $barrios = Barrio::where('idciudad','=',$ciu_id)->get();

   return Response::json($barrios);
}
   
     public function getBarriosCiu(){

  $ciu_id=Input::get('ciu_id');
   $barrios = Barrio::where('idciudad','=',$ciu_id)->get();

   return Response::json($barrios);
}
           public function show($id){
        
       
        $inmueble=Inmueble::findOrFail($id);
        $categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("esquema.show",["inmueble"=>$inmueble,"categorias"=>$categorias]);

           }

    
}

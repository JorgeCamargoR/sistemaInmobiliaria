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

class InmuebleController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');

    }


    public function index(){

    	/*if($request){
    		$query=trim($request->get('searchText'));
              $categorias=DB::table('categoria')->where('condicion','=','1')->get();


    		$articulos=DB::table('articulo as a')->join('categoria as c','a.idcategoria','=','c.idcategoria')->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagenPrincipal','a.estado','a.precio_venta')
           /* ->where('a.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orwhere('c.nombre','LIKE','%'.$query.'%')*/
         /*   ->orderBy('a.idarticulo','desc')
            ->paginate();
    		return view('almacen.articulo.index',["articulos"=>$articulos,"categorias"=>$categorias,"searchText"=>$query]);
    	}*/

        $inmuebles=Inmueble::searchInmuebles(Input::all(),Base::PAGINATE);

      $categorias=DB::table('categoria')->where('condicion','=','1')->get();
            $barrios=DB::table('barrio')->where('estado','=','Activo')->get();
            $ciudades=DB::table('ciudad')->where('estado','=','Activo')->get();

        return view('inventario.inmueble.index',["inmuebles"=>$inmuebles,"categorias"=>$categorias,"barrios"=>$barrios,"ciudades"=>$ciudades]);
   
    }

    public function create(){

    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();

        $ciudades=DB::table('ciudad')->where('estado','=','Activo')->get();
        $barrios = Barrio::all();

    	return view("inventario.inmueble.create",["categorias"=>$categorias,"ciudades"=>$ciudades,"barrios"=>$barrios]);
    }


    public function getBarrios(){

  $ciu_id=Input::get('ciu_id');
   $barrios = Barrio::where('idciudad','=',$ciu_id)->get();

   return Response::json($barrios);
}
   
     public function getBarriosCiu(){

  $ciu_id=Input::get('ciu_id');
   $barrios = Barrio::where('estado','=','Activo')->where('idciudad','=',$ciu_id)->get();

   return Response::json($barrios);
}

    public function store(InmuebleFormRequest $request){

    	$inmueble = new Inmueble;

    	$inmueble->idcategoria=$request->get('idcategoria');
    	$inmueble->codigo=$request->get('codigo');
    	$inmueble->nombre=$request->get('nombre');
        $inmueble->precio_venta=$request->get('precio_venta');
        $inmueble->idbarrio=$request->get('idbarrio');
        $inmueble->idciudad=$request->get('idciudad');
    	$inmueble->descripcion=$request->get('descripcion');
    	$inmueble->estado='Activo';

    	if(input::hasFile('imagenPrincipal')){
    		$file=Input::file('imagenPrincipal');
    		$file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
    	    $inmueble->imagenPrincipal=$file->getClientOriginalName();
    	}

        if(input::hasFile('imagen1')){
            $file=Input::file('imagen1');
            $file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
            $inmueble->imagen1=$file->getClientOriginalName();
        }
        if(input::hasFile('imagen2')){
            $file=Input::file('imagen2');
            $file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
            $inmueble->imagen2=$file->getClientOriginalName();
        }
        if(input::hasFile('imagen3')){
            $file=Input::file('imagen3');
            $file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
            $inmueble->imagen3=$file->getClientOriginalName();
        }

        if(input::hasFile('imagen4')){
            $file=Input::file('imagen4');
            $file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
            $inmueble->imagen4=$file->getClientOriginalName();
        }

    	$inmueble->save();
    	return Redirect::to('inventario/inmueble');

    }

    public function show($id){
        
       
        $inmueble=Inmueble::findOrFail($id);
        $categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("inventario.inmueble.show",["inmueble"=>$inmueble,"categorias"=>$categorias]);

           }


    public function edit($id){

    	$inmueble=Inmueble::findOrFail($id);
          $ciudades = Ciudad::all();
        $barrios = Barrio::all();

    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
	    return view("inventario.inmueble.edit",["inmueble"=>$inmueble,"categorias"=>$categorias,"ciudades"=>$ciudades,"barrios"=>$barrios]);
    }

    public function update(InmuebleFormRequest $request,$id){

    $inmueble=Inmueble::findOrFail($id);
     $inmueble->idcategoria=$request->get('idcategoria');
    	$inmueble->codigo=$request->get('codigo');
    	$inmueble->nombre=$request->get('nombre');
        $inmueble->estado=$request->get('estado');
        $inmueble->precio_venta=$request->get('precio_venta');
    	$inmueble->descripcion=$request->get('descripcion');
        $inmueble->idbarrio=$request->get('idbarrio');
        $inmueble->idciudad=$request->get('idciudad');

            if(input::hasFile('imagenPrincipal')){
            $file=Input::file('imagenPrincipal');
            $file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
            $inmueble->imagenPrincipal=$file->getClientOriginalName();
        }

        if(input::hasFile('imagen1')){
            $file=Input::file('imagen1');
            $file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
            $inmueble->imagen1=$file->getClientOriginalName();
        }
        if(input::hasFile('imagen2')){
            $file=Input::file('imagen2');
            $file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
            $inmueble->imagen2=$file->getClientOriginalName();
        }
        if(input::hasFile('imagen3')){
            $file=Input::file('imagen3');
            $file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
            $inmueble->imagen3=$file->getClientOriginalName();
        }

        if(input::hasFile('imagen4')){
            $file=Input::file('imagen4');
            $file->move(public_path().'/img/articulos/',$file->getClientOriginalName());
            $inmueble->imagen4=$file->getClientOriginalName();
        }

    	$inmueble->update();
       return Redirect::to('inventario/inmueble');

    }

    public function destroy($id){

    	$inmueble=Inmueble::findOrFail($id);
    	$inmueble->estado='Inactivo';
    	$inmueble->update();
    	return Redirect::to('inventario/inmueble');
    }
}

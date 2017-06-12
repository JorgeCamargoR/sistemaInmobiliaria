<?php

namespace sistemaPractica\Http\Controllers;

use Illuminate\Http\Request;

use sistemaPractica\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaPractica\Http\Requests\VentaFormRequest;
use sistemaPractica\Venta;
use sistemaPractica\DetalleVenta;

use DB;

use Carbon\Carbon; /*Zona horaria*/
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }

    public function index(Request $request)
    {
    	if($request)
         {
         	$query=trim($request->get('searchtext'));
         	$ventas=DB::table('venta as v')
         	->join('cliente as c','v.idcliente','=','c.idcliente')
         	->join('detalle_venta as dv','v.idventa','=','dv.idventa')
         	->select('v.idventa','v.fecha_hora','c.nombre','v.numero_factura','v.impuesto','v.estado','v.total_venta')
         	->where('v.numero_factura','LIKE','%'.$query.'%')
         	->orderBy('v.idventa','desc')
         	->groupBy('v.idventa','v.fecha_hora','c.nombre','v.numero_factura','v.impuesto','v.estado','v.total_venta')
         	->paginate(7);
         	return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
         }		
    }

    public function create(){
    	$clientes=DB::table('cliente')->get();
    	$articulo=DB::table('articulo as art')
    	->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),'art.idarticulo','art.stock','art.precio_venta')
    	->where('art.estado','=','Activo')
    	->where('art.stock','>','0')
    	->groupBy('articulo','art.idarticulo','art.stock','art.precio_venta')
    	->get();
    	return view("ventas.venta.create",["clientes"=>$clientes,"articulos"=>$articulo]);

    }

    public function store(VentaFormRequest $request)
    {
    	try{
    		DB::beginTransaction();
    		$venta=new Venta;
    		$venta->idcliente=$request->get('idcliente');
    		$venta->numero_factura=$request->get('numero_factura');
    		$venta->total_venta=$request->get('total_venta');

    		$mytime = Carbon::now('America/Bogota');
    		$venta->fecha_hora=$mytime->toDateTimeString();
    		$venta->impuesto='19';
    		$venta->estado='A';
    		$venta->save();

    		$idarticulo = $request->get('idarticulo');
    		$cantidad = $request->get('cantidad');
    		$descuento = $request->get('descuento');
    		$precio_venta = $request->get('precio_venta');
    		$cont = 0;

    		while($cont < count($idarticulo)){
    			$detalle = new DetalleVenta();
    			$detalle->idventa= $venta->idventa;
    			$detalle->idarticulo= $idarticulo[$cont];
    			$detalle->cantidad= $cantidad[$cont];
    			$detalle->descuento= $descuento[$cont];
    			$detalle->precio_venta= $precio_venta[$cont];
    			$detalle->save();
    			$cont=$cont+1;
    		}

    		DB::commit();
    	}catch(\Exception $e)
    	{
    		DB::rollback();
    	}
    	return Redirect::to('ventas/venta');
    }

    public function show($id){
      $venta=DB::table('venta as v')
      ->join('cliente as c','v.idcliente','=','c.idcliente')
      ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
      ->select('v.idventa','v.fecha_hora','c.nombre','c.idcliente','v.numero_factura','v.impuesto','v.estado','v.total_venta')
      ->where('v.idventa','=',$id)
      ->first();

      $detalles=DB::table('detalle_venta as d')
      ->join('articulo as a','d.idarticulo','=','a.idarticulo')
      ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
      ->where('d.idventa','=',$id)
      ->get();
      return view("ventas.venta.show",["venta"=>$venta,"detalles"=>$detalles]);
    }

    public function destroy($id)
    {
    	$venta=Venta::findOrFail($id);
    	$venta->Estado='C';
    	$venta->update();
    	return Redirect::to('ventas/venta');
    }
}























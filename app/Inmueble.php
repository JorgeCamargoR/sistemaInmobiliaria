<?php

namespace sistemaPractica;

use Illuminate\Database\Eloquent\Model;

class Inmueble extends Base
{
        protected $table='inmueble';

    protected $primaryKey='idinmueble';

    public $timestamps=false;

    protected $fillable = [

    'idcategoria',
    'codigo',
    'nombre',
    'stock',
    'descripcion',
    'precio_venta',
    'imagenPrincipal',
    'imagen1',
    'imagen2',
    'imagen3',
    'imagen4',
    'estado',
    'idbarrio',
    'idciudad',
    ];

    public static $filters = ['search','idcategoria','idinmueble','idbarrio','idciudad','estado'];

    public static function filterBySearch($q,$value)
    {
        $q->where('codigo','LIKE',"%$value%");
    }

    protected $guarded =[

    ];

}

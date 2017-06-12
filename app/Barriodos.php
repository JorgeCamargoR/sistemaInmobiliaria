<?php

namespace sistemaPractica;

use Illuminate\Database\Eloquent\Model;

class Barriodos extends Base
{
   protected $table='barrio';

    protected $primaryKey='idbarrio';

    public $timestamps=false;

    protected $fillable = [

    'idciudad',
    'nombre',
     'estado',
    ];

    public static $filters = ['search','idciudad'];

    public static function filterBySearch($q,$value)
    {
        $q->where('nombre','LIKE',"%$value%");
    }

    protected $guarded =[

    ];

    public static function barriosdos($id){
        return Barrio::where('idciudad','=',$id)
        ->get();
    }
}

<?php

namespace sistemaPractica;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Base
{
       protected $table='ciudad';

    protected $primaryKey='idciudad';

    public $timestamps=false;

    protected $fillable = [

     'nombre',
         'estado',

    ];

    public static $filters = ['search'];

    public static function filterBySearch($q,$value)
    {
        $q->where('nombre','LIKE',"%$value%");
    }

    protected $guarded =[

    ];
}

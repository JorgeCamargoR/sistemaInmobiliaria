<?php

namespace sistemaPractica;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
     protected $table='cliente';

    protected $primaryKey='idcliente';

    public $timestamps=false;

    protected $fillable = [

    'nombre',
    'tipo_documento',
    'num_documento',
    'direccion',
    'telefono',
    'email',
    'pais',
    'ciudad',
    'estado',
    ];

    protected $guarded =[

    ];
}

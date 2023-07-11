<?php

namespace Multipol;

use Illuminate\Database\Eloquent\Model;

class Escenario extends Model
{
    protected $table='escenario';

    protected $primaryKey='idescenarios';
    
    public $timestamps= false;

    protected $fillable=[
    	'titulo_corto',
    	'titulo_largo',
    	'peso',
    	'probabilidad',
    	'descripcion',
    	'condicion'

    ];
    protected $guarded=[


    ];
}

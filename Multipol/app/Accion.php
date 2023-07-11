<?php

namespace Multipol;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
   protected $table='accion';

    protected $primaryKey='idacciones';
    
    public $timestamps= false;

    protected $fillable=[
    	'titulo_corto',
    	'titulo_largo',
    	'descripcion',
    	'condicion'

    ];
    protected $guarded=[


    ];
}

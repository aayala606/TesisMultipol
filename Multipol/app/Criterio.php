<?php

namespace Multipol;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    protected $table='criterio';

    protected $primaryKey='idcriterios';
    
    public $timestamps= false;

    protected $fillable=[
    	'titulo_corto',
    	'titulo_largo',
    	'peso',
    	'descripcion',
    	'condicion'

    ];
    protected $guarded=[


    ];
}

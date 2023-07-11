<?php

namespace Multipol;

use Illuminate\Database\Eloquent\Model;

class Politica extends Model
{
   protected $table='politica';

    protected $primaryKey='idpoliticas';
    
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

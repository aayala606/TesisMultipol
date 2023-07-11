<?php

namespace Multipol;

use Illuminate\Database\Eloquent\Model;

class AccionCriterios extends Model
{
     protected $table='accion_criterio';

    protected $primaryKey='idacciones_criterios';

    protected $foreignKey='idcriterios';

    protected $foreignKey='idacciones';
    
    public $timestamps= false;

    protected $fillable=[
    	'peso',
    	'promedio_ponderados',
    	'mayor',
        'desviacion',
    	'condicion'

    ];
    protected $guarded=[


    ];
}

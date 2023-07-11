<?php

namespace Multipol\Http\Controllers;

use Illuminate\Http\Request;

use Multipol\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use Multipol\Http\Requests\AccionCriteriosFormRequest;

use Multipol\Criterios;
use Multipol\Accion;
use Multipol\AccionCriterios;

use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Collection;

class AccionCriteriosController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
               
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$accioncriterio=DB::table('accion_criterio as acci')
    		   ->join ('accion as a','a.idacciones','=','acci.idacciones_criterios')
    		   ->join ('criterio as c','c.idcriterios','=','acci.idacciones_criterios')
    		   ->select('a.titulo_corto as nombreaccion','c.titulo_corto as nombrecriterio','acci.peso','acci.promedio_ponderados','acci.mayor','acci.desviacion')
    		   	->where('acci.idacciones_criterios','LIKE','%'.$query.'%')
				->orderBy('acci.idacciones_criterios','asc')
				->paginate(7);
				return view('estudio.accionCriterio.index',["accioncriterio"=>$accioncriterio,"searchText"=>$query]);
		}
	}


   public function store(AccionCriterioFormRequest $request){

	$accioncriterio= new AccionCriterios;
    	$accioncriterio->titulo_corto=$request->get('peso');
    	$accioncriterio->titulo_largo=$request->get('promedio_ponderados');
    	$accioncriterio->descripcion=$request->get('mayor');
    		$accioncriterio->descripcion=$request->get('desviacion');
    	$accioncriterio->condicion='1';
    	$accioncriterio->save();
    	return Redirect::to('estudio/accionCriterio');

   }

public function edit($id){

return view("estudio.accionCriterio.edit",["accioncriterio"=>AccionCriterios::findOrFail($id)]);
    }
     public function destroy($id){

    		$accioncriterio=AccionCriterios::findOrFail($id);
    		$accioncriterio->estado='C';
    		$accioncriterio->update();
    		return Redirect::to('estudio/accionCriterio');
    }
}

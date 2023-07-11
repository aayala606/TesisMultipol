<?php

namespace Multipol\Http\Controllers;

use Illuminate\Http\Request;

use Multipol\Http\Requests;
use Multipol\Accion;

use Illuminate\Support\Facades\Redirect;

use Multipol\Http\Requests\AccionFormRequest;

use DB;

use Illuminate\Auth\Middleware\Authenticate;

class AccionController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request){

    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$accion=DB::table('accion')-> where('titulo_largo', 'LIKE', '%'.$query.'%')
				->where ('condicion','=','1')
				->orderBy('idacciones','desc')
				->paginate(7);
				return view('ingreso.accion.index',["accion"=>$accion, "searchText"=>$query]);
		}

    }

public function create(){

		return view("ingreso.accion.create");
    }


    public function store(AccionFormRequest $request){

    	$accion= new Accion;
    	$accion->titulo_corto=$request->get('titulo_corto');
    	$accion->titulo_largo=$request->get('titulo_largo');
    	$accion->descripcion=$request->get('descripcion');
    	$accion->condicion='1';
    	$accion->save();
    	return Redirect::to('ingreso/accion');
    }
    public function show($id){

return view("ingreso.accion.show",["accion"=>Accion::findOrFail($id)]);
    }
    public function edit($id){

return view("ingreso.accion.edit",["accion"=>Accion::findOrFail($id)]);
    }

    public function update(AccionFormRequest $request, $id)
    {

    	$accion= Accion::findOrFail($id);
    	$accion->titulo_corto=$request->get('titulo_corto');
    	$accion->titulo_largo=$request->get('titulo_largo');
    	$accion->descripcion=$request->get('descripcion');
    	$accion->condicion='1';
    	$accion->update();
    	return Redirect::to('ingreso/accion');
    		
    }

    public function destroy($id){

    		$accion=Accion::findOrFail($id);
    		$accion->condicion='0';
    		$accion->update();
    		return Redirect::to('ingreso/accion');
    }
}

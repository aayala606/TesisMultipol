<?php

namespace Multipol\Http\Controllers;

use Illuminate\Http\Request;

use Multipol\Http\Requests;

use Multipol\Escenario;

use Illuminate\Support\Facades\Redirect;

use Multipol\Http\Requests\EscenarioFormRequest;

use DB;

use Illuminate\Auth\Middleware\Authenticate;

class EscenarioController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request){

    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$escenario=DB::table('escenario')-> where('titulo_largo', 'LIKE', '%'.$query.'%')
				->where ('condicion','=','1')
				->orderBy('idescenarios','desc')
				->paginate(7);
				return view('ingreso.escenario.index',["escenario"=>$escenario, "searchText"=>$query]);
		}

    }

public function create(){

		return view("ingreso.escenario.create");
    }


    public function store(EscenarioFormRequest $request){

    	$escenario= new Escenario;
    	$escenario->titulo_corto=$request->get('titulo_corto');
    	$escenario->titulo_largo=$request->get('titulo_largo');
    	$escenario->peso=$request->get('peso');
    	$escenario->probabilidad=$request->get('probabilidad');
    	$escenario->descripcion=$request->get('descripcion');
    	$escenario->condicion='1';
    	$escenario->save();
    	return Redirect::to('ingreso/escenario');
    }
    public function show($id){

return view("ingreso.escenario.show",["escenario"=>Escenario::findOrFail($id)]);
    }
    public function edit($id){

return view("ingreso.escenario.edit",["escenario"=>Escenario::findOrFail($id)]);
    }

    public function update(EscenarioFormRequest $request, $id)
    {

    	$escenario= Escenario::findOrFail($id);
		$escenario->titulo_corto=$request->get('titulo_corto');
    	$escenario->titulo_largo=$request->get('titulo_largo');
    	$escenario->peso=$request->get('peso');
    	$escenario->probabilidad=$request->get('probabilidad');
    	$escenario->descripcion=$request->get('descripcion');
    	$escenario->update();
    	return Redirect::to('ingreso/escenario');
    		
    }

    public function destroy($id){

    		$escenario=Escenario::findOrFail($id);
    		$escenario->condicion='0';
    		$escenario->update();
    		return Redirect::to('ingreso/escenario');
    }
}

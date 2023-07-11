<?php

namespace Multipol\Http\Controllers;

use Illuminate\Http\Request;

use Multipol\Http\Requests;

use Multipol\Criterio;

use Illuminate\Support\Facades\Redirect;

use Multipol\Http\Requests\CriterioFormRequest;

use DB;

use Illuminate\Auth\Middleware\Authenticate;

class CriterioController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request){

    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$criterio=DB::table('criterio')-> where('titulo_largo', 'LIKE', '%'.$query.'%')
				->where ('condicion','=','1')
				->orderBy('idcriterios','desc')
				->paginate(7);
				return view('ingreso.criterio.index',["criterio"=>$criterio, "searchText"=>$query]);
		}

    }

public function create(){

		return view("ingreso.criterio.create");
    }


    public function store(CriterioFormRequest $request){

    	$criterio= new Criterio;
    	$criterio->titulo_corto=$request->get('titulo_corto');
    	$criterio->titulo_largo=$request->get('titulo_largo');
    	$criterio->peso=$request->get('peso');
    	$criterio->descripcion=$request->get('descripcion');
    	$criterio->condicion='1';
    	$criterio->save();
    	return Redirect::to('ingreso/criterio');
    }
    public function show($id){

return view("ingreso.criterio.show",["criterio"=>Criterio::findOrFail($id)]);
    }
    public function edit($id){

return view("ingreso.criterio.edit",["criterio"=>Criterio::findOrFail($id)]);
    }

    public function update(CriterioFormRequest $request, $id)
    {

    	$criterio= Criterio::findOrFail($id);
    	$criterio->titulo_corto=$request->get('titulo_corto');
    	$criterio->titulo_largo=$request->get('titulo_largo');
    	$criterio->peso=$request->get('peso');
    	$criterio->descripcion=$request->get('descripcion');
    	$criterio->update();
    	return Redirect::to('ingreso/criterio');
    		
    }

    public function destroy($id){

    		$criterio=Criterio::findOrFail($id);
    		$criterio->condicion='0';
    		$criterio->update();
    		return Redirect::to('ingreso/criterio');
    }

}

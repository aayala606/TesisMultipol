<?php

namespace Multipol\Http\Controllers;

use Illuminate\Http\Request;

use Multipol\Http\Requests;
use Multipol\Politica;

use Illuminate\Support\Facades\Redirect;

use Multipol\Http\Requests\PoliticaFormRequest;

use DB;

use Illuminate\Auth\Middleware\Authenticate;

class PoliticaController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request){

    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$politica=DB::table('politica')-> where('titulo_largo', 'LIKE', '%'.$query.'%')
				->where ('condicion','=','1')
				->orderBy('idpoliticas','desc')
				->paginate(7);
				return view('ingreso.politica.index',["politica"=>$politica, "searchText"=>$query]);
		}

    }

public function create(){

		return view("ingreso.politica.create");
    }


    public function store(PoliticaFormRequest $request){

    	$politica= new Politica;
    	$politica->titulo_corto=$request->get('titulo_corto');
    	$politica->titulo_largo=$request->get('titulo_largo');
    	$politica->peso=$request->get('peso');
    	$politica->descripcion=$request->get('descripcion');
    	$politica->condicion='1';
    	$politica->save();
    	return Redirect::to('ingreso/politica');
    }
    public function show($id){

return view("ingreso.politica.show",["politica"=>Politica::findOrFail($id)]);
    }
    public function edit($id){

return view("ingreso.politica.edit",["politica"=>Politica::findOrFail($id)]);
    }

    public function update(PoliticaFormRequest $request, $id)
    {

    	$politica= Politica::findOrFail($id);
    	$politica->titulo_corto=$request->get('titulo_corto');
    	$politica->titulo_largo=$request->get('titulo_largo');
    	$politica->peso=$request->get('peso');
    	$politica->descripcion=$request->get('descripcion');
    	$politica->update();
    	return Redirect::to('ingreso/politica');
    		
    }

    public function destroy($id){

    		$politica=Politica::findOrFail($id);
    		$politica->condicion='0';
    		$politica->update();
    		return Redirect::to('ingreso/politica');
    }
}

@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Editar Accion y Criterio: {{$accioncriterio->peso}} </h3>
	@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>

				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($accioncriterio,['method'=>'PATCH','route'=>['estudio.accionCriterio.update',$accioncriterio->idacciones_criterios]])!!}﻿

		{{Form::token()}}
		<div class="form-group">
			<label for="peso">peso</label>
			<input type="text" name="peso" class ="form-control" value="{{$accioncriterio->peso}}">
	      </div>
	
		<div class="form-group">
			
			<button class="btn btn-primary" type="submit"> Guardar </button>
			<button class= "btn btn-danger" type="reset"> Cancelar </button>
		</div>
		{!!Form::close()!!}

	</div>
</div>

@endsection
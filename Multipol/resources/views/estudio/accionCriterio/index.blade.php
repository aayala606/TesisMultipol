@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de Acciones y Criterios</h3>
		@include ('estudio.accionCriterio.search')
	</div>

	{{Form::Open(array('action'=>array('AccionCriteriosController@index',$accioncriterio->idacciones_criterios),'method'=>'POST'))}}
		
		<div class="form-group">
			<label for="peso">Peso</label>
			<input type="text" name="peso" class ="form-control" placeholder="Ingrese peso...">

		<div class="form-group">
			
			<button class= "btn btn-primary" type="submit">Guardar</button>
			<button class= "btn btn-danger" type="reset">Cancelar</button>
		</div>
	 {{Form::Close()}}

</div>
<div class="row">
	<div class="col-lg-12 col-md-12 colsm-12 col-xs-12">
	<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
			   <tr>
               <th  scope="col" colspan="3">datos</th> 
              </tr>
			</thead>
			<tbody>

			@foreach ($accioncriterio as $acio)

			 <th scope="col" rowspan="2">\</th>
				<tr>
              	    <td>{{$acio->nombrecriterio}}</td>
               	</tr>
               	 <tr>
               	     <td>{{$acio->nombreaccion}}</td>
               	     <td><input type="text" id="peso" style="color: #BDBDBD"></td>
               	 </tr>
               	 <td>
           <a href="{{URL::action('AccionCriteriosController@edit',$acio->idacciones_criterios)}}">
          <button class="btn btn-info">Editar</button></a>
	      <a href="" data-target= "#modal-delete-{{$acio->idacciones_criterios}}" data-toggle="modal"><button class ="btn btn-danger">Eliminar</button></a>
                 </td>
            
               	 @include ('estudio.accionCriterio.modal')
					@endforeach
			</tbody>
			 <tfoot>
             <tr>	
             <th scope="row">promedio</th>

                   <td></td>
              </tr>
              <tr>
              	<th scope="row">desvicion estandar</th>
              	 <td></td>
              </tr>
             </tfoot>	
		</table>
	</div>
	{{$accioncriterio->render()}}
	</div>
</div>

@endsection 
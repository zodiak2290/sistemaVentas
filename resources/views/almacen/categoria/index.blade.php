@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 cols-xs-12">
			<h3>Listado de Categorías <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('almacen.categoria.search')
		</div>
	</div>	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
							@foreach ($categorias as $categoria)
								<tr>
									<td>{{$categoria->idcategoria}}</td>
									<td>{{$categoria->nombre}}</td>
									<td>{{$categoria->descripcion}}</td>
									<th>
										<a href="{{URL::action('CategoriaController@edit',$categoria->idcategoria)}}"><button class="btn btn-info">Editar</button></a>
										<a href=""><button class="btn btn-danger">Eliminar</button></a>
									</th>
								</tr>
							@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
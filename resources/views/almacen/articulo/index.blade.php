@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 cols-xs-12">
			<h3>Listado de Artículos <a href="articulo/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('almacen.articulo.search')
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
							<th>Código</th>
							<th>Categoria</th>
							<th>Stock</th>
							<th>Imagen</th>
							<th>Estado</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
							@foreach ($articulos as $articulo)
								<tr>
									<td>{{$articulo->idarticulo}}</td>
									<td>{{$articulo->nombre}}</td>
									<td>{{$articulo->codigo}}</td>
									<td>{{$articulo->categoria}}</td>
									<td>{{$articulo->stock}}</td>
									<td>
										<img src="{{asset('img/articulos/'.$articulo->imagen)}}" alt="{{$articulo->nombre}}" height="100px" width="100px" class="img-rounded">
									</td>
									<td>{{$articulo->estado}}</td>
									<th>
										<a href="{{URL::action('ArticuloController@edit',$articulo->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
										<a href="" data-target="#modal-delete-{{$articulo->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
									</th>
								</tr>
								@include('almacen.articulo.modal')
							@endforeach
					</tbody>
				</table>
			</div>
			{{$articulos->render()}}
		</div>
	</div>
@endsection
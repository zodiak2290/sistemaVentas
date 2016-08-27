@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Articulo {{$articulo->nombre}}</h3>
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>
	{!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
		{{Form::token()}}
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control" placeholder="Nombre">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label form="categoria">Categoria</label>
				<select name="idcategoria" class="form-control">
					@foreach($categorias as $categoria)
						@if($categoria->idcategoria==$articulo->idcategoria)
							<option value="{{$categoria->idcategoria}}" selected>
								{{$categoria->nombre}}
							</option>
						@else
							<option value="{{$categoria->idcategoria}}">
								{{$categoria->nombre}}
							</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="codigo">Código</label>
				<input type="text" name="codigo"  required value="{{$articulo->codigo}}" class="form-control" placeholder="Código del articulo">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="stock">Stock</label>
				<input type="text" name="stock" required value="{{$articulo->stock}}" class="form-control" placeholder="Stock">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion"  value="{{$articulo->descripcion}}" class="form-control" placeholder="Descripción" required>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="imagen">Imagen</label>
				<input type="file" name="imagen"  class="form-control">
				@if (($articulo->imagen)!="")
					<img src="{{asset('img/articulos/'.$articulo->imagen)}}" alt="{{$articulo->nombre}}" height="100px" width="100px" class="img-thumbnail">
				@endif
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>

	{!!Form::close()!!}
@stop
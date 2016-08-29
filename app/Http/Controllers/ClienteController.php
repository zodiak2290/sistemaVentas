<?php

namespace Sistema\Http\Controllers;

use Illuminate\Http\Request;

use Sistema\Http\Requests;
use Sistema\Persona;
use Illuminate\Support\Facades\Redirect;
use Sistema\Http\Requests\PersonaFormRequest;
use DB;

class ClienteController extends Controller
{
public function __construct()
	{

	}

	public function index(Request $request)
	{
		if($request)
		{
			$query=trim($request->get('searchText'));
			$personas=DB::table('persona as a')
			->where('nombre','LIKE',"%".$query."%")
			->where('tipo_persona','=','Cliente')
			->orwhere('num_documento','LIKE',"%".$query."%")
			->where('tipo_persona','=','Cliente')
			->orderBy('idpersona','desc')
			->paginate(7);
			return view('ventas.cliente.index',["personas"=>$personas,"searchText"=>$query]);
		}

	}

	public function create()
	{	
		return view("ventas.cliente.create");
	}

	public function store(ArticuloFormRequest $request)
	{
		$persona=new Persona;
		$persona->tipo_persona='Cliente';
		$persona->tipo_documento=$request->get('tipo_documento');
		$persona->num_documento=$request->get('num_documento');
		$persona->nombre=$request->get('nombre');
		$persona->direccion=$request->get('direccion');
		$persona->telefono=$request->get('telefono');
		$persona->email=$request->get('email');
		$articulo->save();
		return Redirect::to('ventas/cliente');
	}
	public function show($id)
	{	
		return view("ventas.cliente.show",["personas"=>Persona::findOrFail($id)]);
	}

	public function edit($id)
	{
		$persona=Persona::findOrFail($id);
		return view("ventas.cliente.edit",["persona"=>$persona]);
	}

	public function update(ArticuloFormRequest $request,$id)
	{
		$persona=Articulo::findOrFail($id);
		$persona->tipo_documento=$request->get('tipo_documento');
		$persona->num_documento=$request->get('num_documento');
		$persona->nombre=$request->get('nombre');
		$persona->direccion=$request->get('direccion');
		$persona->telefono=$request->get('telefono');
		$persona->email=$request->get('email');
		$articulo->update();
		return Redirect::to('ventas/cliente');
	}

	public function destroy($id)
	{
		$persona=Persona::findOrFail($id);
		$persona->tipo_persona='Inactivo';
		$persona->update();
		return Redirect::to('ventas/cliente');
	}
}

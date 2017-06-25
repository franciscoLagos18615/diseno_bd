<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;
use App\Http\Requests\CatastrofeRequest;

class CatastrofeController extends Controller
{
	public function index()
	{
		$catastrofes = Catastrofe::orderBy('id','ASC')->paginate();
		//dd($products);
		return view('catastrofes.index', compact('catastrofes'));

	}

	public function show($id)
	{
		$catastrofe = Catastrofe::find($id);
		return view('catastrofes.show', compact('catastrofe'));
	}

	public function create()
	{
		return view('catastrofes.create');
	}

	public function store(CatastrofeRequest $request)
	{
		$catastrofe = new Catastrofe;

		$catastrofe->descripcion = $request->descripcion;
		$catastrofe->region = $request->region;
		$catastrofe->comuna = $request->comuna;
		$catastrofe->id_usuario = 2;

		$catastrofe->save();

		return redirect()->route('catastrofes.index')->with('info', 'La catastrofe fue actualizada');
	}
	

	public function edit($id)
	{
		$catastrofe = Catastrofe::find($id);
		return view('catastrofes.edit', compact('catastrofe'));
	}

	public function update(CatastrofeRequest $request, $id)
	{
		$catastrofe = Catastrofe::find($id);

		$catastrofe->descripcion = $request->descripcion;
		$catastrofe->region = $request->region;
		$catastrofe->comuna = $request->comuna;

		$catastrofe->save();		
		return redirect()->route('catastrofes.index')->with('info', 'La catastrofe fue actualizada');
	}

	public function destroy($id)
	{
		$product = Catastrofe::find($id);
		$product->delete();

		return back()->with('info', 'La catastrofe fue eliminada');
	}
}
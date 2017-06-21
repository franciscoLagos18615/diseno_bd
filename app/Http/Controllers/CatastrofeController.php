<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catastrofe;

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

	public function destroy($id)
	{
		$product = Catastrofe::find($id);
		$product->delete();

		return back()->with('info', 'El producto fue eliminado');
	}
}
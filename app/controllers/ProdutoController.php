<?php

class ProdutoController extends BaseController {

	public function getIndex($id = null)
	{
		if(empty($id))
			$id = Auth::User()->id;
		$usuario = User::find($id);
		$numProdutosTot = count(Produtos::where('user_id','=',$id)->get());
		$produtos = Produtos::where('user_id','=',$id)->paginate(10);
		
		return View::make('produtos.index', compact('produtos','numProdutosTot','usuario'));
	}

	public function getNovo()
	{
		$usuario = User::find(Auth::User()->id);
		$categorias = Categories::with('subcategories','subcategories.subcategories','subcategories.subcategories.subcategories')->where('parent_id','=',0)->whereNull('deleted_at')->orderBy('nome')->get();
		return View::make('produtos.form', compact('usuario','categorias'));
	}

	public function getEditar($id)
	{
		$usuario = User::find(Auth::User()->id);
		$categorias = Categories::with('subcategories','subcategories.subcategories','subcategories.subcategories.subcategories')->where('parent_id','=',0)->whereNull('deleted_at')->orderBy('nome')->get();
		$produto = Produtos::find($id);

		return View::make('produtos.form', compact('usuario','produto','categorias'));
	}

	public function postSave()
	{
		extract(Input::all());

		print_r(Input::all());exit;

		return Redirect::to('produto/'.$id)->with('success', array(1 => 'Produto Atualizado!'));
	}
}

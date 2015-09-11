<?php

class ProdutoController extends BaseController {

	public function getIndex($id = null)
	{
		$hojeDB = date('Y-m-d');
		if(empty($id))
			$id = Auth::User()->id;
		$usuario = User::find($id);
		if(empty($usuario->data_vencimento) || $usuario->data_vencimento <= $hojeDB){
			return Redirect::to('meusdados')->with('danger', array(1 => 'Antes de atualizar a sua lista de produtos, você deve preencher todos os seus dados pessoais e solicitar para o admin um plano de pacote para utilizar o sistema!'));
		}
		$numProdutosTot = count(Produtos::where('user_id','=',$id)->get());
		$produtos = Produtos::where('user_id','=',$id)->paginate(10);
		
		return View::make('produtos.index', compact('produtos','numProdutosTot','usuario'));
	}

	public function getNovo()
	{
		$usuario = User::find(Auth::User()->id);
		$categorias = Categories::with('subcategories','subcategories.subcategories','subcategories.subcategories.subcategories')->where('parent_id','=',0)->whereNull('deleted_at')->orderBy('nome')->get();
		$categoriasArray = array();
		return View::make('produtos.form', compact('usuario','categorias','categoriasArray'));
	}

	public function getEditar($id)
	{
		$usuario = User::find(Auth::User()->id);
		$categorias = Categories::with('subcategories','subcategories.subcategories','subcategories.subcategories.subcategories')->where('parent_id','=',0)->whereNull('deleted_at')->orderBy('nome')->get();
		$produto = Produtos::find($id);
		// echo "<pre>";print_r($produto->producttocategory->toarray());exit;
		$categoriasArray = array();
		foreach($produto->producttocategory->toarray() as $categoriasProduto){
			$categoriasArray[] = $categoriasProduto["categories_id"];
		}
		// print_r($categoriasArray);exit;
		return View::make('produtos.form', compact('usuario','produto','categorias','categoriasArray'));
	}

	public function postSave()
	{
		extract(Input::all());

		if(isset($id) && !empty($id)){
			$produto = Produtos::find($id);
		} else {
			$produto = new Produtos;
			$produto->user_id = Auth::User()->id;
		}
		$produto->nome = $nome;
		$produto->descricao = $descricao;
		$produto->preco = $preco;
		$produto->quantidade = $quantidade;
		$produto->cor = $cor;
		$produto->modelo = $modelo;
		$produto->peso = $peso;
		$produto->garantia = $garantia;
		$produto->status = $status;
		$produto->save();

		$producttocategory = Productocategory::where('produtos_id','=',$produto->id)->delete();
		foreach($categories_id as $id){
			$producttocategory = new Productocategory;
			$producttocategory->produtos_id = $produto->id;
			$producttocategory->categories_id = $id;
			$producttocategory->save();
		}

		return Redirect::to('produto/editar/'.$produto->id)->with('success', array(1 => 'Produto Atualizado!'));
	}
}

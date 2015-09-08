<?php

class CategoriasController extends BaseController {

	public function getIndex()
	{
		$categories = Categories::where('parent_id','=',0)->orderBy('nome')->get();
		$parent_id = 0;
		return View::make('adm.categoria.index', compact('categories','parent_id'));
	}

	public function postSave()
	{
		$input = Input::all();
		foreach($input as $key => $value){
			$$key = $value;
		}

		$category = new Categories();
		$category->parent_id = $parent_id;
		$category->nome = $nome;
		$category->created_at = date('Y-m-d H:i:s');
		$category->updated_at = date('Y-m-d H:i:s');
		$category->save();
		if($category->parent_id == 0){
			return Redirect::to('categorias')->with('success', array(1 => 'Categoria Cadastrada com sucesso!'));
		} else {
			return Redirect::to('categorias/subcategorias/'.$category->parent_id)->with('success', array(1 => 'Sub-Categoria Cadastrada com sucesso!'));
		}
	}

	public function getSubcategorias($id)
	{
		$category = Categories::find($id);
		$categories = $category->subcategories;
		$parent_id = $category->id;
		return View::make('adm.categoria.index', compact('categories','parent_id','category'));
	}

	public function getDelete($id)
	{
		$category = Categories::find($id);
		$parent_id = $category->parent_id;
		$category->delete();
		if($parent_id == 0){
			return Redirect::to('categorias')->with('success', array(1 => 'Categoria Deletada com sucesso!'));
		} else {
			return Redirect::to('categorias/subcategorias/'.$parent_id)->with('success', array(1 => 'Sub-Categoria Deletada com sucesso!'));
		}	
	}

	public function getSolicitarCategoria()
	{
		return View::make('adm.categoria.solicitar_categoria');
	}

	public function postSolicitarCategoria()
	{
		extract(Input::all());

		$solicitarcategoria = new solicitarcategoria();
		$solicitarcategoria->nome_categoria = $nome_categoria;
		$solicitarcategoria->observacao = $observacao;
		$solicitarcategoria->status = 0;
		$solicitarcategoria->created_at = date('Y-m-d H:i:s');
		$solicitarcategoria->updated_at = date('Y-m-d H:i:s');
		$solicitarcategoria->save();

		return Redirect::to('categorias/solicitar-categoria')->with('success', array(1 => 'Mensagem enviada para o administrador do sistema!'));
	}

	public function getCategoriasSolicitadas()
	{
		$categoriasSolicitadas = Solicitarcategoria::orderBy('created_at','DESC')->get();
		return View::make('adm.categoria.categorias_solicitadas',compact('categoriasSolicitadas'));
	}

	public function postCategoriasSolicitadas()
	{
		extract(Input::all());
		
		if(isset($categoriasSolicitadas) && !empty($categoriasSolicitadas)){
			foreach ($categoriasSolicitadas as $id) {
				$solicitarcategoria = Solicitarcategoria::find($id);
				$solicitarcategoria->status = $status;
				$solicitarcategoria->updated_at = date('Y-m-d H:i:s');
				$solicitarcategoria->save();
			}
			return Redirect::to('categorias/categorias-solicitadas')->with('success', array(1 => 'Solicitações atualizadas!'));
		} else {
			return Redirect::to('categorias/categorias-solicitadas')->with('danger', array(1 => 'Você deve selecionar ao menos uma solicitação para atualizar!'));
		}

		
	}

}
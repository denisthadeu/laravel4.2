<?php

class CategoriasController extends BaseController {

	public function getIndex()
	{
		$categories = Categories::all();
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
			return Redirect::to('categorias/'.$category->parent_id)->with('success', array(1 => 'Sub-Categoria Cadastrada com sucesso!'));
		}
	}

	public function getSubcategorias($id)
	{
		$category = Categories::find($id);
		$categories = $category->subcategories;
		$parent_id = $category->id;
		return View::make('adm.categoria.index', compact('categories','parent_id','category'));
	}

}

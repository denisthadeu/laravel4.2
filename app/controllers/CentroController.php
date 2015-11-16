<?php

class CentroController extends BaseController {

	public function getIndex()
	{
		$menu = 1;
		$centros = Centros::orderBy('nome')->get();
		return View::make('adm.centro.index', compact('centros', 'menu'));
	}

	public function getCentro($id = null)
	{
		$menu = 2;
		$centro = Centros::find($id);
		return View::make('adm.centro.centro', compact('centro', 'menu'));
	}

	public function getCadastroGeral($id = null)
	{
		$menu = 2;
		$centro = Centros::find($id);

		$pacotes = Pacotes::where('centro_id','=',$id)->get();
		$ruas = Ruas::where('centro_id','=',$id)->get();
		$categorias = Categories::select('categories.*')
						->join('user_categorias', 'categories.id', '=', 'user_categorias.categories_id')
						->join('user', 'user.id', '=', 'user_categorias.user_id')
						->where('parent_id','=',0)
						->where('user.centro_id','=',$id)
						->where('user.status','=',1)
						->whereNull('categories.deleted_at')
						->groupBy('categories.id')
						->orderBy('categories.nome')
						->get();

		return View::make('adm.centro.cadastros', compact('pacotes', 'ruas', 'categorias', 'centro', 'menu'));
	}

	public function postSave()
	{	
		extract(Input::all());

		$Centros = new Centros();
		$Centros->nome = $nome;
		$Centros->created_at = date('Y-m-d H:i:s');
		$Centros->updated_at = date('Y-m-d H:i:s');
		$Centros->save();
		return Redirect::to('centro')->with('success', array(1 => 'Centro Comercial Cadastrado com sucesso!'));
	}

	public function getRuas($id)
	{
		$centro = Centros::find($id);
		$ruas = $centro->ruas;
		return View::make('adm.centro.ruas', compact('centro','ruas'));
	}

	public function postRuas()
	{
		extract(Input::all());
		
		$rua = new Ruas();
		$rua->nome = $nome;
		$rua->centro_id  = $centro_id;
		$rua->created_at = date('Y-m-d H:i:s');
		$rua->updated_at = date('Y-m-d H:i:s');
		$rua->save();
		return Redirect::to('centro/cadastro-geral/'.$rua->centro_id)->with('success', array(1 => 'Rua Cadastrada com sucesso!'));
	}

	public function getOptionRuas($id){
		$option = '';
		$ruas = Ruas::where('centro_id','=',$id)->orderBy('nome')->get();
		foreach ($ruas as $rua) {
			$option .= '<option value="'.$rua->id.'">'.$rua->nome.'</option>';
		}
		return $option;
	}
}

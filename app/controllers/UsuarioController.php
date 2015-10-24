<?php

class UsuarioController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$usuarios    = User::all();
		$numUsersTot = count($usuarios);
		$pacotes = Pacotes::all();
		$pagination  = (Input::has('pagination')) ? Input::get('pagination') : 10;
		$usuarios = User::select('user.*', 'ruas.nome as rua')->leftJoin('ruas', 'ruas.id', '=', 'user.rua_id');
		
		if(Input::has('nome') && !empty(Input::get('nome'))){
			$usuarios = $usuarios->where('user.nome','like','%'.Input::get('nome').'%')->orwhere('user.sobrenome','like','%'.Input::get('nome').'%')->orwhere('user.email','like','%'.Input::get('nome').'%')->orwhere('ruas.nome','like','%'.Input::get('nome').'%');
		}
		
		if(Input::has('pacote') && !empty(Input::get('pacote'))){
			$usuarios = $usuarios->where('user.pacote_id','=',Input::get('pacote'));
		}
		$usuarios = $usuarios->paginate($pagination);

		return View::make('adm.usuario.index', compact('numUsersTot','usuarios','pacotes'));
	}

	public function getSolicitacaoCliente()
	{
		$solicitacoes = Solicitarplano::OrderBy('created_at','desc')->get();
		return View::make('adm.usuario.solicitacaocliente', compact('solicitacoes'));
	}

	public function postSolicitacaoCliente()
	{
		extract(Input::all());

		if(isset($solicitacoes) && !empty($solicitacoes)){
			foreach ($solicitacoes as $id) {
				$Solicitarplano = Solicitarplano::find($id);
				$Solicitarplano->status = $status;
				$Solicitarplano->updated_at = date('Y-m-d H:i:s');
				$Solicitarplano->save();
			}
			return Redirect::to('usuario/solicitacao-cliente')->with('success', array(1 => 'Solicitações atualizadas!'));
		} else {
			return Redirect::to('usuario/solicitacao-cliente')->with('danger', array(1 => 'Você deve selecionar ao menos uma solicitação para atualizar!'));
		}
	}

	public function getCategoriesUser($id)
	{
		$usuario = User::find($id);
		$categorias = Categories::select('categories.*', 'user_categorias.categories_id')
						->leftJoin('user_categorias', function($join) use($id)
				        {
				            $join->on('categories.id', '=', 'user_categorias.categories_id')->where('user_categorias.user_id', '=', $id);
				        })
						->where('parent_id','=',0)
						->whereNull('categories.deleted_at')
						->orderBy('categories.nome')
						->get();
						//$queries = DB::getQueryLog();
						//$last_query = end($queries);
						//echo '<pre>';print_r($last_query) ;exit;

		return View::make('adm.usuario.associate_category', compact('categorias', 'usuario'));
	}

	public function postSaveCategoriesUser()
	{
		extract(Input::all());
		//echo '<pre>';print_r($categorias) ;exit;
		UserCategorias::where('user_id', '=', $id_user)->delete();
		if(isset($categorias)){
			foreach ($categorias as $id_categoria) {
				UserCategorias::insert(
				    array('user_id' => $id_user, 'categories_id' => $id_categoria)
				);
			}
		}

		return Redirect::to('usuario/categories-user/'.$id_user);
	}
}
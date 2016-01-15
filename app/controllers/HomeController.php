<?php

class HomeController extends BaseController {

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

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function getIndex()
	{
		if(Auth::User()->perfil == 2){
			
		}
		
		$categoriasSolicitadas = count(Solicitarcategoria::where('status','=',0)->get());
		$solicitacoes = count(Solicitarplano::where('status','=',0)->get());
		$produtosAtivos = count(Produtos::where('status','=',1)->get());
		$clientes = count(User::all());
		$meusProdutos = count(Produtos::where('user_id','=',Auth::User()->id)->get());
		$meusProdutos = count(Produtos::where('user_id','=',Auth::User()->id)->get());
		//return View::make('home.index',compact('categoriasSolicitadas','solicitacoes','produtosAtivos','clientes','meusProdutos','menu'));
		return Redirect::to('meusdados');
	}

	public function getHome()
	{
		$hojeDB = date('Y-m-d');
		//$categorias = Categories::with('subcategories','subcategories.subcategories','subcategories.subcategories.subcategories')->where('parent_id','=',0)->whereNull('deleted_at')->orderBy('nome')->get();
		//$produtos = Produtos::Where('status','=',1);

		if(Input::has('search')){
			$search = Input::get('search');
			$centros = Centros::where('nome','like','%'.$search.'%')->with('ruas')->orderBy('nome')->get();
		} else {
			$centros = Centros::with('ruas')->orderBy('nome')->get();
		}

		$centro = (Input::has('centro')) ? Input::get('centro') : 0;

		return View::make('home.home',compact('categorias','produtos','centros'));
	}

	public function getEstabelecimento($id, $category = null)
	{
		$hoje = date('Y-m-d');
		$categorias = Categories::where('centro_id','=',$id)/*->where('status','=',1)*/->whereNull('deleted_at')->orderBy('nome')->get();
		$centro = Centros::find($id);

		$imagem = null;
		$categorySel = $topEstabelecimentos = $estabelecimentos = null;
		$categorySel = Categories::find($category);
		
		if($category || !empty(Input::get('search'))){
			$imagem = CategoriasImagem::where('categoria_id', '=', $category)->first();
			$estabelecimentos = User::select('user.id', 'user.company_name', 'user.company_numero', 'user.company_loja', 'user.company_andar', 'ruas.nome as rua')
							->join('ruas', 'user.rua_id', '=', 'ruas.id')
							->join('user_categorias', 'user.id', '=', 'user_categorias.user_id')
							->where('user.status','=',1)
							->where('user.perfil','=',2)
							->where('user.centro_id','=',$id)
							->where('user.data_vencimento','>=',"'$hoje'");
			if(!empty(Input::get('search'))){
				$estabelecimentos = $estabelecimentos->where('user.company_tags','like','%'.Input::get('search').'%');
			}
			if($category){
				$estabelecimentos = $estabelecimentos->where('user_categorias.categories_id','=',$category);
			}
			if(!empty(Input::get('search'))){
				$estabelecimentos = $estabelecimentos->orwhere('user.company_name','like','%'.Input::get('search').'%')
							->where('user.status','=',1)
							->where('user.perfil','=',2)
							->where('user.centro_id','=',$id)
							->where('user.data_vencimento','>=',"'$hoje'");
				if($category){
					$estabelecimentos = $estabelecimentos->where('user_categorias.categories_id','=',$category);
				}
			}

			$topEstabelecimentos = User::select('user.id', 'user.company_name', 'user.company_numero', 'user.company_loja', 'user.company_andar', 'ruas.nome as rua')
							->join('ruas', 'user.rua_id', '=', 'ruas.id')
							->join('user_categorias', 'user.id', '=', 'user_categorias.user_id')
							->where('user.status','=',1)
							->where('user.perfil','=',2)
							->where('user.centro_id','=',$id)
							->where('user.data_vencimento','>=',"'$hoje'")
							->where('user.favorito','=',1);
			if(!empty(Input::get('search'))){
				$topEstabelecimentos = $topEstabelecimentos->where('user.company_tags','like','%'.Input::get('search').'%');
			}
			if($category){
				$topEstabelecimentos = $topEstabelecimentos->where('user_categorias.categories_id','=',$category);
			}
			if(!empty(Input::get('search'))){
				$topEstabelecimentos = $topEstabelecimentos->orwhere('user.company_name','like','%'.Input::get('search').'%')
							->where('user.status','=',1)
							->where('user.favorito','=',1)
							->where('user.perfil','=',2)
							->where('user.centro_id','=',$id)
							->where('user.data_vencimento','>=',"'$hoje'");
				if($category){
					$topEstabelecimentos = $topEstabelecimentos->where('user_categorias.categories_id','=',$category);
				}
			}
			$topEstabelecimentos = $topEstabelecimentos->groupBy('user.id');

			if(empty($imagem)){
				$category = Categories::where('nome','like','%'.Input::get('search').'%' )->first();
				if(!empty($category)){
					$imagem = CategoriasImagem::where('categoria_id', '=', $category->id)->first();
				}
			}

			$parametroLimite = null;
			$parametro = Texto::where('titulo','=','limiteTopEstabelecimentos')->first();
			if($parametro != null){
				$parametroLimite = $parametro->descricao;
			} else {
				$parametroLimite = 5;
			}


			$estabelecimentos = $estabelecimentos->groupBy('user.id');

            $topEstabelecimentos = $topEstabelecimentos->groupBy('user.id')->take($parametroLimite)->get();
			$estabelecimentos = $estabelecimentos->orderBy('ruas.nome', 'user.company_numero', 'user.company_name')->get();
			
		}
		
		return View::make('home.estabelecimento',compact('id','categorias','estabelecimentos','categorySel', 'imagem','topEstabelecimentos','centro'));
	}

	public function getProduto($id)
	{
		$produto = Produtos::find($id);
		return View::make('home.produto',compact('produto'));
	}

	public function getQuemSomos()
	{
		$texto = Texto::where('titulo','=','quemSomos')->first();
		return View::make('home.quem_somos',compact('texto'));
	}

	public function getFaleConosco()
	{
		$texto = Texto::where('titulo','=','faleConosco')->first();
		return View::make('home.fale_conosco',compact('texto'));
	}

	public function getTermosUso()
	{
		$texto = Texto::where('titulo','=','termosUso')->first();
		return View::make('home.termos_uso',compact('texto'));
	}

	public function postFaleConosco()
	{
		extract(Input::All());

		$messageData = array(
	        'nome' => $nome,
	        'email' => $email,
	        'msg' => $mensagem,
	        'assunto' => $assunto
	    );

	    Mail::send('email.contato', $messageData, function ($message) Use ($messageData) {
	        $message->from("contato@pontodainformacao.com.br", "ADM");
	        $message->bcc("contato@pontodainformacao.com.br", "ADM");
	        $message->to('denis.baptista91@gmail.com','Ponto da Informacao')->subject($messageData["assunto"]);
	    });

	    return Redirect::to('home/fale-conosco?success=1');
	}

	public function postAutocomplete()
	{
		extract(Input::All());
		$array = array();
		$tags = User::select('company_name', 'company_tags')->get();
		// $tags = User::select('company_name', 'company_tags')->where('company_name', 'LIKE', "%$search%")->orWhere('company_tags', 'LIKE', "%$search%")->get();
		foreach ($tags as $key => $value) {
			if(!in_array($value['company_name'], $array))
				$arrayT[] = $value['company_name'];

			$ex = explode(',', $value['company_tags']);
			foreach ($ex as $k => $v) {
				if(!in_array($v, $array))
					$arrayT[] = trim($v);
			}
		}

		foreach ($arrayT as $value) {
			if(stripos($value, $search) !== false)
				$array[] = $value;
		}
		// print_r($array);
		return json_encode($array);
	}
}

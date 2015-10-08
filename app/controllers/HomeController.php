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
		$categoriasSolicitadas = count(Solicitarcategoria::where('status','=',0)->get());
		$solicitacoes = count(Solicitarplano::where('status','=',0)->get());
		$produtosAtivos = count(Produtos::where('status','=',1)->get());
		$clientes = count(User::all());
		$meusProdutos = count(Produtos::where('user_id','=',Auth::User()->id)->get());
		return View::make('home.index',compact('categoriasSolicitadas','solicitacoes','produtosAtivos','clientes','meusProdutos'));
	}

	public function getHome()
	{
		$hojeDB = date('Y-m-d');
		$categorias = Categories::with('subcategories','subcategories.subcategories','subcategories.subcategories.subcategories')->where('parent_id','=',0)->whereNull('deleted_at')->orderBy('nome')->get();
		$produtos = Produtos::Where('status','=',1);

		$centros = Centros::with('ruas')->orderBy('nome')->get();
		$centro = (Input::has('centro')) ? Input::get('centro') : 0;
		$rua = (Input::has('rua')) ? Input::get('rua') : 0;

		$produtos = $produtos->whereHas('user',function($query) use($hojeDB,$centro,$rua){
			$query->where('data_vencimento', '>=', $hojeDB);
			if(!empty($centro)){
				$query->where('centro_id', '=', $centro);
			}
			if(!empty($rua)){
				$query->where('rua_id', '=', $rua);
			}
		});
		$category = 0;
		if(Input::has('category')){
			$category = Input::get('category');
			$produtos = $produtos->whereHas('producttocategory',function($query) use($category){
				$query->where('categories_id', '=', $category);
			});
		}

		if(Input::has('search')){
			$search = Input::get('search');
			$produtos = $produtos->where('nome','like','%'.$search.'%')->orWhere('descricao','like','%'.$search.'%')->Where('status','=',1);

			if(!empty($category)){
				$produtos = $produtos->whereHas('producttocategory',function($query) use($category){
					$query->where('categories_id', '=', $category);
				});
			}
			$produtos = $produtos->whereHas('user',function($query) use($hojeDB,$centro,$rua){
				$query->where('data_vencimento', '>=', $hojeDB);
				if(!empty($centro)){
					$query->where('centro_id', '=', $centro);
				}
				if(!empty($rua)){
					$query->where('rua_id', '=', $rua);
				}
			});
		}

		$produtos = $produtos->paginate(20);
		// $queries = DB::getQueryLog();
		// $last_query = end($queries);
		// echo '<pre>';print_r($last_query) ;exit;
		return View::make('home.home',compact('categorias','produtos','centros'));
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
}

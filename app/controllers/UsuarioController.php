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
		$pagination  = (Input::has('pagination')) ? Input::get('pagination') : 10;
		$nome  = (Input::has('nome')) ? Input::get('nome') : '';
		$usuarios 	 = User::where('nome','like','%'.$nome.'%')->orwhere('sobrenome','like','%'.$nome.'%')->orwhere('email','like','%'.$nome.'%')->paginate($pagination);

		return View::make('adm.usuario.index', compact('numUsersTot','usuarios'));
	}

}

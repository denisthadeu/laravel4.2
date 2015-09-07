<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// return View::make('hello');
	if (Auth::check())
	{
	    return Redirect::to('home');
	} else {
		return Redirect::to('id/sign-in');
	}
	
});
Route::controller('home','HomeController');

Route::controller('id', 'IdController');
Route::controller('usuario', 'UsuarioController');
Route::controller('categorias', 'CategoriasController');
Route::controller('centro', 'CentroController');
Route::controller('pacotes', 'PacotesController');
Route::get('meusdados/{id}', 'MeusDadosController@getIndex');
Route::resource('meusdados/alterar-pacote', 'MeusdadosController@getAlterarPacote');
Route::resource('meusdados/solicitar-pacote', 'MeusdadosController@getSolicitarPacote');
Route::controller('meusdados', 'MeusdadosController');
Route::controller('produto', 'ProdutoController');

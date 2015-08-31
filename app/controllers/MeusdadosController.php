<?php

class MeusdadosController extends BaseController {

	public function getIndex()
	{
		$user = Centros::find(Auth::User()->id);
		return View::make('meusdados.index', compact('user'));
	}

	public function postSave()
	{
		extract(Input::all());
	}

}

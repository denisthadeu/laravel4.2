<?php

class PacotesController extends BaseController {

	public function getIndex()
	{
		$pacotes = pacotes::orderBy('nome')->get();
		return View::make('adm.pacote.index', compact('pacotes'));
	}

	public function postSave()
	{	
		extract(Input::all());

		$pacotes = new pacotes();
		$pacotes->nome = $nome;
		$pacotes->valor = $valor;
		$pacotes->vezes = $vezes;
		$pacotes->valido_por = $valido_por;
		$pacotes->created_at = date('Y-m-d H:i:s');
		$pacotes->updated_at = date('Y-m-d H:i:s');
		$pacotes->save();
		return Redirect::to('pacotes')->with('success', array(1 => 'Pacote Cadastrado com sucesso!'));
	}

}

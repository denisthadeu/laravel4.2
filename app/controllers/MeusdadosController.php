<?php

class MeusdadosController extends BaseController {

	public function getIndex($id = null)
	{
		if(empty($id))
			$id = Auth::User()->id;
		$user = User::find($id);
		$centros = Centros::OrderBy('nome')->get();
		$ruas = '';
		if(!empty($user->centro_id)){
			$ruas = Ruas::where('centro_id','=',$user->centro_id)->OrderBy('nome')->get();
		}
		$pacotes = Pacotes::OrderBy('nome')->get();
		$hoje = date('d/m/Y');
		return View::make('meusdados.index', compact('user','centros','ruas','id','pacotes','hoje'));
	}

	public function postSave()
	{
		extract(Input::all());

		$user = User::find($id);
		$user->nome = $nome;
		$user->sobrenome = $sobrenome;
		$user->email = $email;
		if(isset($senha) && !empty($senha) && isset($senha_confirma) && $senha_confirma == $senha){
			$user->password = Hash::make($senha);
		} 
		$user->cpf = $cpf;
		$user->telefone = $telefone;
		$user->celular = $celular;
		$user->company_name = $nome_company;
		$user->centro_id = $centro;
		$user->rua_id = $rua;
		$user->company_numero = $numero_company;
		$user->company_loja = $loja_company;
		$user->company_andar = $andar_company;
		$user->company_email = $email_company;
		$user->company_site = $site_company;
		$user->company_telefone = $telefone_company;
		$user->company_tags = $tags_company;
		$user->save();

		return Redirect::to('meusdados/'.$id)->with('success', array(1 => 'Dados Atualizados!'));
	}

	public function getAlterarPacote()
	{
		extract(Input::all());
		
		$user = User::find($id);
		$user->pacote_id = $pacote;
		$user->data_vencimento = Formatter::stringToDate($data_vencimento);

		$user->save();

		return Redirect::to('meusdados/'.$id)->with('success', array(1 => 'Pacote Atualizado!'));
	}

}

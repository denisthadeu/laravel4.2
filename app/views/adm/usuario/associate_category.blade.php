@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{URL::to("home")}}">Painel De Controle</a></li>
    <li><a href="{{URL::to("usuario")}}">Usuários</a></li>
    <li class="active">Associação Categoria</li>
</ul>
<!-- END BREADCRUMB -->
<!--<pre>{{print_r($categorias)}}</pre>-->
<form action="{{URL::to("usuario/save-categories-user")}}" method="post" class="form-horizontal">
	<div class="panel panel-default">
	    <div class="panel-heading">                                
	        <h3 class="panel-title">Associação Categoria</h3>
	    </div>
	    <div class="panel-body">
			<div class="col-xs-12">
				<div class="form-group">
					@foreach($categorias as $categoria)
					<div class="col-xs-3 push-down-10">
						<div class="input-group">
							<div class="input-group-addon">
								<input id="{{$categoria->id}}" type="checkbox" name="categorias[]" value="{{$categoria->id}}" {{ !empty($categoria->categories_id) ? 'checked' : '' }}/>
							</div>
							<label class="btn btn-default col-xs-12" style="text-align: left;" for="{{$categoria->id}}">{{$categoria->nome}}</label>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="panel-footer text-right">
			<input type="hidden" name="id_user" value="{{$usuario->id}}" />
			<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
		</div>
	</div>
</form>
@stop
@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li><a href="{{URL::to("produto")}}">Meus produtos</a></li>
    <li class="active">Novo Produto</li>
</ul>
<!-- END BREADCRUMB -->    
<?php 
function categoryRecursive($category, $titulo){
    $option = '';
    if($category->totSubCategories() > 0){
        $subCategory = $category->subcategories;
        foreach($subCategory as $sub){
            $newTitlo = $titulo.' -> '.$sub->nome;
            $option .= '<option value="'.$sub->id.'">'.$newTitlo.'</option>';
            $option .= categoryRecursive($sub,$newTitlo);
        }
    }
    return $option;
}
?>    

<script type="text/javascript">
    $(function() {
        $('#myModal').modal();
    });
</script>       
<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="glyphicon glyphicon-th"></span> Produto</h2>
</div>
<!-- END PAGE TITLE -->                   
<!-- PAGE CONTENT WRAPPER -->
<form action="{{URL::to("produto/save")}}" method="post">
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">                            
                        <div class="tocify-content">
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Nome*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="nome" placeholder="Nome" class="form-control" value="{{$produto->nome or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Descrição*
                                    </div>
                                    <div class="col-md-9">
                                        <textarea rows="5" name="descricao" id="descricao" placeholder="Descrição do produto" class="form-control">{{$produto->descricao or ''}}</textarea>
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Preço*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="preco" placeholder="Preço" class="form-control" value="{{$produto->preco or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Quantidade*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="quantidade" placeholder="Quantidade" id="quantidade" class="form-control" value="{{$produto->quantidade or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Cor
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="cor" placeholder="Cor" class="form-control" id="cor" value="{{$produto->cor or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Modelo
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="modelo" placeholder="Modelo" class="form-control" value="{{$produto->modelo or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Peso*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="peso" placeholder="Peso, por exemplo, 23 kg" class="form-control" value="{{$produto->peso or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Garantia*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="garantia" placeholder="Garantia, por exemplo, 7 dias úteis" class="form-control" value="{{$produto->garantia or ''}}" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Habilitado?
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control" name="status" id="status">
                                            <option value="1">Sim</option>
                                            <option value="2">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </p>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">                            
                        <div class="tocify-content">
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Categorias*
                                    </div>
                                    <div class="col-md-9"> 
                                        <select multiple="multiple" name="categorias[]" id="categorias" class="form-control">
                                            @if(isset($categorias) && !$categorias->isEmpty())
                                                @foreach($categorias as $categoria)
                                                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                                    {{categoryRecursive($categoria,$categoria->nome)}}
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Imagens*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="email_company" placeholder="E-mail Comercial" class="form-control" value="{{$usuario->company_email or ''}}" />
                                    </div>
                                </div>
                            </p>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="position: relative;">
                    @if(isset($id))
                        <input type="hidden" name="id" value="{{$id}}">
                    @endif
                    <input type="Submit" id="create-category" class="btn btn-primary btn-lg active" value="Cadastrar Produto" />
                </div>
            </div>
            <div class="col-md-3" style="position: relative;">
                <div id="tocify"></div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                 
    </div>            
    <!-- END PAGE CONTENT -->
</form>


<!-- Modal -->
@if($usuario->perfil == 1)
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("meusdados/alterar-pacote")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Alterar pacote
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Pacote</div>
                        <div class="col-md-9">
                            <select class="form-control" id="pacote" name="pacote" REQUIRED>
                                @foreach($pacotes as $pacote)
                                    <option value="{{$pacote->id}}" @if($pacote->id == $usuario->pacote_id) SELECTED @endif >{{$pacote->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if(isset($id))
                        <input type="hidden" name="id" value="{{$id}}" />
                    @endif
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Alterar Pacote</button>
                </div>
            </form>
        </div>
    </div>
</div>
@elseif($usuario->perfil == 2)
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("meusdados/solicitar-pacote")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Solicitar Plano
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding-top:10px;">
                        <div class="col-md-3">Mensagem</div>
                        <div class="col-md-9">
                            <textarea rows="5" placeholder="Mande sua mensagem com seus dados de contato para selecionar-mos o plano que mais se adequa a sua empresa.(Os dados da empresa precisam estar preenchidos!)" name="mensagem" id="mensagem" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if(isset($id))
                        <input type="hidden" name="id" value="{{$id}}" />
                    @endif
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Solicitar Pacote</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@stop
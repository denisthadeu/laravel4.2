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
@stop
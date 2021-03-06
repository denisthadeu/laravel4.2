@extends('template.index')

@section('content')

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Centros Comerciais</li>
</ul>
<!-- END BREADCRUMB -->                
<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title text-bold">{{$centro->nome}}</h3>
            </div>
            <!--<div class="col-md-1 col-md-offset-1"><button type="button" id="create-category" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#myModal">Novo</button></div>-->
        </div>
    </div>
    <div class="panel-body">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Ruas <button class="pull-right btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalRuas">Novo</button></div>
                <div class=" panel-body">
                    @if(count($ruas) > 0)
                    <table class="table table-hover">
                        @foreach($ruas as $rua)
                        <tr>
                            <td><span class="glyphicon glyphicon-remove text-danger deleteAttribute" data-id="{{$rua->id}}" data-centro="{{$centro->id}}" data-string="{{$rua->nome}}" data-action="{{ URL::to("delete/rua") }}" style="cursor:pointer"></span> {{$rua->nome}}</td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <div class="alert alert-warning">Nenhuma Rua Cadastrado!</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Pacotes <button class="pull-right btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalPacote">Novo</button></div>
                <div class=" panel-body">
                    @if(count($pacotes) > 0)
                    <table class="table table-hover">
                        @foreach($pacotes as $pacote)
                        <tr>
                            <td><span class="glyphicon glyphicon-remove text-danger deleteAttribute" data-id="{{$pacote->id}}" data-centro="{{$centro->id}}" data-string="{{$pacote->nome}}" data-action="{{ URL::to("delete/pacote") }}" style="cursor:pointer"></span> {{$pacote->nome}}</td>
                            <td>{{$pacote->vezes}}x</td>
                            <td>{{$pacote->valor}}</td>
                            <td>{{$pacote->valido_por}} dias</td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <div class="alert alert-warning">Nenhum Pacote Cadastrado!</div>
                    @endif
                </div>
            </div>    
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias <button class="pull-right btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalCategoria">Novo</button></div>
                <div class=" panel-body">
                    @if(count($categorias) > 0)
                    <table class="table table-hover">
                        @foreach($categorias as $categoria)
                        <tr>
                            <td><span class="glyphicon glyphicon-remove text-danger deleteAttribute" data-id="{{$categoria->id}}" data-centro="{{$centro->id}}" data-string="{{$categoria->nome}}" data-action="{{ URL::to("delete/categoria") }}" style="cursor:pointer"></span> {{$categoria->nome}}</td>
                            <td>
                                @if(!empty($categoria->caminho_completo))
                                <button type="button" class="btn btn-info btn-xs active ver-imagem" data-id="{{$categoria->id_imagem}}" data-caminho="{{$categoria->caminho_completo}}" data-toggle="modal" data-target="#myModalCategoriaImgVer">Ver Imagem</button>
                                @else
                                <button type="button" class="btn btn-primary btn-xs active add-category" data-id="{{$categoria->id}}" data-toggle="modal" data-target="#myModalCategoriaImgUp">Nova Imagem</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <div class="alert alert-warning">Nenhuma Categoria Cadastrado!</div>
                    @endif
                </div>
            </div>    
        </div>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->
<!-- Modal -->
<div class="modal fade" id="myModalRuas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("centro/ruas")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Cadastrar Rua - {{$centro->nome}}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Nome</div>
                        <div class="col-md-9"><input type="text" class="form-control" id="nome" name="nome" placeholder="nome" REQUIRED></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="centro_id" value="{{$centro->id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--myModalPacote-->
<div class="modal fade" id="myModalPacote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("pacotes/save")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Criar Pacote
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Nome</div>
                        <div class="col-md-9"><input type="text" class="form-control" id="nome" name="nome" placeholder="nome" REQUIRED></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Vezes</div>
                        <div class="col-md-9"><input type="text" class="form-control numbersOnly" id="nome" name="vezes" placeholder="Número de vezes" REQUIRED></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Valor</div>
                        <div class="col-md-9"><input type="text" class="form-control money" data-thousands="." data-decimal="," data-prefix="R$ " id="nome" name="valor" placeholder="Valor do pacote" REQUIRED></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Válido por</div>
                        <div class="col-md-9"><input type="text" class="form-control numbersOnly" id="nome" name="valido_por" placeholder="Validade em dias" REQUIRED></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="centro_id" value="{{$centro->id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--myModalCategoria-->
<div class="modal fade" id="myModalCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("categorias/save")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Criar Categoria
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">Nome</div>
                        <div class="col-md-9"><input type="text" class="form-control" id="nome" name="nome" placeholder="nome" REQUIRED></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="centro_id" value="{{$centro->id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalCategoriaImgUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("categorias/upload")}}" method="post" enctype="multipart/form-data" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Nova Imagem
                    </h4>
                </div>
                <div class="modal-body">
                    <p>
                        <div class="row">
                            <label class="col-md-3 control-label">
                                Imagem
                            </label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="file" accept="image/*" REQUIRED>
                            </div>
                        </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id_categoria">
                    <input type="hidden" name="centro_id" value="{{$centro->id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Fazer Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalCategoriaImgVer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Ver Imagem
                    </h4>
                </div>
                <div class="modal-body text-center" id="modal-image"></div>
                <div class="modal-footer">
                    <input type="hidden" name="centro_id" value="{{$centro->id}}" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <a href="#" id="deletar-imagem" class="btn btn-danger">Deletar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
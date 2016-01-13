@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Usuários</li>
</ul>
<!-- END BREADCRUMB -->                
<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">                                
        <h3 class="panel-title">Usuários Cadastrados</h3>
    </div>
    <div class="panel-body">
        <form method="get">
            <div class="dataTables_length" id="DataTables_Table_0_length">
                <label>Exibir 
                    <select name="pagination" aria-controls="DataTables_Table_0" class="form-control">
                        <option value="10" @if(Input::has('pagination') && Input::get('pagination') == 10) selected="selected" @endif >10</option>
                        <option value="25" @if(Input::has('pagination') && Input::get('pagination') == 25) selected="selected" @endif>25</option>
                        <option value="50" @if(Input::has('pagination') && Input::get('pagination') == 50) selected="selected" @endif>50</option>
                        <option value="100" @if(Input::has('pagination') && Input::get('pagination') == 100) selected="selected" @endif>100</option>
                    </select>
                </label>
            </div>
            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                <label style="height: 30px;">
                    Pacote:
                    <select name="pacote" aria-controls="DataTables_Table_0" class="form-control" style="width: 100px; display: inline; height: 30px;">
                        <option value="">selecione</option>
                        @foreach($pacotes as $pacote)
                            <option value="{{$pacote->id}}" @if(Input::has('pacote') && Input::get('pacote') == $pacote->id) selected="selected" @endif >{{$pacote->nome}}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;
                    Pesquisar:
                    <input type="search" name="nome" class="form-control" style="width: 250px;" placeholder="Nome ou sobrenome ou email ou rua" aria-controls="DataTables_Table_0" value="{{Input::get('nome')}}">&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </label>
            </div>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Empresa</th>
                    <th>Rua</th>
                    <th>Data Cadastro</th>
                    <th>Pacote</th>
                    <th>Dt. Venc. Pacote</th>
                    <th>Ativo</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($usuarios) && !$usuarios->isEmpty())
                    @foreach($usuarios AS $usuario)
                        <tr>
                            <td>
                                <a href="{{URL::to("meusdados/$usuario->id")}}">
                                    @if(date('Y-m-d', strtotime("-5 days",strtotime($usuario->data_vencimento))) >= date( "Y-m-d" ) && $usuario->status == 1)
                                        <span class="text-success fa fa-circle"></span>
                                    @elseif($usuario->data_vencimento > date( "Y-m-d H:i:s" ) && $usuario->status == 1)
                                        <span class="text-warning fa fa-circle"></span>
                                    @else
                                        <span class="text-danger fa fa-circle"></span>
                                    @endif
                                </a>
                            </td>
                            <td><a href="{{URL::to("meusdados/$usuario->id")}}">{{$usuario->nome}}</a></td>
                            <td><a href="{{URL::to("meusdados/$usuario->id")}}">{{$usuario->sobrenome}}</a></td>
                            <td><a href="{{URL::to("meusdados/$usuario->id")}}">{{$usuario->company_name}}</a></td>
                            <td><a href="{{URL::to("meusdados/$usuario->id")}}">{{$usuario->rua}}</a></td>
                            <td><a href="{{URL::to("meusdados/$usuario->id")}}">{{Formatter::getDataHoraFormatada($usuario->created_at)}}</a></td>
                            <td>
                                <a href="{{URL::to("meusdados/$usuario->id")}}">
                                    @if(!empty($usuario->pacote_id))
                                        {{$usuario->pacote->nome}}
                                    @endif
                                </a>
                            </td>
                            <td><a href="{{URL::to("meusdados/$usuario->id")}}">{{Formatter::dateDbToString($usuario->data_vencimento)}}</a></td>
                            <td><a href="{{URL::to("meusdados/$usuario->id")}}">{{Formatter::getStatusSimNao($usuario->status)}}</a></td>
                            <td>
                                <a href="{{URL::to("meusdados/$usuario->id")}}">
                                    <button type="button" id="create-category" class="btn btn-warning btn-lg active"><span class="fa fa-pencil"></span></button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">Nenhum Usuário Cadastrado no sistema</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Total de usuários: {{$numUsersTot}}</div>
        <!-- <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous">Anterior</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="7" tabindex="0" id="DataTables_Table_0_next">Próximo</a></div> -->
        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            {{$usuarios->appends(array('pagination' => Input::get('pagination'),'nome'=>Input::get('nome')))->links();}}
        </div>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{URL::to("usuario/save-category")}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Criar Centro Comercial
                    </h4>
                </div>
                <div class="modal-body" id="categoriasUser">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
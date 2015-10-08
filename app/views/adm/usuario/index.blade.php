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
                    </select> usuários
                </label>
            </div>
            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Pesquisar:<input type="search" name="nome" class="form-control " placeholder="Nome ou sobrenome ou email" aria-controls="DataTables_Table_0" value="{{Input::get('nome')}}">&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Pesquisar</button></label></div>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Empresa</th>
                    <th>Qtd. produtos</th>
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
                                @if(!empty($usuario->data_vencimento))
                                    @if($usuario->data_vencimento >= date('Y-m-d H:i:s'))
                                        <span class="text-success fa fa-circle"></span>
                                    @else
                                        <span class="text-warning fa fa-circle"></span>
                                    @endif

                                @endif
                            </td>
                            <td>{{$usuario->nome}}</td>
                            <td>{{$usuario->sobrenome}}</td>
                            <td>{{$usuario->company_name}}</td>
                            <td>{{$usuario->totProdutos()}}</td>
                            <td>{{Formatter::getDataHoraFormatada($usuario->created_at)}}</td>
                            <td>
                                @if(!empty($usuario->pacote_id))
                                    {{$usuario->pacote->nome}}
                                @endif
                            </td>
                            <td>{{Formatter::dateDbToString($usuario->data_vencimento)}}</td>
                            <td>{{Formatter::getStatusSimNao($usuario->status)}}</td>
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

@stop
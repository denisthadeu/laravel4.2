@extends('template.index')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Painel De Controle</a></li>
    <li class="active">Meus Dados</li>
</ul>
<!-- END BREADCRUMB -->                
<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><span class="glyphicon glyphicon-user"></span> Meus Dados</h2>
</div>
<!-- END PAGE TITLE -->                   
<!-- PAGE CONTENT WRAPPER -->
<form action="{{URL::to("meusdados/save")}}" method="post">
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">                            
                        <div class="tocify-content">
                            <h2>Dados de Login</h2>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Nome*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="nome" placeholder="Nome" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        E-mail*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="email" placeholder="E-mail" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Senha
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="senha" placeholder="Redefina sua senha" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Confirmação de senha
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="senha_confirma" placeholder="Confirme sua nova senha" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Telefone*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="telefone" placeholder="Telefone Fixo" class="form-control telefone-fixo" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Celular*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="celular" placeholder="Telefone Celular" class="form-control telefone-celular" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Pacote
                                    </div>
                                    <div class="col-md-9">
                                        
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
                            <h2>Dados da Empresa</h2>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Nome*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="nome_company" placeholder="Nome da Empresa" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Centro*
                                    </div>
                                    <div class="col-md-9">
                                        <select name="centro"  class="form-control" >
                                            <option>Centros</option>
                                        </select>
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Rua*
                                    </div>
                                    <div class="col-md-9">
                                        <select name="rua"  class="form-control" >
                                            <option>Ruas</option>
                                        </select>
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input name="numero_company" placeholder="Número" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <input name="loja_company" placeholder="Loja" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <input name="floor" placeholder="Andar" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        E-mail*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="email_company" placeholder="E-mail Comercial" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Site*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="site_company" placeholder="Site da Empresa" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-3">
                                        Telefone*
                                    </div>
                                    <div class="col-md-9">
                                        <input name="telefone_company" placeholder="Telefone Comercial" class="form-control" />
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="tags_company" rows="3" class="form-control" placeholder="Informe suas tags separadas por vírgula(','), por exemplo, 'Informática, notebook, tecnologia, etc...'"></textarea>
                                        <small>As tags servem para outros usuários encontrarem você na pesquisa!</small><br/><br/>
                                        <small>*Apenas os dados da empresa estarão disponíveis no site.</small>
                                    </div>
                                </div>
                            </p>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="position: relative;">
                    <input type="Submit" id="create-category" class="btn btn-primary btn-lg active" value="Atualizar Dados" />
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
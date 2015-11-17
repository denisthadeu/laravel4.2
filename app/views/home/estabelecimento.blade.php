@extends('template.home')

@section('content')
<?php 
$count=0;
$auxRua='';
?>
<div class="col-xs-12 push-down-20">
    @if(isset($categorias) && !$categorias->isEmpty())
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding-v-5">
            <div class="panel panel-warning">
                <div class="panel-heading"><strong>Categorias:</strong></div>
                <div class="panel-body" style="background: rgba(255,185,15, 0.5);">
                    @if(isset($categorias) && !$categorias->isEmpty())
                        @foreach($categorias as $categoria)
                            <div class="col-xs-12 padding-v-5">
                                <a class="col-xs-12 btn btn-sm btn-{{{ count($categorySel) > 0 && $categoria->id == $categorySel->id ? 'default' : 'success' }}}" href="{{URL::to("home/estabelecimento")}}/{{$id}}/{{$categoria->id}}"><strong>{{$categoria->nome}}</strong></a>
                            </div>
                        @endforeach
                    @endif
                    <div class="push-down-10" style="clear: both;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            @if(isset($estabelecimentos) && !$estabelecimentos->isEmpty())
                <div class="col-lg-12 padding-v-5">
                    <div class="panel panel-warning">
                        
                        <div class="panel-heading text-center">
                            @if(count($categorySel) > 0)
                            <strong style="font-size: 20px;">{{$categorySel->nome}}</strong>
                            @endif
                            <button class="btn btn-default pull-right" id="btn-print"><i class="fa fa-print"></i> Imprimir</button>
                            <div style="clear: both;"></div>
                        </div>
                        <div class="panel-body" id="div-print">
                            <div style="margin: 0 auto; width: 70%">
                                <div class="col-md-4 col-xs-12 text-center hidden-print">
                                    <img style="width: 150px; height: 150px;" src="/{{ (!empty($imagem)) ? $imagem->caminho_completo : 'uploads/categorias/sem_foto.gif' }}">
                                </div>
                                <div class="col-xs-12 text-center visible-print-block">
                                    <legend>www.PONTOdaINFORNACAO.com.br</legend><br><br>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    @if(INPUT::has('search'))
                                        <h3>"{{INPUT::get('search')}}"</h3>
                                    @endif
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    @foreach($estabelecimentos as $estabelecimento) <?php $count++; ?>
                                        @if($estabelecimento->rua != $auxRua)
                                            <legend class="push-up-20 push-down-0" >{{ $estabelecimento->rua }}</legend>
                                            <?php $auxRua = $estabelecimento->rua ?>
                                        @endif
                                        <div class="col-xs-12 push-up-10 {{($count % 2 == 0) ? 'bg-warning' : ''}}">
                                            <p><strong>{{$estabelecimento->company_name}}</strong></p>
                                            <p style="color: #000;"><strong>
                                                {{ $estabelecimento->rua }}
                                                {{ isset($estabelecimento->company_numero) ? ', nº ' . $estabelecimento->company_numero : '' }}
                                                {{ isset($estabelecimento->company_loja) ? ', lj ' . $estabelecimento->company_loja : '' }}
                                                {{ isset($estabelecimento->company_andar) ? ', ' . $estabelecimento->company_andar. 'º Andar' : '' }}
                                            </strong></p>
                                            <hr style="margin: 0;">
                                        </div>
                                    @endforeach
                                    <div style="clear: both;"></div>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @else
        <div class="alert alert-warning">Nenhum estabelecimento cadastrado neste centro!</div>
        @endif
</div>  
<!-- ./page content -->
@stop
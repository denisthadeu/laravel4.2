@extends('template.home')

@section('content')
<?php 
$categoriaSelecionada = Input::get('category');
$centroSelecionado = Input::get('centro');
$ruaSelecionada = Input::get('rua');
?>
<div class="login-container">
    <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 col-xs-12">
        <div class="login-box animated fadeInDown row" style="width: auto">
            <div class="login-body">
                <div class="text-column this-animate" data-animate="fadeInRight">                                    
                    <div class="list-links">
                        @if(isset($centros) && !$centros->isEmpty())
                            @foreach($centros as $centro)
                                <div class="col-xs-12 push-down-10">
                                    <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6">
                                        <a class="col-xs-12 btn btn-success" style="color:white;" href="{{URL::to("home/estabelecimento")}}/{{$centro->id}}">{{$centro->nome}}</a>
                                    </div>
                                    <div class="col-lg-3 col-md-3"></div>
                                </div>
                            <!--
                                @if($centro->hasRuas())
                                    @foreach($centro->ruas as $rua)
                                        @if($ruaSelecionada == $rua->id)
                                            <strong>
                                        @endif
                                            <a href="{{URL::to("home/home")}}?search={{Input::get('search')}}&category={{$categoriaSelecionada}}&centro={{$centro->id}}&rua={{$rua->id}}" style="color:white;">&nbsp;&nbsp;&nbsp;{{$rua->nome}}</a>
                                        @if($ruaSelecionada == $rua->id)
                                            </strong>
                                        @endif
                                    @endforeach
                                @endif
                            -->
                            @endforeach
                        @else
                            <div class="alert alert-warning">Nenhum Centro Encontrado!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page content -->
@stop
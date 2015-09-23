@extends('template.home')

@section('content')

<div class="page-content-holder padding-v-30">
                        
    <div class="col-md-12 this-animate animated fadeInLeft this-animated" data-animate="fadeInLeft">
        <div class="text-column">
            <h3>{{$produto->nome}}</h3>
        </div>
        
        <div class="row">
        	@if(!$produto->imagens->isEmpty())
	            <div class="col-md-6 this-animate animated fadeInLeft this-animated" data-animate="fadeInLeft">
	                <div class="jcarousel">
	                    <ul>
	                    	@foreach($produto->imagens AS $imagem)
	                        <li><img src="/{{$imagem->caminho_completo}}" width="514" height="400" alt=""></li>
	                        @endforeach
	                    </ul>
	                </div>
	                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
	                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
	            </div>
	        @endif
            <div class="col-md-6 this-animate animated fadeInRight this-animated" data-animate="fadeInRight">
               	<div class="row">
               		<div class="col-md-4">
               			
               		</div>
               		<div class="col-md-8">
               			<h4>{{$produto->user->company_name}}</h4>
               		</div>
               	</div>
               	<div class="row">
               		<div class="col-md-4">
               			Site da empresa
               		</div>
               		<div class="col-md-8">
               			<a href="{{$produto->user->company_site}}">{{$produto->user->company_site}}</a>
               		</div>
               	</div>
               	<div class="row">
               		<div class="col-md-4">
               			Telefone de contato
               		</div>
               		<div class="col-md-8">
               			{{$produto->user->company_telefone}}
               		</div>
               	</div>
               	<div class="row">
               		<div class="col-md-4">
               			Endereço
               		</div>
               		<div class="col-md-8">
               			@if(!empty($produto->user->centro_id))
               				{{$produto->user->centro->nome}}, 
               			@endif
               			@if(!empty($produto->user->rua_id))
               				{{$produto->user->rua->nome}} 
               			@endif
               			@if(!empty($produto->user->company_numero))
               				número {{$produto->user->company_numero}} 
               			@endif
               			@if(!empty($produto->user->company_loja))
               				loja {{$produto->user->company_loja}}
               			@endif
               		</div>
               	</div>
               	@if(!empty($produto->user->company_andar))
	               	<div class="row">
	               		<div class="col-md-4">
	               			Andar
	               		</div>
	               		<div class="col-md-8">
	               			{{$produto->user->company_andar}}
	               		</div>
	               	</div>
               	@endif
               	<div class="row">
               		<div class="col-md-4">
               			Email
               		</div>
               		<div class="col-md-8">
               			{{$produto->user->company_email}}
               		</div>
               	</div>
               	<div class="row">
               		<div class="col-md-4">
               			company_tags
               		</div>
               		<div class="col-md-8">
               			{{$produto->user->company_tags}}
               		</div>
               	</div>

            </div>
        </div>
    </div>
    
</div>


@stop
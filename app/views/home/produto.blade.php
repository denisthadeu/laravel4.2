@extends('template.home')

@section('content')

<div class="page-content-holder padding-v-30">
                        
    <div class="col-md-12 this-animate animated fadeInLeft this-animated" data-animate="fadeInLeft">
        <div class="text-column">
            <h4>{{$produto->nome}}</h4>
        </div>
        
        <div class="row">
            <div class="col-md-6 this-animate animated fadeInLeft this-animated" data-animate="fadeInLeft">
                carrosel de fotos
            </div>
            <div class="col-md-6 this-animate animated fadeInRight this-animated" data-animate="fadeInRight">
                descrição do produto e de contato
            </div>
        </div>
    </div>
    
</div>


@stop
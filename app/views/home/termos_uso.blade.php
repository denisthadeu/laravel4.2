@extends('template.home')

@section('content')

<div class="page-content-holder padding-v-30">
                        
    <div class="block-heading this-animate animated fadeInLeft this-animated" data-animate="fadeInLeft">
        <h2>Termos de uso</h2>
        <div class="block-heading-text">
            {{ $texto->descricao }}
        </div>
    </div>  
    
    
</div>


@stop
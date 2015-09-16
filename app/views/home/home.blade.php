@extends('template.home')

@section('content')
<?php 
function categoryRecursive($category, $titulo){
    $option = '';
    if($category->totSubCategories() > 0){
        $subCategory = $category->subcategories;
        foreach($subCategory as $sub){
            // $newTitlo = $titulo.' -> '.$sub->nome;
            $newTitlo = $titulo.$sub->nome;
            $option .= '<a href="'.URL::to("home/home").'?search='.Input::get('search').'&category='.$sub->id.'">'.$newTitlo.'</a>';
            $option .= categoryRecursive($sub,$titulo.'&nbsp;&nbsp;&nbsp;');
        }
    }
    return $option;
}
?>

<div class="row">
    <div class="col-md-3">
        
        <div class="text-column this-animate" data-animate="fadeInRight">                                    
            <h4>Categorias</h4>
            <div class="list-links">
                @if(isset($categorias) && !$categorias->isEmpty())
                    @foreach($categorias as $categoria)
                        <a href="{{URL::to("home/home")}}?search={{Input::get('search')}}&category={{$categoria->id}}">{{$categoria->nome}}</a>
                        {{categoryRecursive($categoria,'&nbsp;&nbsp;&nbsp;')}}
                    @endforeach
                @endif
            </div>
        </div>
        
    </div>

    <div class="col-md-9">
        <div class="row">
            
            @if(isset($produtos) && !$produtos->isEmpty())
                @foreach($produtos as $produto)
                    
                    <div class="item  col-xs-4 col-lg-4">
                        <div class="thumbnail">
                            <div class="col-xs-12 col-md-12" style="padding-left:18%">
                                @foreach($produto->imagens AS $imagem)
                                    <img src="/{{$imagem->caminho_completo}}" alt="{{$imagem->nome}}" class="col-md-10">
                                    {{--*/ break; /*--}}
                                @endforeach
                            </div>
                            <div class="caption">
                                <h5 class="group inner list-group-item-heading" style="text-align:center">{{$produto->nome}}</h5>
                                <p class="group inner list-group-item-text" style="min-height:80px;">{{substr($produto->descricao, 0, 140)}}</p>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12" style="text-align:center">
                                        <p class="lead">{{$produto->preco}}</p>
                                    </div>
                                    <div class="col-xs-12 col-md-12" style="text-align:center">
                                        <a class="btn btn-success" href="{{URL::to("home/produto/$produto->id")}}">Mais informações</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                @endforeach
            @else
                <div class="item  col-xs-4 col-lg-4">
                Nenhum produto encontrado
                </div> 
            @endif
            
        </div>

        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            {{$produtos->appends(array('search' => Input::get('search'),'category'=>Input::get('category')))->links();}}
        </div>
        
    </div>
    
</div>
<!-- ./page content -->
@stop
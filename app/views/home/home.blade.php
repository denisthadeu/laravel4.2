@extends('template.home')

@section('content')
<?php 
$categoriaSelecionada = Input::get('category');
$centroSelecionado = Input::get('centro');
$ruaSelecionada = Input::get('rua');
//echo '<pre>'; print_r($centros); echo '</pre>'; 
/*function categoryRecursive($category, $titulo, $categoriaSelected,$centroSelected,$ruaSelected){
    $option = '';
    if($category->totSubCategories() > 0){
        $subCategory = $category->subcategories;
        foreach($subCategory as $sub){
            // $newTitlo = $titulo.' -> '.$sub->nome;
            $newTitlo = $titulo.$sub->nome;
            if($categoriaSelected == $sub->id){
                $option .= '<strong>';    
            }
            $option .= '<a href="'.URL::to("home/home").'?search='.Input::get('search').'&category='.$sub->id.'&centro='.$centroSelected.'&rua='.$ruaSelected.'" style="color:white;">'.$newTitlo.'</a>';
            if($categoriaSelected == $sub->id){
                $option .= '</strong>';    
            }
            $option .= categoryRecursive($sub,$titulo.'&nbsp;&nbsp;&nbsp;',$categoriaSelected,$centroSelected,$ruaSelected);
        }
    }
    return $option;
}*/
?>
<div class="login-container">
    <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 col-xs-12">
        <div class="login-box animated fadeInDown row" style="width: auto">
            <div class="login-body">
                <div class="text-column this-animate" data-animate="fadeInRight">                                    
                    <div class="list-links">
                        @if(isset($centros) && !$centros->isEmpty())
                            @foreach($centros as $centro)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 push-down-10">
                                    <a class="btn btn-success" style="color:white;" href="http://laravel.dev/home/estabelecimento/{{$centro->id}}">{{$centro->nome}}</a>
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page content -->
@stop
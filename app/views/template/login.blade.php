<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Ponto da Informação</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../css/theme-default.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="../css/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="../front-end/css/styles.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <div class="login-container">
            <div class="login-container-box">
                @if (Session::get('success'))
                <?php
                $successes = Session::get('success');
                ?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">×</a>
                    <h4 class="alert-heading"> Sucesso! </h4>
                    <ul>
                        @foreach($successes as $sucesso)
                            <li>{{$sucesso}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::get('info'))
                <?php
                $infos = Session::get('info');
                ?>
                <div class="alert alert-info">
                    <a class="close" data-dismiss="alert">×</a>
                    <h4 class="alert-heading"> Informações: </h4>
                    <ul>
                        @foreach($infos as $info)
                            <li>{{$info}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::get('warning'))
                <?php
                $warnings = Session::get('warning');
                ?>
                <div class="alert alert-warning">
                    <a class="close" data-dismiss="alert">×</a>
                    <h4 class="alert-heading"> Atenção! </h4>
                    <ul>
                        @foreach($warnings as $warning)
                            <li>{{$warning}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::get('danger'))
                <?php
                $dangers = Session::get('danger');
                ?>
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert">×</a>
                    <h4 class="alert-heading"> Os seguintes erros foram encontrados: </h4>
                    <ul>
                        @foreach($dangers as $danger)
                            @if (is_array($danger))
                                
                                    @foreach ($danger as $msg)              
                                        <li>{{$msg}}</li>
                                    @endforeach
                                
                            @else
                                <li>{{$danger}}</li>
                            @endif
                            
                        @endforeach
                    </ul>
                </div>
                @endif
                @section('content')

                @show
                <div class="login-container-box-footer">
                     <div class="pull-left">
                        &copy; Sistema
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-link" href="{{URL::to("home/quem-somos")}}">Sobre a empresa</a> |
                        <a class="btn btn-link" href="{{URL::to("home/termos-uso")}}">Termos de uso</a> |
                        <a class="btn btn-link" href="{{URL::to("home/fale-conosco")}}">Contato</a>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>
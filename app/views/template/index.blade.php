<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Ponto da Informação</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="/css/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="/css/theme-default.css"/>
        
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container"  style="background-color:#FFB90F;">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation" style="background-color:#FFB90F;">
                    <li class="xn-logo" style="background-color:#e34724;"><a href="{{URL::to("/")}}" style="background-color:#FFB90F;">Ponto da Informação</a></li>
                    <li class="xn-title" style="color:white;border-color:#FFB90F;">Menu</li>
                    @if(Auth::User()->perfil == 1)
                        @if($menu == 1)
                            <li><a href="{{URL::to("/")}}" style="border:0px;"><span class="fa fa-desktop"></span> <span class="xn-text">Página Inicial</span></a></li>
                            <li><a href="{{URL::to("centro")}}" style="color:white;border:0px;"><span class="fa fa-road"></span> Centros</a></li>
                            <li><a href="{{URL::to("parametros")}}" style="color:white;border:0px;"><span class="fa fa-gears"></span> Parametros</a></li>
                        @elseif($menu == 2)
                        <li class="xn-title"></li>
                        <li><a class="active" href="javascript:void(0)" style="border:0px; background-color: #333;"> <span class="xn-text">{{$centro->nome}}</span></a></li>
                        <li><a href="{{URL::to("/")}}" style="border:0px;"><span class="fa fa-desktop"></span> <span class="xn-text">Página Inicial</span></a></li>
                        <li><a href="{{URL::to("centro")}}" style="color:white;border:0px;"><span class="fa fa-road"></span> Centros</a></li>
                        <li><a href="{{URL::to("usuario/solicitacao-cliente")}}/{{{$centro->id}}}" style="color:white;border:0px;"><span class="fa fa-user"></span> Solicitação de clientes</a></li>
                        <li><a href="{{URL::to("usuario/index")}}/{{{$centro->id}}}" style="color:white;border:0px;"><span class="fa fa-group"></span> Clientes</a></li>
                        <li><a href="{{URL::to("centro/cadastro-geral")}}/{{{$centro->id}}}" style="color:white;border:0px;"><span class="fa fa-bars"></span> Cadastro Geral</a></li>
                        <li><a href="{{URL::to("parametros")}}" style="color:white;border:0px;"><span class="fa fa-gears"></span> Parametros</a></li>
                        @elseif($menu == 3)
                        <li class="xn-title"></li>
                        <li><a class="active" href="javascript:void(0)" style="border:0px; background-color: #333;"> <span class="xn-text">{{$centro->nome}}</span></a></li>
                        <li><a href="{{URL::to("usuario/index")}}/{{{$centro->id}}}" style="color:white;border:0px;"><span class="fa fa-group"></span> Clientes</a></li>
                        <li><a href="{{URL::to("parametros")}}" style="color:white;border:0px;"><span class="fa fa-gears"></span> Parametros</a></li>
                        @endif
                    @else
                    <li><a href="{{URL::to("/")}}" style="border:0px;"><span class="fa fa-desktop"></span> <span class="xn-text">Página Inicial</span></a></li>
                    <li><a href="{{URL::to("categorias/solicitar-categoria")}}" style="color:white;border:0px;"><span class="fa fa-user"></span> Solicitar Categoria</a></li>
                    @endif
                    <li><a href="{{URL::to("id/sign-out")}}"><span class="fa fa-sign-out"></span> <span class="xn-text">Logout</span></a></li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel" style="background-color:#FFB90F">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->                    
                </ul>
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
                <!-- END X-NAVIGATION VERTICAL -->                     
                @section('content')

                @show
                             
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/plugins/bootstrap/bootstrap.min.js"></script> 
        


        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->

        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="/js/plugins.js"></script>        
        <script type="text/javascript" src="/js/actions.js"></script>        

        <!-- Include Jquery -->
        <script type="text/javascript" src="/js/plugins/summernote/summernote.js"></script>
        <script type="text/javascript" src="/js/jquery.maskMoney.js"></script>
        <script type="text/javascript" src="/js/maskedinput.min.js"></script> 
        <script type="text/javascript" src="/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="/js/plugins/daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.numbersOnly').keyup(function () { 
                    this.value = this.value.replace(/[^0-9\.]/g,'');
                });
                $(".money").maskMoney({symbol:'R$ ', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
                $("#cpf").mask("999.999.999-99");
                $(".telefone").mask("(99) 9999-9999");
                $(".celular").mask("(99) 9999-9999?9");
                $('#centro').change(function(){
                    var centro_id = $(this).val();
                    if(centro_id > 0){
                        $.ajax({
                            url: "/centro/option-ruas/"+centro_id,
                            // data: { prova_id : provaId, tipo : "m" },
                            cache: false,
                            success: function(html){
                                $('#rua').html(html);
                            }
                        });
                    }
                });
                var d = new Date();
                $('.singleDate').daterangepicker({
                    "singleDatePicker": true,
                    "autoApply": true,
                    "startDate": d.getDate()+"/"+(d.getMonth()+1)+"/"+d.getFullYear()
                }, function(start, end, label) {
                  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
                });

                $("body").on('click','.add-category',function(){

                    $("#id_categoria").val($(this).data('id'));
                });

                $("body").on('click','.ver-imagem',function(){
                    console.log($(this).data('id'));
                    $("#modal-image").html(
                        $('<img>', {src: '/'+$(this).data('caminho')})
                    );
                    $('#deletar-imagem').prop('href','{{URL::to("categorias/delete-upload")}}'+'/'+$(this).data('id'));
                });
            });
        </script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>
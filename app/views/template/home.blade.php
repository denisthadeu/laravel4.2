<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>Ponto da Informação</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- END META SECTION -->
        
        <link rel="stylesheet" type="text/css" href="/front-end/css/styles.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/front-end/css/jcarousel.basic.css" media="screen" />
        
    </head>
    <body>
        <!-- page container -->
        <div class="page-container">
            
            <!-- page header -->
            <div class="page-header">
                
                <!-- page header holder -->
                <div class="page-header-holder">
                    
                    <!-- page logo -->
                    <!-- <div class="logo">
                        <a href="index.html">Ponto da Informação</a>
                    </div> -->
                    <!-- ./page logo -->

                    <!-- nav mobile bars -->
                    <div class="navigation-toggle">
                        <div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
                    </div>
                    <!-- ./nav mobile bars -->
                    
                    <!-- navigation -->
                    <ul class="navigation">
                        <li><a href="{{URL::to("home/home")}}">Página Inicial</a></li>
                        <li><a href="{{URL::to("id/sign-up")}}">Anuncie seu estabelecimento</a></li>
                        <li><a href="{{URL::to("home/quem-somos")}}">Quem Somos</a></li>
                        <li><a href="{{URL::to("home/termos-uso")}}">Termos de uso</a></li>
                        <li><a href="{{URL::to("home/fale-conosco")}}">Fale Conosco</a></li>
                        <li><a href="{{URL::to("id/sign-in")}}">Login</a></li>
                    </ul>
                    <!-- ./navigation -->                        

                    
                </div>
                <!-- ./page header holder -->
                
            </div>
            <!-- ./page header -->
            
            <!-- page content -->
            <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">
                            <div class="col-md-3">
                                <h1>Ponto da Informação</h1>
                            </div>
                            <form action="" method="get" id="form-search">
                                <div class="col-md-9" style="padding-top:1.4%;">
                                    <div class="input-group">
                                        <input type="text" name="search" id="search" class="form-control" value="{{Input::get('search')}}" placeholder="O que você está procurando?" />
                                        <span class="input-group-addon" style="cursor:pointer" id="span-search"><span class="fa fa-search"></span></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- ./page title -->
                    </div>
                    <!-- ./page content holder -->
                </div>
                <!-- ./page content wrapper -->
                <!-- page content wrapper -->
                <div class="page-content-wrap">                    
                    <!-- page content holder -->
                    <div class="page-content-holder padding-v-30">
                        @section('content')

                        @show
                    </div>

                </div>
            
            <!-- page footer -->
            <div class="page-footer">
                
                <!-- page footer wrap -->
                <div class="page-footer-wrap bg-dark-gray">
                    <!-- page footer holder -->
                    <!--  -->
                    <!-- ./page footer holder -->
                </div>
                <!-- ./page footer wrap -->
                
                <!-- page footer wrap -->
                <div class="page-footer-wrap bg-darken-gray">
                    <!-- page footer holder -->
                    <div class="page-footer-holder">
                        
                        <!-- copyright -->
                        <div class="copyright">
                            &copy; 2015 Ponto da Informação - All Rights Reserved
                        </div>
                        <!-- ./copyright -->
                        
                        <!-- social links -->
                        <div class="social-links">
                            <a href="#"><span class="fa fa-facebook"></span></a>
                            <a href="#"><span class="fa fa-twitter"></span></a>
                            <a href="#"><span class="fa fa-google-plus"></span></a>
                        </div>                        
                        <!-- ./social links -->
                        
                    </div>
                    <!-- ./page footer holder -->
                </div>
                <!-- ./page footer wrap -->
                
            </div>
            <!-- ./page footer -->
            
        </div>        
        <!-- ./page container -->
        
        <!-- page scripts -->
        <script type="text/javascript" src="/front-end/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/front-end/js/plugins/bootstrap/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="/front-end/js/plugins/mixitup/jquery.mixitup.js"></script>
        <script type="text/javascript" src="/front-end/js/plugins/appear/jquery.appear.js"></script>
        
        <script type="text/javascript" src="/front-end/js/actions.js"></script>
        <script type="text/javascript" src="/front-end/js/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="/front-end/js/carousel.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#span-search").click(function(){
                    $("#form-search").submit();
                });
            });
        </script>
        <!-- ./page scripts -->
    </body>
</html>
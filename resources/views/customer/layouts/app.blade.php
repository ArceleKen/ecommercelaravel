<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title', 'E-Commerce')  
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <!-- <link rel="icon" type="image/png" href="images/icons/favicon.png"/> -->
<!--===============================================================================================-->

<!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{!! asset('customer/css/bootstrap.min.css') !!}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{!! asset('customer/css/slick.css') !!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('customer/css/slick-theme.css') !!}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{!! asset('customer/css/nouislider.min.css') !!}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{!! asset('customer/css/font-awesome.min.css') !!}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{!! asset('customer/css/style.css') !!}" />
<!--===============================================================================================-->

</head>

<body class="animsition">
    @include('customer.layouts.navbar')

    @yield('content')



    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header panel-active">
                    <h5 class="modal-title">
                        @if(session('message'))
                            {!! session('message') !!}
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body alert alert-success">
                    <center>
                    <b>
                    @if(session('message'))
                        {!! session('message') !!}
                    @endif
                    </b>
                    </center>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/products/0') }}" class="btn btn-primary pull-left">Poursuivre les achats</a>
                    <a href="{{ route('cart.show') }}" class="btn btn-warning pull-right">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="qty">
                            @if (session()->has("totalQuantity")) {{ session('totalQuantity') }} @else 0 @endif
                        </span>
                        Voir le panier
                    </a>
                </div>
            </div>
        </div>
    </div> 

    <div id="modalSendCommand" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header panel-active">
                    <h4 class="modal-title">
                        @if(session('info'))
                            Vous payerez à la livraison <br>
                        @endif
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body alert alert-success">
                    <center>
                    <b>
                    @if(session('info'))
                        {!! session('info') !!}<br>
                    @endif

                    Nous vous remercions
                    </b>
                    </center>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer id="footer" class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <!-- footer logo -->
                        <div class="footer-logo">
                  <a class="logo" href="#">
                    <img src="{!! asset('customer/img/logo.png') !!}" alt="">
                  </a>
                        </div>
                        <!-- /footer logo -->

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

                        <!-- footer social -->
                        <ul class="footer-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                        <!-- /footer social -->
                    </div>
                </div>
                <!-- /footer widget -->

                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header"> </h3>
                        <ul class="list-links">
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer widget -->

                <div class="clearfix visible-sm visible-xs"></div>

                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Customer Service</h3>
                        <ul class="list-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Shiping & Return</a></li>
                            <li><a href="#">Shiping Guide</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer widget -->

                <!-- footer subscribe -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Stay Connected</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        <form>
                            <div class="form-group">
                                <input class="input" placeholder="Enter Email Address">
                            </div>
                            <button class="primary-btn">Join Newslatter</button>
                        </form>
                    </div>
                </div>
                <!-- /footer subscribe -->
            </div>
            <!-- /row -->
            <hr>
            <!-- row -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <!-- footer copyright -->
                    <div class="footer-copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <!-- /footer copyright -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </footer>
    <!-- /FOOTER -->


<!-- jQuery Plugins -->
    <script src="{!! asset('customer/js/jquery.min.js') !!}"></script>
    <script src="{!! asset('customer/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('customer/js/slick.min.js') !!}"></script>
    <script src="{!! asset('customer/js/nouislider.min.js') !!}"></script>
    <script src="{!! asset('customer/js/jquery.zoom.min.js') !!}"></script>
    <script src="{!! asset('customer/js/main.js') !!}"></script>

    <script type="text/javascript">
        

        @if(session()->has('message'))
            $("#myModal").modal('show');
        @endif 
    
        @if(session()->has('info'))
            $("#modalSendCommand").modal('show');
        @endif 
    </script>

</body>
</html>

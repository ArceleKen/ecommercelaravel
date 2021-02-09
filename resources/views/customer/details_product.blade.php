@extends('customer.layouts.app')

@section("css")
    <style>

    </style>
@stop

@section('content')

<!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Produits</a></li>
                <li><a href="#">Categorie</a></li>
                <li class="active">Product Name Goes Here</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            <div class="product-view">
                                <img src="{!! asset('customer/img/main-product01.jpg') !!}" alt="">
                            </div>
                            <div class="product-view">
                                <img src="{!! asset('customer/img/main-product02.jpg') !!}" alt="">
                            </div>
                            <div class="product-view">
                                <img src="{!! asset('customer/img/main-product03.jpg') !!}" alt="">
                            </div>
                            <div class="product-view">
                                <img src="{!! asset('customer/img/main-product04.jpg') !!}" alt="">
                            </div>
                        </div>
                        <div id="product-view">
                            <div class="product-view">
                                <img src="{!! asset('customer/img/thumb-product01.jpg') !!}" alt="">
                            </div>
                            <div class="product-view">
                                <img src="{!! asset('customer/img/thumb-product02.jpg') !!}" alt="">
                            </div>
                            <div class="product-view">
                                <img src="{!! asset('customer/img/thumb-product03.jpg') !!}" alt="">
                            </div>
                            <div class="product-view">
                                <img src="{!! asset('customer/img/thumb-product04.jpg') !!}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <h2 class="product-name">Product Name Goes Here</h2>
                            <h3 class="product-price">$32.50</h3>
                            <p><strong>Description:</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                            <div class="product-btns">
                                <div class="qty-input">
                                    <span class="text-uppercase">Quantité: </span>
                                    <input class="input" type="number" value="1">
                                </div>
                                <button class="primary-btn add-to-cart pull-right"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Autres produits</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Voir rapidement</button>
                            <img src="{!! asset('customer/img/product04.jpg') !!}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50</h3>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <div class="product-btns">
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Voir rapidement</button>
                            <img src="{!! asset('customer/img/product03.jpg') !!}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50</h3>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <div class="product-btns">
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Voir rapidement</button>
                            <img src="{!! asset('customer/img/product02.jpg') !!}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50 </h3>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <div class="product-btns">
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Voir rapidement</button>
                            <img src="{!! asset('customer/img/product01.jpg') !!}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50 </h3>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <div class="product-btns">
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->



@endsection



@section("scripts")
    <script>
        
    </script>
@stop
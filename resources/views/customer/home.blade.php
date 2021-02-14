@extends('customer.layouts.app')

@section("css")
    <style>

    </style>
@stop

@section('content')

<!-- HOME -->
    <div id="home">
        <!-- container -->
        <div class="container">
            <!-- home wrap -->
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">
                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{!! asset('customer/img/banner01.jpg') !!}" alt="">
                        <div class="banner-caption text-center">
                            <h1>Plusieurs produits</h1>
                            <button class="primary-btn">Commander</button>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{!! asset('customer/img/banner02.jpg') !!}" alt="">
                        <div class="banner-caption">
                            <h1 class="primary-color">Très intéressant<br></h1>
                            <button class="primary-btn">Commander</button>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{!! asset('customer/img/banner03.jpg') !!}" alt="">
                        <div class="banner-caption">
                            <h1 class="white-color">Nouvelle <span>Collection</span> Produits </h1>
                            <button class="primary-btn">Commander</button>
                        </div>
                    </div>
                    <!-- /banner -->
                </div>
                <!-- /home slick -->
            </div>
            <!-- /home wrap -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOME -->

<!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="{!! url('/products') !!}">
                        <img src="{!! asset('customer/img/banner10.jpg') !!}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NOUVELLE COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="{!! url('/products') !!}">
                        <img src="{!! asset('customer/img/banner11.jpg') !!}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NOUVELLE COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                    <a class="banner banner-1" href="{!! url('/products') !!}">
                        <img src="{!! asset('customer/img/banner12.jpg') !!}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NOUVELLE COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

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
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Offres du jour</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->

                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="{!! asset('customer/img/banner14.jpg') !!}" alt="">
                        <div class="banner-caption">
                            <h2 class="white-color">NOUVELLE<br>COLLECTION</h2>
                            <button class="primary-btn">Commander</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- Product Slick -->
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                            @foreach($products as $elt)
                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <a class="main-btn quick-view" href="{!! url('/detailsproduct/'.$elt->id) !!}"><i class="fa fa-search-plus"></i> Voir rapidement</a>
                                    <img src="{!! asset('customer/img/'.$elt->main_image) !!}" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">{!! $elt->price !!} FCFA</h3>
                                    <h2 class="product-name"><a href="{!! url('/detailsproduct/'.$elt->id) !!}">{!! $elt->name !!}</a></h2>
                                    <div class="product-btns">
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->

        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
    

    <!-- section -->
    <div class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-8">
                    <div class="banner banner-1">
                        <img src="{!! asset('customer/img/banner13.jpg') !!}" alt="">
                        <div class="banner-caption text-center">
                            <h1 class="primary-color">Produits intéressantes<br></h1>
                            <button class="primary-btn">Commander</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="{!! url('/products') !!}">
                        <img src="{!! asset('customer/img/banner11.jpg') !!}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NOUVELLE COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="{!! url('/products') !!}">
                        <img src="{!! asset('customer/img/banner12.jpg') !!}" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NOUVELLE COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->
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
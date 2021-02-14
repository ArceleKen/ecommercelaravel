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
                <li><a href="{!! url('/') !!}">Accueil</a></li>
                <li><a href="{!! url('/products/0') !!}">Produits</a></li>
                <li><a href="{!! url('/products/'.$product->categorie_id) !!}">{!! $product->categorie->name !!}</a></li>
                <li class="active">{!! $product->name !!}</li>
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
                                <img src="{!! asset('customer/img/'.$product->main_image) !!}" alt="">
                            </div>
                            <!-- @foreach($product->images as $elt)
                            <div class="product-view">
                                <img src="{!! asset('customer/img/'.$elt->name) !!}" alt="">
                            </div>
                            @endforeach -->
                        </div>
                        <div id="product-view">
                            <div class="product-view">
                                <img src="{!! asset('customer/img/'.$product->main_image) !!}" alt="">
                            </div>
                            <!-- @foreach($product->images as $elt)
                            <div class="product-view">
                                <img src="{!! asset('customer/img/'.$elt->name) !!}" alt="">
                            </div>
                            @endforeach -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <h2 class="product-name">{!! $product->name !!}</h2>
                            <h3 class="product-price">{!! $product->price !!} FCFA</h3>
                            <p><strong>Description:</p>
                            <p>{!! $product->description !!}</p>

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

                @foreach($products as $elt)
                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
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
                </div>
                <!-- /Product Single -->
                @endforeach

                
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
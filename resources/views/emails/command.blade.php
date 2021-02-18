<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        E-commerce
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

    M, Mme, <b> {{$nom}} </b> nous allons vous contacter le plus rapidement possible pour la livraison de produits commandés.<br><br>
    Il est possible d'annuler votre commande en repondant simplement à ce mail.

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    @if (isset($cart) && count($cart)>0)
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Détails de la commande</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th></th>
                                    <th class="text-center">Prix</th>
                                    <th class="text-center">Quantité</th>
                                    <th class="text-center">Total</th>
                                </tr> 
                            </thead>
                            <tbody>
                                <!-- Initialisation du total général à 0 -->
                                @php $total = 0 @endphp

                                <!-- On parcourt les produits du panier en session : session('basket') -->
                                @foreach($cart as $key => $item)

                                    <!-- On incrémente le total général par le total de chaque produit du panier -->
                                    @php $total += $item['price'] * $item['quantity'] @endphp
                                    
                                    <tr>
                                        <td class="thumb"><img src="{!! asset('customer/img/'.$item['main_image']) !!}" alt=""></td>
                                        <td class="details">
                                            <a href="#">{{ $item['name'] }}</a>
                                        </td>
                                        <td class="price text-center"><strong>{{ $item['price'] }} FCFA</strong><br></td>
                                        <td class="qty text-center">{{ $item['quantity'] }}</td>
                                        <td class="total text-center"><strong class="primary-color">{{ $item['price'] * $item['quantity'] }} FCFA</strong></td>
                                    </tr>
                                @endforeach

                                
                            </tbody>
                            <tfoot>
                                <!-- <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>SUBTOTAL</th>
                                    <th colspan="2" class="sub-total">$97.50</th>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>SHIPING</th>
                                    <td colspan="2">Free Shipping</td>
                                </tr> -->
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>TOTAL GENERAL:</th>
                                    <th class="total" colspan="1">{{ $total }} FCFA</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    @else
                    <div class="alert alert-danger">Aucun produit commandé</div>
                    @endif

                </div>
            </div>
        </div>
    </div>

</body>
</html>
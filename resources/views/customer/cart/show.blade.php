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
                <li class="active">Details Panier</li>
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
                <div class="col-md-12">
                    @if (session()->has("cart") && session('totalQuantity')>0)
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
                                    <th class="text-right">
                                        <!-- Lien pour vider le panier -->
                                        <a class="btn btn-danger" href="{{ route('cart.empty') }}" title="Retirer tous les produits du panier" ><i class="fa fa-trash"></i> Vider le panier</a>
                                    </th>
                                </tr> 
                            </thead>
                            <tbody>
                                <!-- Initialisation du total général à 0 -->
                                @php $total = 0 @endphp

                                <!-- On parcourt les produits du panier en session : session('basket') -->
                                @foreach(session("cart") as $key => $item)

                                    <!-- On incrémente le total général par le total de chaque produit du panier -->
                                    @php $total += $item['price'] * $item['quantity'] @endphp
                                    
                                    <tr>
                                        <td class="thumb"><img src="{!! asset('customer/img/'.$item['main_image']) !!}" alt=""></td>
                                        <td class="details">
                                            <a href="#">{{ $item['name'] }}</a>
                                        </td>
                                        <td class="price text-center"><strong>{{ $item['price'] }} FCFA</strong><br></td>
                                        <td class="qty text-center"><input class="input inputqty" type="number" value="{{ $item['quantity'] }}" min="1" id="{!! $key !!}"></td>
                                        <td class="total text-center"><strong class="primary-color">{{ $item['price'] * $item['quantity'] }} FCFA</strong></td>
                                        <td class="text-right"><a class="main-btn icon-btn" href="{{ route('cart.remove', $key) }}"><i class="fa fa-close"></i></a></td>
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
                        <div class="pull-right">
                            <a class="primary-btn" href="{{ url('/infoscommand') }}">Passer la commande</a>
                        </div>
                    </div>

                    @else
                    <div class="alert alert-danger">Le panier est vide</div>
                    @endif
                    <a href="{{ url('/products/0') }}" class="btn btn-primary pull-left">Poursuivre les achats</a>

                </div>
            </div>
        </div>
    </div>



@endsection


<script src="{!! asset('customer/js/jquery.min.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function() { 
        
        $(".inputqty").focusout(function() { 
            var qty = $(this).val(); 
            var idProd = $(this).attr("id"); 
            param = {"quantity":qty, "idProd":idProd};
            $.ajax({
                url: "{!! url('/updateqty') !!}",
                type: "POST", 
                dataType: 'json',
                data: param, 
                success: function(result){
                    location.reload();
                }

            });
        });
    });
</script>
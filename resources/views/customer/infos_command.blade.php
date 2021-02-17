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
                <li class="active">Passer la commande</li>
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
                <form id="checkout-form" class="clearfix" method="POST" action="{{ url('/sendcommand') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="col-md-6">
                        <div class="billing-details">
                            <!-- <p>Already a customer ? <a href="#">Login</a></p> -->
                            <div class="section-title">
                                <h3 class="title">Entrez vos informations (Vous payerez à la livraison)</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="firstname" placeholder="Votre nom" required="true">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="lastname" placeholder="Votre prenom">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Adresse Email" required="true">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Addresse">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="Ville">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Pays">
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="Telephone" required="true">
                            </div>
                            <div class="form-group">
                                <textarea class="input" name="comment" placeholder="Un commentaire">
                                    Un commentaire svp
                                </textarea>
                            </div>
                            <!-- <div class="form-group">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="register">
                                    <label class="font-weak" for="register">Create Account?</label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                            </p>
                                                <input class="input" type="password" name="password" placeholder="Enter Your Password">
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="pull-right">
                            <button class="primary-btn" type="submit">Valider la commande</button>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                                            <td class="qty text-center"><input class="input inputqty" readonly="readonly" type="number" value="{{ $item['quantity'] }}" min="1" id="{!! $key !!}"></td>
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
                        <div class="alert alert-danger">Le panier est vide</div>
                        @endif

                    </div>
                </form>
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
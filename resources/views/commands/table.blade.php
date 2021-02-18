<style>
    .show {
        margin-right:5%;
    }
    .edit{
        margin-left:5%;
    }
</style>
<div class="table-responsive">
    <table class="table table-responsive table-bordered example" id="userModels-table">
        <thead>
            <tr>
                <th>date modif</th>
                <th>Email</th>
                <th>num_command</th>
                <th>status</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Addresse</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Tel</th>
                <th>Commentaire</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($commands as $item)
            <tr>
                <td>{!! $item->updated_at !!}</td>
                <td>{!! $item->user->email !!}</td>
                <td>{!! $item->num_command !!}</td>
                <td style="background-color: @if($item->status == 0)  #28a745 @else #ffffff @endif;">
                    @if($item->status == 0)
                        En cours
                    @endif
                    @if($item->status == 1)
                        Livrée
                    @endif
                    @if($item->status == 2)
                        Annulée
                    @endif
                </td>
                <td>{!! $item->firstname !!}</td>
                <td>{!! $item->lastname !!}</td>
                <td>{!! $item->address !!}</td>
                <td>{!! $item->city !!}</td>
                <td>{!! $item->country !!}</td>
                <td>{!! $item->tel !!}</td>
                <td>{!! $item->comment  !!}</td>

                <td>
                    <div class=''>
                             <button class='btn btn-primary' data-toggle="modal" data-target="#modaldetails{!! $item->num_command !!}"> <i class="glyphicon glyphicon-eye-open"></i></button>
                             <!-- Modal -->
                              <div class="modal fade" id="modaldetails{!! $item->num_command !!}" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h3 class="modal-title">details commande numero {!! $item->num_command !!}</h3>
                                    </div>
                                    <div class="modal-body">
                                        @if(count($item->commandproducts) > 0 )
                                        <div class="order-summary clearfix">
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
                                                    @foreach($item->commandproducts as $elt)

                                                        <!-- On incrémente le total général par le total de chaque produit du panier -->
                                                        @php $total += $elt->quantity * $elt->product->price @endphp
                                                        
                                                        <tr>
                                                            <td class="thumb"><img src="{!! asset('customer/img/'.$elt->product->main_image) !!}" alt=""></td>
                                                            <td class="details">
                                                                <a href="#">{{ $elt->product->name }}</a>
                                                            </td>
                                                            <td class="price text-center"><strong>{{ $elt->product->price }} FCFA</strong><br></td>
                                                            <td class="qty text-center">{{ $elt->quantity }}</td>
                                                            <td class="total text-center"><strong class="primary-color">{{ $elt->quantity * $elt->product->price }} FCFA</strong></td>
                                                        </tr>
                                                    @endforeach

                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="empty" colspan="3"></th>
                                                        <th>TOTAL GENERAL:</th>
                                                        <th class="total" colspan="1">{{ $total }} FCFA</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        @else
                                        <div class="alert alert-danger">Commande vide</div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>



                            <button class='btn btn-success' data-toggle="modal" data-target="#modaledit{!! $item->num_command !!}"> <i class="glyphicon glyphicon-edit"></i> </button>
                            <!-- Modal -->
                              <div class="modal fade" id="modaledit{!! $item->num_command !!}" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Modier le status de la commande</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('/changedstatuscommand') }}">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="idCommand" value="{!! $item->id !!}">
                                            <div class="form-group">
                                                <select name="status" class="form-control" placeholder="status" name="status" required="true">
                                                    <option>status</option>
                                                    <option value="0">en cours</option>
                                                    <option value="1">livrée</option>
                                                    <option value="2">annulée</option>
                                                </select>
                                                <button class="btn btn-primary" type="submit">valider</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
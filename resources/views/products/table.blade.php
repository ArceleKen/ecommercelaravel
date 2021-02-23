<style>
    .show {
        margin-right:5%;
    }
    .edit{
        margin-left:5%;
    }
</style>
<div class="table-responsive">
    <table class="shopping-cart-table table table-responsive table-bordered example" id="userModels-table">
        <thead>
            <tr>
                <th>date creation</th>
                <th>date modification</th>
                <th>status</th>
                <th></th>
                <th>nom</th>
                <th>price</th>
                <th>description</th>
                <th>categorie</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productslist as $item)
            <tr>
                <td>{!! $item->created_at !!}</td>
                <td>{!! $item->updated_at !!}</td>
                <td style="">
                    @if($item->status == 0)
                        <i class="fa fa-circle text-danger"></i>
                    @endif
                    @if($item->status == 1)
                        <i class="fa fa-circle text-success"></i>
                    @endif
                </td>
                <td class="thumb"><img src="{!! asset('customer/img/'.$item->main_image) !!}" alt=""></td>
                <td>{!! $item->name !!}</td>
                <td>{!! $item->price !!}</td>
                <td>{!! $item->description !!}</td>
                <td>{!! $item->categorie->name !!}</td>
                <td>
                    <div class=''>
                            <button class='btn btn-success' data-toggle="modal" data-target="#modaledit{!! $item->id !!}"> <i class="glyphicon glyphicon-edit"></i> </button>
                            <!-- Modal -->
                              <div class="modal fade" id="modaledit{!! $item->id !!}" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Modier produit</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('/updateproduct') }}" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="idProduct" value="{!! $item->id !!}">
                                            <div class="form-group">
                                                <label for="name">nom: </label>
                                                <input type="text" class="form-control" name="name" id="name" value="{!! $item->name !!}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Prix: </label>
                                                <input type="number" class="form-control" name="price" id="price" value="{!! $item->price !!}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">description: </label>
                                                <textarea name="description" class="form-control" id="description" required>{!! $item->description !!}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">status: </label>
                                                <select name="status" id="status" class="form-control" placeholder="status" name="status" required="true" >
                                                    <option value="0">desactivée</option>
                                                    <option value="1">activée</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="categorie_id">categorie: </label>
                                                <select name="categorie_id" id="categorie_id" class="form-control" placeholder="categorie"required="true" >
                                                    <option value=""></option>
                                                    @foreach($categorieslist as $elt)
                                                    <option value="{!! $elt->id !!}">{!! $elt->name !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="main_image">Image: </label>
                                                <input type="file" class="form-control" name="main_image" id="main_image" >
                                            </div><br>
                                            <button class="btn btn-primary" type="submit">valider</button>
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
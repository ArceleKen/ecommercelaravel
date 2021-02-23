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
                <th>date creation</th>
                <th>date modification</th>
                <th>status</th>
                <th>nom</th>
                <th>description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categorieslist as $item)
            <tr>
                <td>{!! $item->created_at !!}</td>
                <td>{!! $item->updated_at !!}</td>
                <td style="background-color: @if($item->status == 0) #d9534f @else #ffffff @endif;">
                    @if($item->status == 0)
                        <i class="fa fa-circle text-danger"></i>
                    @endif
                    @if($item->status == 1)
                        <i class="fa fa-circle text-success"></i>
                    @endif
                </td>
                <td>{!! $item->name !!}</td>
                <td>{!! $item->description !!}</td>

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
                                      <h4 class="modal-title">Modier categorie</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('/updatecategorie') }}">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="idCategorie" value="{!! $item->id !!}">
                                            <div class="form-group">
                                                <label for="name">nom: </label>
                                                <input type="text" class="form-control" name="name" id="name" value="{!! $item->name !!}" required>
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
                                                </select><br>
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
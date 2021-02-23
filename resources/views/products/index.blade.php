@extends('layouts.app')

@section('content')
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
    
    <section class="content-header">
        <h1>
            Produits
            <small>Liste des produits</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des produits</li>
        </ol>

    </section>

 
    <br/>

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-primary">

            <div class="box-header">
                <div class="row"><br>
                    <div class="col-lg-6">
                        <h3 class="">
                            Liste des produits</small>
                        </h3>
                    </div>

                    <div class="col-lg-6">
                        <h3 class="pull-right">
                            {{-- @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('create_user')) --}}
                                <button class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modalcreate">Nouvel produit</button>

                                <!-- Modal -->
                              <div class="modal fade" id="modalcreate" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Nouvel produit</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('/createproduct') }}" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label for="name">nom: </label>
                                                <input type="text" class="form-control" name="name" id="name" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Prix: </label>
                                                <input type="number" class="form-control" name="price" id="price" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">description: </label>
                                                <textarea name="description" class="form-control" id="description" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">status: </label>
                                                <select name="status" id="status" class="form-control" placeholder="status" name="status" required="true" >
                                                    <option value="0">desactivée</option>
                                                    <option value="1">activée</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="categorie">categorie: </label>
                                                <select name="categorie_id" id="categorie_id" class="form-control" placeholder="categorie" required="true" >
                                                    <option value=""></option>
                                                    @foreach($categorieslist as $elt)
                                                    <option value="{!! $elt->id !!}">{!! $elt->name !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="main_image">Image: </label>
                                                <input type="file" class="form-control" name="main_image" id="main_image" required="true">
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
                            {{-- @endif --}}

                        </h3>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <br/>
                    @include('products.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </section>
@endsection


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
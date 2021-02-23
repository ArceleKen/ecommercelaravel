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
            Categories
            <small>Liste des categories</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des categories</li>
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
                            Liste des categories</small>
                        </h3>
                    </div>

                    <div class="col-lg-6">
                        <h3 class="pull-right">
                            {{-- @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('create_user')) --}}
                                <button class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modalcreate">Nouvelle Catégorie</button>

                                <!-- Modal -->
                              <div class="modal fade" id="modalcreate" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Nouvel categorie</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('/createcategorie') }}">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label for="name">nom: </label>
                                                <input type="text" class="form-control" name="name" id="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">description: </label>
                                                <textarea name="description" class="form-control" id="description" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">status: </label>
                                                <select name="status" id="status" class="form-control" placeholder="status" name="status" required="true">
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
                            {{-- @endif --}}

                        </h3>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <br/>
                    @include('categories.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </section>
@endsection


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
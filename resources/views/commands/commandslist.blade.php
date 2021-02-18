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
            Commandes
            <small>Liste des commandes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des Commandes</li>
        </ol>

    </section>

 
    <br/>

    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-primary">

            <div class="box-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="">
                            Liste des Commandes</small>
                        </h3>
                    </div>

                    <div class="col-lg-6">
                        <h3 class="pull-right">
                            <!-- @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('create_user'))
                                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}">Nouvel Commande</a>
                            @endif -->
                        </h3>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <br/>
                    @include('commands.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </section>
@endsection


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
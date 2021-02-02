@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Utilisateurs
            <small>  D&eacute;tails de l'utilisateur</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('lister_user'))
                <li>
                    <a class="" rel="alternate" href="{!! url('/users') !!}">
                        <i class="fa fa-user"></i> <span>Utilisateurs</span>
                    </a>
                </li>
            @endif
            <li class="active">  D&eacute;tails de l'utilisateur</li>
        </ol>

    </section>
    <br/>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="">
                            D&eacute;tails d'un utilisateur</small>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <br/>
                    @include('users.show_fields')

                    <div class="form-group col-lg-12">
                        <div class="col-md-3 col-lg-offset-3 ">
                            <a href="{!! route('users.index') !!}" class="btn btn-danger" style="float: right"> Retour</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-success'> Modifier</a>                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

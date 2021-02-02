@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Utilisateurs
            <small>Liste des utilisateurs</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des Utilisateurs</li>
        </ol>

    </section>

 {{--   <section class="content-header">
        <h1 class="pull-left">Liste des utilisateurs</h1>
        <h1 class="pull-right">
            @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('create_user'))
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}">Nouvel utilisateur</a>
            @endif
        </h1>
    </section>--}}
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
                            Liste des utilisateurs</small>
                        </h3>
                    </div>

                    <div class="col-lg-6">
                        <h3 class="pull-right">
                            @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('create_user'))
                                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}">Nouvel utilisateur</a>
                            @endif
                        </h3>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <br/>
                    @include('users.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </section>
@endsection


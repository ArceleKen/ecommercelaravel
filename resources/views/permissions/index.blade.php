@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Permissions
            <small>Liste des permissions</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des permissions</li>
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
                            Liste des permissions</small>
                        </h3>
                    </div>

                    {{--<div class="col-lg-6">
                        <h3 class="pull-right">
                            @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('create_permission'))
                                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('permissions.create') !!}">Ajouter une permission</a>
                            @endif
                        </h3>
                    </div>--}}
                </div>
            </div>

            <div class="box-body">
                <br/>
                    @include('permissions.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </section>

@endsection


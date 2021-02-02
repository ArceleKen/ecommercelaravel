@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            R&ocirc;le
            <small>  D&eacute;tails d'un r&ocirc;le</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('lister_role'))
                <li>
                    <a class="" rel="alternate" href="{!! url('/roles') !!}">
                        <i class="fa fa-cogs"></i> <span>Roles</span>
                    </a>
                </li>
            @endif
            <li class="active">  D&eacute;tails d'un r&ocirc;le</li>
        </ol>

    </section>
    <br/>

    <section class="content-header">
        <h1 class="pull-left">
            D&eacute;tails du r&ocirc;le
        </h1>
        <h1 class="pull-right">
            @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('create_role'))
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('roles.create') !!}">D&eacute;tails r&ocirc;le</a>
            @endif
        </h1>
    </section>
    <br/><br/><br/>

    <div class="content">
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="">
                            D&eacute;tails d'un r&ocirc;le</small>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <br/>
                    @include('roles.show_fields',['permissions'=>$permissions])

                    <div class="form-group col-lg-12">
                        <div class="col-md-3 col-lg-offset-3 ">
                            <a href="{!! route('roles.index') !!}" class="btn btn-danger" style="float: right">Annuler</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{!! route('roles.edit', [$role->id]) !!}" class='btn btn-success'> Modifier</a>                        </div>
                        <div class="col-md-3"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

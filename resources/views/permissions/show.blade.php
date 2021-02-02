@extends('layouts.app')

@section('content')
    <section class="content-header">
    <h1>
        Permissions
        <small>  D&eacute;tails d'une permission</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('lister_permissions'))
            <li>
                <a class="" rel="alternate" href="{!! url('/permissions') !!}">
                    <i class="fa fa-lock"></i> <span>Permissions</span>
                </a>
            </li>
        @endif
        <li class="active">  D&eacute;tails d'une permission</li>
    </ol>

    </section>
    <br/>


    <div class="content">
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="">
                            D&eacute;tails d'une permission</small>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <br/>
                    @include('permissions.show_fields')

                    <div class="form-group col-lg-12">
                        <div class="col-md-3 col-lg-offset-3 ">
                            <a href="{!! route('permissions.index') !!}" class="btn btn-danger" style="float: right">Annuler</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{!! route('permissions.edit', [$permission->id]) !!}" class='btn btn-success'> Modifier</a>                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

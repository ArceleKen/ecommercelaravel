@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Permissions
            <small>Nouvelle permission</small>
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
            <li class="active">Nouvelle permission</li>
        </ol>

    </section>
    <br/>

    <section class="content">
        <div class="clearfix"></div>
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="">
                            Cr&eacute;ation d'une permission </small>

                        </h3>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <br/>
                    {!! Form::open(['route' => 'permissions.store']) !!}

                        @include('permissions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

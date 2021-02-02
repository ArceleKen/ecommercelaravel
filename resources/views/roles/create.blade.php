@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            R&ocirc;les
            <small>Nouveau r&ocirc;le</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('lister_role'))
                <li>
                    <a class="" rel="alternate" href="{!! url('/roles') !!}">
                        <i class="fa fa-cogs"></i> <span> Liste des R&ocirc;les</span>
                    </a>
                </li>
            @endif
            <li class="active">Nouveau r&ocirc;le</li>
        </ol>

    </section>
    <br/>

    <section class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="">
                            Cr&eacute;ation d'un r&ocirc;le

                        </h3>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <br/>
                    {!! Form::open(['route' => 'roles.store']) !!}

                        @include('roles.fields',["permissions"=>$permissions])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section("scripts")
    <script>
        $(function () {
            $("#checkAll").click(function (e) {
                if(!$(this).is(":checked")){
                    $("#roles-table").find("input[type='checkbox']").each(function () {
                        $(this).removeAttr("checked");
                    })
                }else{
                    $("#roles-table").find("input[type='checkbox']").each(function () {
                        $(this).attr("checked","on");
                    })
                }
            })
        })
    </script>
@endsection

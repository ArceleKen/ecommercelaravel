@extends('layouts.app')

@section("css")
    <style>
        li.jstree-node{
            padding-top: 17px;
        }
    </style>
@stop

@section('content')
    <section class="content-header">
        <h1>
            Accueil
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        </ol>

    </section>
    <br/>

    <section class="content">

        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="">
                            Accueil

                        </h3>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                  <h3 style="text-align: center">Bienvenue sur <b>E-Commerce.</b></h3>
                </div>
            </div>
        </div>
    
</section>
@endsection

@section("scripts")
    <script>
        
    </script>
@stop
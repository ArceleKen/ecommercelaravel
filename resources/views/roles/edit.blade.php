@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            R&ocirc;les
            <small>Modifier r&ocirc;le</small>
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
            <li class="active">Modifier r&ocirc;le</li>
        </ol>

    </section>
    <br/>


   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-header">
               <div class="row">
                   <div class="col-lg-12">
                       <h3 class="">
                           Modification d'un r&ocirc;le

                       </h3>
                   </div>
               </div>
           </div>
           <div class="box-body">
               <div class="row">
                   <br/>
                   {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}

                        @include('roles.edit_fields',[
                            'role'=> $role,
                            "permissions"=>$permissions
                        ])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
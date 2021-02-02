@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Utilisateurs
            <small> Modifier utilisateur</small>
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
            <li class="active"> Modifier utilisateur</li>
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
                           Modification d'un utilisateur</small>

                       </h3>
                   </div>
               </div>
           </div>
           <div class="box-body">
               <div class="row">
                   <br/>
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                        @include('users.edit_fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </section>
@endsection
@include('users.checkall')
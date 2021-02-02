@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Permissions
            <small>Modifier une permission</small>
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
            <li class="active">Modifier une permission</li>
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
                           Modification d'une permission </small>

                       </h3>
                   </div>
               </div>
           </div>
           <div class="box-body">
               <div class="row">
                   <br/>
                   {!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'patch']) !!}
<br/>
                        @include('permissions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
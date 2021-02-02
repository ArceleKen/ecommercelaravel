@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Logs
            <small>Liste des logs</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des logs</li>
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
                <div class="col-lg-12">
                    <h3 class="">
                        Liste des logs

                    </h3>
                </div>
            </div>
        </div>

        <div class="box-body">

            {!! Form::open(array('url' => url('/logs'), 'class'=>'form-horizontal', 'method' =>'POST' ))!!}

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                        {!!Form::label("date_debut", 'Date début', array('class' => 'col-sm-4 col-lg-4 col-md-4
                        control-label','style'=>'text-align:right') )!!}
                        <div class="col-sm-6 col-lg-6 col-md-6" style="margin-bottom: 12px;">
                            {!! Form::text('date_debut','', array('class' => 'form-control',
                            'required'=>'required', 'id'=>  'datetimepicker'))!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                        {!!Form::label("date_fin", 'Date  fin', array('class' => 'col-sm-4 col-lg-4 col-md-4
                        control-label','style'=>'text-align:right') )!!}
                        <div class="col-sm-6 col-lg-6 col-md-6" style="margin-bottom: 12px;">
                            {!! Form::text('date_fin','', array('class' => 'form-control datepicker',
                            'required'=>'required', 'id'=> 'datetimepicker12'))!!}
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">

                        {!!Form::label("user_id", 'Utilisateur', array('class' => 'col-sm-4 col-lg-4 col-md-4
                        control-label','style'=>'text-align:right') )!!}
                        <div class="col-sm-6 col-lg-6 col-md-6" style="margin-bottom: 12px;">
                            <select name="user_id" class="form-control select2" id="user_id">
                                <option value=""></option>
                                @foreach($users as $user)
                                <option value="{!! $user->id !!}"> {!! $user->login !!}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-sm-3 col-lg-3 col-md-3 control-label" style="text-align: right;">
                        {!! Form::submit('Soumettre', array('class' => 'btn btn-success ','style'=>' margin-top:
                       -3px;float:left')) !!}
                    </div>

                    <div class="col-sm-6 col-lg-6 col-md-6" style="margin-bottom: 12px;">



                    </div>
                </div>

            </div>


            {!!Form::close()!!}

            <br/>
            <hr/>

            <div class="table-responsive">

                @include('logs.table')
            </div>
        </div>
    </div>
    <div class="text-center">

    </div>
</section>
@endsection

@section('scripts')

<script>

    $(document).ready(function () {
        $('input').attr('autocomplete', 'off');
    });


</script>
@endsection
<div class="col-md-8 col-sm-8 col-lg-8 col-lg-offset-2">
    <!-- Id Field -->
    <!--div class="form-group row">
        {!! Form::label('id', 'Id:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('id', $permission->id , ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div-->

    <!-- Name Field -->
    <div class="form-group row">
        {!! Form::label('name', 'Nom:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('name', $permission->name , ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('description', 'Description:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::textarea('description',$permission->description, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>
    <!-- Guard Name Field -->
    <!--div class="form-group row">
        {!! Form::label('guard_name', 'Guard Name:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('guard_name', $permission->guard_name , ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div-->

    <!-- Created At Field -->
    <div class="form-group row">
        {!! Form::label('created_at', 'Cr&eacute;e le:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('created_at', $permission->created_at , ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>

    <!-- Updated At Field -->
    <div class="form-group row">
        {!! Form::label('updated_at', 'Modifi&eacute; le:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('created_at', $permission->updated_at , ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>

</div>

<div class="col-md-4 col-sm-4 col-lg-4"></div>

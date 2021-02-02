<div class="col-md-8 col-sm-8 col-lg-8 col-lg-offset-2">
    <!-- Name Field -->
    <div class="form-group row">
        {!! Form::label('name', 'Nom:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            @if( isset($permission))
                {!! Form::text('name', null, ['class' => 'form-control', 'readonly']) !!}
            @else
                {!! Form::text('name', null, ['class' => 'form-control', 'required'=>'required']) !!}
            @endif
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('description', 'description:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'required'=>'required']) !!}
        </div>
    </div>

    <!-- Guard Name Field -->
{{--    <div class="form-group row">
        {!! Form::label('guard_name', 'Guard Name:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('guard_name', null, ['class' => 'form-control', 'required'=>'required']) !!}
        </div>
    </div>--}}

    <!-- Submit Field -->
    <div class="form-group col-lg-12">
        <div class="col-md-3 col-lg-offset-3">
            <a href="{!! route('permissions.index') !!}" class="btn btn-danger ">Retour</a>
        </div>
        <div class="col-md-3">
             {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<div class="col-md-4 col-sm-4 col-lg-4"></div>
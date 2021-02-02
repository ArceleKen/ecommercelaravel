<div class="col-md-8 col-sm-8 col-lg-8 col-lg-offset-2">
    <!-- Id Field -->
    <!--div class="form-group row">
        {!! Form::label('id', 'Id:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('id', $role->id , ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div-->

    <!-- Name Field -->
    <div class="form-group row">
        {!! Form::label('name', 'Nom:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('name',$role->name, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>
    <!-- Description Field -->
    <div class="form-group row">
        {!! Form::label('description', 'Description:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::textarea('description',$role->description, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>

    <!-- Guard Name Field -->
    <!--div class="form-group row">
        {!! Form::label('guard_name', 'Guard Name:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('guard_name',$role->guard_name, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div-->

    <!-- Created At Field -->
    <div class="form-group row">
        {!! Form::label('created_at', 'Cr&eacute;e le:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('created_at',$role->created_at, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>

    <!-- Updated At Field -->
    <div class="form-group row">
        {!! Form::label('updated_at', 'Modifi&eacute; le:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('updated_at',$role->updated_at, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>

    <!-- permissions checkbox -->
    <div class="form-group row">
         {!! Form::label('permission', 'Permissions:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}

        <div class="col-md-8 col-sm-8 col-lg-8" >

            <table class="table table-responsive table-bordered example" id="roles-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $perm)
                        <tr>
                            <td>{!! $perm->name !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

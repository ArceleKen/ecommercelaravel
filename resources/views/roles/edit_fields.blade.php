<div class="col-md-8 col-sm-8 col-lg-8 col-lg-offset-2">
    <!-- Name Field -->
    <div class="form-group row">
        {!! Form::label('name', 'Nom:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('name', $role->name, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('description', 'Description:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::textarea('description', $role->description, ['class' => 'form-control', 'required'=>'required']) !!}
        </div>
    </div>

    <!-- Guard Name Field -->
{{--    <div class="form-group row">
        {!! Form::label('guard_name', 'Guard Name:', ['class' => 'control-label col-md-4 col-sm-4 col-lg-4']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            {!! Form::text('guard_name', null, ['class' => 'form-control', 'required'=>'required']) !!}
        </div>
    </div>--}}

    <div class="form-group row">
        {!! Form::label('permission', 'Permissions:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            <table class="table table-responsive table-bordered example" id="roles-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Cocher/Decocher</th>
                </tr>
                </thead>
                <tbody>
                @if(count($permissions))
                    @foreach($permissions as $perm)
                        <tr>
                            <td>{!! $perm->name !!}</td>
                            <td>
                                <label>
                                    <input type="checkbox" name="permissions[]" {{$role->hasPermissionTo($perm->name)?"checked":""}} value="{!! $perm->name !!}">
                                </label>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-lg-12">
        <div class="col-md-3 col-lg-offset-3">
            <a href="{!! route('roles.index') !!}" class="btn btn-danger">Retour</a>
        </div>
        <div class="col-md-3">
            {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<div class="col-md-8 col-sm-8 col-lg-8 col-lg-offset-2">
    <!-- Name Field -->
    <div class="form-group row">
        {!! Form::label('name', 'Nom:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::text('name', null, ['class' => 'form-control', 'required'=>'required']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('description', 'description:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'required'=>'required']) !!}
        </div>
    </div>


    <br/>

    <div class="form-group row">
        {!! Form::label('permission', 'Permissions:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-8 col-sm-8 col-lg-8">
            <table class="table table-responsive table-bordered example" id="roles-table">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Cocher</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>tout cocher/décocher</td>
                    <td>
                        <label>
                            <input type="checkbox" name="" id="checkAll">
                        </label>
                    </td>
                </tr>
                @foreach($permissions as $perm)
                    <tr>
                        <td>{!! $perm->name !!}</td>
                        <td>
                            <label>
                                <input type="checkbox" name="permissions[]" value="{!! $perm->name !!}">
                            </label>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Submit Field -->
    <div class="form-group col-lg-12">
        <div class="col-md-3 col-lg-offset-3">
            <a href="{!! route('roles.index') !!}" class="btn btn-danger ">Retour</a>
        </div>
        <div class="col-md-3">
            {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
        </div>
        <div class="col-md-3"></div>
    </div>

</div>


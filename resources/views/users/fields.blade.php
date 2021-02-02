<div class="col-md-6">
    <!-- Name Field -->
    <div class="form-group row">
        {!! Form::label('name', 'Nom:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3 col-lg-offset-1']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::text('name', null, ['class' => 'form-control', 'required'=>'required']) !!}
        </div>
    </div>

    <!-- Email Field -->
    <div class="form-group row">
        {!! Form::label('email', 'Email:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3 col-lg-offset-1']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::email('email', null, ['class' => 'form-control','required'=>'required']) !!}
        </div>
    </div>

    <!-- Login Field -->
    <div class="form-group row">
        {!! Form::label('login', 'Login:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3 col-lg-offset-1']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::text('login', null, ['class' => 'form-control','required'=>'required']) !!}
        </div>
    </div>



</div>

<div class="col-md-6">

    <div class="form-group row">
        {!! Form::label('password', 'Mot de passe:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3 col-lg-offset-1']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::password('password', ['class' => 'form-control','required'=>'required']) !!}
        </div>
    </div>


    <div class="form-group row">
        {!! Form::label('debut', 'Debut creneau:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3 col-lg-offset-1']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            <div class="row">
                <div class=" col-md-6 col-sm-6 col-lg-6">
                    <input type="number" min="0" max="23" name="hrd" class="form-control col-md-6 col-sm-6 col-lg-6" required="required" />h
                </div>
                <div class=" col-md-6 col-sm-6 col-lg-6">
                    <input type="number" min="0" max="59" name="mnd" class="form-control col-md-6 col-sm-6 col-lg-6" required="required"/>min
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group row">
        {!! Form::label('fin', 'Fin creneau:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3 col-lg-offset-1']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            <div class="row">
                <div class=" col-md-6 col-sm-6 col-lg-6">
                    <input type="number" min="0" max="23" name="hrf" class="form-control col-md-6 col-sm-6 col-lg-6" required="required"/>h
                </div>
                <div class=" col-md-6 col-sm-6 col-lg-6">
                    <input type="number" min="0" max="59" name="mnf" class="form-control col-md-6 col-sm-6 col-lg-6" required="required"/>min
                </div>
            </div>
        </div>
    </div>
</div>





<!-- role checkbox -->
<div class="form-group col-lg-12">
    <div class=" col-md-2 col-sm-2 col-lg-2" style="margin-left: 3%;">
        {!! Form::label('role', 'R&ocirc;le:', ['class' => 'control-label']) !!}
    </div>

    <div class="col-md-9 col-sm-9 col-lg-9" style="margin-left: -4%">

        <table class="text-center table table-responsive table-bordered example" id="roletable">
            <thead>
            <tr>
                <th>
                    Cocher/décocher
                    {{--<input type="checkbox" name="" id="checkAll">--}}
                </th>
                <th>
                     Role
                </th>
            </tr>

            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>
                        <input type="checkbox" name="roles[]" value="{!! $role->name !!}">
                    </td>
                    <td>

                        {!! $role->description !!}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
<br/><br/>
<!-- Submit Field -->
<div class="form-group col-lg-12">
    <div class="col-md-3 col-lg-offset-3 ">
        <a href="{!! route('users.index') !!}" class="btn btn-danger"> Retour</a>
    </div>
    <div class="col-md-3">
         {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
    </div>
    <div class="col-md-3"></div>
</div>



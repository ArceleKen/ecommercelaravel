<div class="col-md-6">

    <!-- Name Field -->
    <div class="form-group row">
        {!! Form::label('name', 'Nom:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3 col-lg-offset-1']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::text('name', $user->name, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>

    <!-- Email Field -->
    <div class="form-group row">
        {!! Form::label('email', 'Email:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3 col-lg-offset-1']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::email('email', $user->email, ['class' => 'form-control','readonly']) !!}
        </div>
    </div>

    <!-- Created at -->
    <div class="form-group row">
        {!! Form::label('created_at', 'Cr&eacute;e le:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3 col-lg-offset-1']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::text('created_at', $user->created_at, ['class' => 'form-control','readonly']) !!}
        </div>
    </div>

</div>

<div class="col-md-6">
    <!-- Login Field -->
    <div class="form-group row">
        {!! Form::label('login', 'Login:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::text('login', $user->login, ['class' => 'form-control','readonly']) !!}
        </div>
    </div>


    <!-- Updated at -->
    <div class="form-group row">
        {!! Form::label('updated_at', 'Modifi&eacute; le:', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::text('updated_at', $user->updated_at, ['class' => 'form-control','readonly']) !!}
        </div>
    </div>


    <div class="form-group row">
        {!! Form::label('crenau', 'Crenau de connexion', ['class' => 'control-label col-md-3 col-sm-3 col-lg-3']) !!}
        <div class="col-md-6 col-sm-6 col-lg-6">
            {!! Form::text('crenau', $user->debut . ' - ' . $user->fin, ['class' => 'form-control','readonly']) !!}
        </div>
    </div>


</div>

<!-- role checkbox -->
<div class="form-group col-lg-12">
    <div class=" col-md-2 col-sm-2 col-lg-2" style="margin-left: 3%;">
        {!! Form::label('role', 'R&ocirc;les:', ['class' => 'control-label']) !!}
    </div>

    <div class="col-md-9 col-sm-9 col-lg-9" style="margin-left: -4%">

        <table class="text-center table table-responsive table-bordered example">
            <thead>

            <th>
                Role
            </th>

            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>
                        {!! $role!!}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
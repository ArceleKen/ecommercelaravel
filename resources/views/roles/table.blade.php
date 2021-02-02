<div class="table-responsive">
    <table class="table table-responsive table-bordered example" id="roles-table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <!--th>Guard Name</th-->
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{!! $role->name !!}</td>

                <!--td>{!! $role->guard_name !!}</td-->
                <td>{!! $role->description !!}</td>

                <td>
                    {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                    <div class=''>
                        @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('detail_role'))
                            <a href="{!! route('roles.show', [$role->id]) !!}" class='btn btn-primary '><i class="glyphicon glyphicon-eye-open"></i></a>
                        @endif
                        @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('modif_role'))
                            <a href="{!! route('roles.edit', [$role->id]) !!}" class='btn btn-success'><i class="glyphicon glyphicon-edit"></i></a>
                        @endif
                        @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('delete_role'))
                             {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
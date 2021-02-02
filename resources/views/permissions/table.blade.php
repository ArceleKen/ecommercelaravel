<div class="table-responsive">
    <table class="table table-responsive table-bordered example" id="permissions-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <!--th>Guard Name</th-->
                {{--<th>Action</th>--}}
            </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{!! $permission->name !!}</td>
                <td>{!! $permission->description !!}</td>

                <!--td>{!! $permission->guard_name !!}</td-->
             {{--   <td>
                    {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'delete']) !!}
                    <div class=''>
                        @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('detail_permission'))
                            <a href="{!! route('permissions.show', [$permission->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-eye-open"></i></a>
                        @endif
                        @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('modif_permission'))
                            <a href="{!! route('permissions.edit', [$permission->id]) !!}" class='btn btn-success'><i class="glyphicon glyphicon-edit"></i></a>
                        @endif
                        @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('delete_permission'))
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
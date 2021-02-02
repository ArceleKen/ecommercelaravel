<style>
    .show {
        margin-right:5%;
    }
    .edit{
        margin-left:5%;
    }
</style>
<div class="table-responsive">
    <table class="table table-responsive table-bordered example" id="userModels-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Login</th>
                <th>Creneau</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userModels as $userModel)
            <tr>
                <td>{!! $userModel->name !!}</td>
                <td>{!! $userModel->email !!}</td>
                <td>{!! $userModel->login !!}</td>
                <td>{!! $userModel->debut  !!}  - {!! $userModel->fin  !!} </td>

                <td>
                    {!! Form::open(['route' => ['users.destroy', $userModel->id], 'method' => 'delete']) !!}
                    <div class=''>
                        @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('detail_user'))
                             <a href="{!! route('users.show', [$userModel->id]) !!}"  class='btn btn-primary'> <i class="glyphicon glyphicon-eye-open"></i></a>
                        @endif
                        @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('modif_user'))
                            <a href="{!! route('users.edit', [$userModel->id]) !!}" class='btn btn-success'> <i class="glyphicon glyphicon-edit"></i> </a>
                        @endif
                        @if(auth()->user()->hasrole('super_admin') || auth()->user()->can('delete_user'))
                             {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger delete', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
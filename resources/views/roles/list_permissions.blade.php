<div class="table-responsive">
    <table class="table table-responsive table-bordered" id="roles-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Cocher</th>
        </tr>
        </thead>
        <tbody>
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
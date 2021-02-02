<table class="table table-responsive example" id="example2">
    <thead>
    <tr>
        <th>Date</th>
        <th>Utilisateur</th>

        <th>Description</th>
        <th>Info Compl</th>

    </tr>
    </thead>
    <tbody>
    @foreach($logs as $log)
    <tr>
        <td>{!! $log->created_at !!}</td>
        <td>{!! $log->user->login !!}</td>
        <td>{!! $log->description !!}</td>
        <td>{!! $log->info_compl !!}</td>

    </tr>
    @endforeach
    </tbody>
</table>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    <a class="btn btn-default" href="{{ route('wallets.index', ['user' => $user]) }}">Show</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9">@lang('No Results Found.')</td>
            </tr>
        @endforelse
    </tbody>
</table>

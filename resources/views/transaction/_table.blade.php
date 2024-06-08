<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @forelse($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->title }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->type }}</td>
                <td>{{ $transaction->created_at }}</td>
                <td>{{ $transaction->updated_at }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="9">@lang('No Results Found.')</td>
            </tr>
        @endforelse
    </tbody>
</table>

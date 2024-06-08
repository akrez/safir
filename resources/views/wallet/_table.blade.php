<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Status</th>
            <th>Amount</th>
            <th>Transactioned At</th>
            <th>Des</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($wallets as $wallet)
            <tr>
                <td>{{ $wallet->id }}</td>
                <td>{{ $wallet->title }}</td>
                <td>{{ $wallet->status }}</td>
                <td>{{ $wallet->amount }}</td>
                <td>{{ $wallet->transactioned_at }}</td>
                <td>{{ $wallet->des }}</td>
                <td>{{ $wallet->created_at }}</td>
                <td>{{ $wallet->updated_at }}</td>
                <td>
                    <a class="btn btn-default"
                        href="{{ route('wallets.edit', ['user' => auth()->user(), 'wallet' => $wallet->id]) }}">Edit</a>
                    <a class="btn btn-default"
                        href="{{ route('transactions.deposit', ['user' => auth()->user(), 'wallet' => $wallet->id]) }}">Deposit</a>
                    <a class="btn btn-default"
                        href="{{ route('transactions.withdraw', ['user' => auth()->user(), 'wallet' => $wallet->id]) }}">Withdraw</a>
                    <a class="btn btn-default"
                        href="{{ route('transactions.index', ['user' => auth()->user(), 'wallet' => $wallet->id]) }}">Transactions</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9">@lang('No Results Found.')</td>
            </tr>
        @endforelse
    </tbody>
</table>

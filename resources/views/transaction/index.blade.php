@extends('dashboard')

@section('title', 'نمایش تراکنش ها ' . $wallet->title)

@section('content')
    <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
            <div class="card card-primary card-outline">

                <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3">Sum: <small>{{ $totalAmount }}</small></h3>
                    @foreach ($statItems as $statItem)
                        <h3 class="card-title p-3">
                            {{ ucfirst($statItem['type']) }}:
                            <small>{{ $statItem['count_type'] }}</small>
                        </h3>
                    @endforeach
                </div>

                @include('transaction._table', [
                    'transactions' => $transactions,
                ])
                @if ($transactions->hasPages())
                    {{ $transactions->onEachSide(5)->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection

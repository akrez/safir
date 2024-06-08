@extends('dashboard')

@section('title', 'پیش خوان')

@section('content')
    <div class="row">
        @foreach ($wallets as $wallet)
            <div class="col-lg-3 col-6">
                <div class="small-box {{ $wallet->amount >= 0 ? 'bg-success' : 'bg-danger' }}">
                    <div class="inner">
                        <h3>{{ $wallet->amount }}</h3>
                        <p>{{ $wallet->title }}</p>
                    </div>
                    <a class="btn btn-default bg-success w-100"
                        href="{{ route('transactions.deposit', ['user' => auth()->user(), 'wallet' => $wallet->id]) }}">Deposit</a>
                    <a class="btn btn-default bg-danger w-100"
                        href="{{ route('transactions.withdraw', ['user' => auth()->user(), 'wallet' => $wallet->id]) }}">Withdraw</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

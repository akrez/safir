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
                </div>
            </div>
        @endforeach
    </div>
@endsection

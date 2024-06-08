@extends('dashboard')

@section('title', 'واریز ' . $wallet->title)

@section('content')
    @include('transaction._form', [
        'type' => App\Enums\Transaction\TypeEnum::DEPOSIT->value,
        'wallet' => $wallet,
    ])
@endsection

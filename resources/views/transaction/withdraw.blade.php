@extends('dashboard')

@section('title', 'برداشت ' . $wallet->title)

@section('content')
    @include('transaction._form', [
        'type' => App\Enums\Transaction\TypeEnum::WITHDRAW->value,
        'wallet' => $wallet,
    ])
@endsection

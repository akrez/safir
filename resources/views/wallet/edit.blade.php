@extends('dashboard')

@section('title', 'ویرایش کیف پول جدید')

@section('content')
    @include('wallet._form', [
        'user' => $user,
        'wallet' => $wallet,
    ])
@endsection

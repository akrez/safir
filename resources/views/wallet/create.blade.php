@extends('dashboard')

@section('title', 'ساخت کیف پول جدید')

@section('content')
    @include('wallet._form', [
        'user' => $user,
    ])
@endsection

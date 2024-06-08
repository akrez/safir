@extends('dashboard')

@section('title', 'لیست کیف پول های من')

@section('content')
    <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                @include('wallet._table', [
                    'user' => $user,
                    'wallets' => $wallets,
                ])
                @if ($wallets->hasPages())
                    {{ $wallets->onEachSide(5)->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection

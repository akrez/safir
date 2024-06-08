@extends('dashboard')

@section('title', 'کاربران')

@section('content')
    <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                @include('user._table', [
                    'users' => $users,
                ])
                @if ($users->hasPages())
                    {{ $users->onEachSide(5)->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection

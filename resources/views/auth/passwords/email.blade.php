@extends('app')

@section('title', __('Reset Password'))

@section('content')

<div class="row">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="col-md-8 d-flex align-items-center">

        <form class="w-100" method="POST" action="{{ route('password.email') }}">

            <div class="row mb-3">
                <div class="col-md-4 col-form-label text-md-end">
                </div>
                <div class="col-md-6">
                    <h1>{{ __('Reset Password') }}</h1>
                </div>
            </div>

            @csrf

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-4">
        <img src="{{asset('assets/images/story/password-email.svg')}}" alt="">
    </div>
</div>
@endsection

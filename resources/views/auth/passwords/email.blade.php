@extends('layouts.login_app')

@section('content')
<div class=" w3l-form-group">
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <label>{{ __('Reset Password') }}</label>
        <div class="group">
            <i class="fas fa-user"></i>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Username" required="required" />
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="group">
            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>

    </form>
</div>

@endsection
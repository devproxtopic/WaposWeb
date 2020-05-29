@extends('layouts.login_app')

@section('content')

<h1 class=" w3l-register-p">{{ __('Verify Your Email Address') }}</h1>
<div class="verify-email-label">


    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }}, <a class="verify-email-label-bold" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>



   
</div>

<div class="w3l-register-p">

<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

@endsection
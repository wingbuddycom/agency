@extends('layouts.app')

@section('title', __('Login'))

@section('content')
    <h1 class="h4 mb-3">{{ __('Login') }}</h1>

    <form method="POST" action="{{ route('login.submit', ['locale' => app()->getLocale()]) }}" class="w-25">
        @csrf

        <div class="mb-3">
            <label class="form-label">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <input type="hidden" name="recaptcha_token" id="recaptcha-token">

        <button type="submit" class="btn btn-primary w-100">{{ __('Sign in') }}</button>
    </form>

    <script src="https://www.google.com/recaptcha/enterprise.js?render={{ env('RECAPTCHA_SITE_KEY') }}&hl={{ app()->getLocale() }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            grecaptcha.enterprise.ready(() => {
                grecaptcha.enterprise.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'login'})
                    .then(token => document.getElementById('recaptcha-token').value = token);
            });
        });
    </script>
@endsection

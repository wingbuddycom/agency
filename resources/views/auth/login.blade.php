@extends('layouts.noheader')

@section('title', __('Login'))

@section('content')
@php
    $banner = menu_banner();
@endphp
   <div class="row flex-column flex-md-row flex-nowrap fle-md-wrap h-sm-auto h-100">
       <div class="col-12 col-md-6 d-lg-block p-0 position-relative login-image-container">
           <img src="{{ $banner }}" alt="Wingbuddy" class="login-image">
           <div class="position-absolute bottom-0 w-100 h-100 text-center text-white p-4 login-quote-text d-flex justify-content-center">
               <h2 class="fw-semibold p-0 m-0 align-content-center">{{ __('content.login.quote') }}</h2>
           </div>
       </div>
       <div class="py-5 py-md-0 col-12 col-md-6 d-flex align-items-center justify-content-center position-relative">
           <nav class="login-language-menu navbar navbar-expand-lg navbar-light">
               <div class="ms-auto">@include('components.lang-switch')</div>
           </nav>
           <div class="login-box w-100 px-md-4 px-3 pt-5 pt-md-0">

               <h1 class="h4 mb-5 fw-semibold text-center">{{ __('content.login.title') }}</h1>

               <form method="POST" action="{{ route('login.submit', ['locale' => app()->getLocale()]) }}" class="login-form">
                   @csrf
                   <div class="mb-3">
                       <label for="loginEmail" class="form-label d-none">{{ __('Email') }}</label>
                       <input type="email" id="loginEmail" name="email" class="form-control" placeholder="{{ __('Email') }}" required autofocus>
                       <div class="invalid-feedback">
                       </div>
                   </div>

                   <div class="mb-3">
                       <label for="loginPassword" class="form-label d-none">{{ __('Password') }}</label>
                       <input type="password" id="loginPassword" name="password" class="form-control" placeholder="{{ __('Password') }}" required>
                       <div class="invalid-feedback">
                       </div>
                   </div>

                   <input type="hidden" name="recaptcha_token" id="recaptcha-token">

                   <button type="submit" class="btn btn-orange w-100 mb-5">{{ __('Sign in') }}</button>
                   <div class="text-muted small text-center">
                       <p class="mb-4 link-simple">{{ __('content.login.forgotPassword') }}</p>
                       <p class="mb-4">{{ __('content.login.registrationText') }} <a href="{{ __('content.login.registrationUrl') }}" title="{{ __('Register') }}" target="_blank" class="fw-semibold cursor-pointer link-orange link-simple">{{ __('Register') }}</a></p>
                       <p class="text-black-50">{{ __('content.general.copyRight') }}</p>
                   </div>

               </form>

           </div>
       </div>
   </div>

   <script
       src="https://www.google.com/recaptcha/enterprise.js?render={{ env('RECAPTCHA_SITE_KEY') }}&hl={{ app()->getLocale() }}"></script>
   <script>
       document.addEventListener('DOMContentLoaded', () => {
           grecaptcha.enterprise.ready(() => {
               grecaptcha.enterprise.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'login'})
                   .then(token => document.getElementById('recaptcha-token').value = token);
           });
       });
   </script>
   @endsection

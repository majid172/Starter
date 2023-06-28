@extends('admin.layouts.master')
@section('content')
<div class="login_area">
    <div class="login">
        <div class="login__header">
            <h2>{{ __($pageTitle) }}</h2>
            <p>{{ __($general->site_name) }} @lang('Dashboard')</p>
        </div>
        <div class="login__body">
           
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="field">
                    <input type="text" name="username" placeholder="@lang('Username')">
                    <span class="show-pass"><i class="fas fa-user"></i></span>
                </div>
                <div class="field">
                    <input type="password" name="password" placeholder="@lang('Password')">
                    <span class="show-pass"><i class="fas fa-lock"></i></span>
                </div>
                <div class="login__footer">
                    <div class="field_remember">
                        <div class="remember_wrapper">
                            <input type="checkbox" name="remember" id="remember">
                            <label class="remember" for="remember">@lang('Remember')</label>
                        </div>
                    </div>
                    <div class="field_foget">
                        <a href="{{ route('admin.password.reset') }}">@lang('Forgot password?')</a>
                    </div>
                </div>
                <x-captcha></x-captcha>
                <div class="field">
                    <button type="submit" class="sign-in">@lang('Sign in')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('style')
{{-- admin logoin css link --}}

@endpush


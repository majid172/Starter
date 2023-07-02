@extends('admin.layouts.master')
@section('content')
{{-- <div style="background-image: url('{{ asset('assets/admin/images/login.png') }}')" class="login_area">
    <div class="login">
        <div class="login__header">
            <h2>@lang('Reset Password')</h2>
            <p>@lang('Provide a new to log in')</p>
        </div>
        <div class="login__body">
            <!-- <h4>user login</h4> -->
            <form action="{{ route('admin.password.change') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="field">
                    <input type="password" name="password" placeholder="@lang('Password')" required>
                    <span class="show-pass"><i class="fas fa-lock"></i></span>
                </div>
                <div class="field">
                    <input type="password" name="password_confirmation" placeholder="@lang('Password Confirmation')"
                        required>
                    <span class="show-pass"><i class="fas fa-lock"></i></span>
                </div>
                <div class="field">
                    <button type="submit" class="sign-in">@lang('Reset')</button>
                </div>
                <div class="login__footer d-flex justify-content-center">
                    <a class="float-end" href="{{ route('admin.login') }}">@lang('Go back')</a>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              
              <h4>{{$pageTitle}}</h4>
              <h6 class="fw-light">@lang('Provide a new to log in')</h6>
              <form class="pt-3" action="{{ route('admin.password.change') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="@lang('Password')" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="@lang('Password Confirmation')" required>
                </div>
               
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">@lang('Reset Password')</button>
                </div>
                <div class="login__footer d-flex justify-content-center">
                    <a class="float-end" href="{{ route('admin.login') }}">@lang('Back to Home')</a>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@endsection

@push('style')
<link rel="stylesheet" href="{{asset('assets/admin/css/auth.css')}}">
@endpush
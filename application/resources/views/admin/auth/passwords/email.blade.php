@extends('admin.layouts.master')
@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              
              <h4>{{$pageTitle}}</h4>
              <h6 class="fw-light">@lang('We will sent an email to recover your account')</h6>
              <form class="pt-3" action="{{ route('admin.password.reset') }}" method="POST">
                @csrf
                <div class="form-group">
                    
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="@lang('Email')" value="{{ old('email') }}" required>
                </div>
               
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">@lang('Mail Send')</button>
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
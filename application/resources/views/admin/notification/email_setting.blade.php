@extends('admin.layouts.app')
@section('panel')

<div class="main-panel">
    <div class="content-wrapper">
        <button type="button" data-bs-target="#exampleModal" data-bs-toggle="modal" class="btn btn-sm btn-primary mb-3">@lang('Test
            Mail')</button>
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                @lang('Email testing')
              </button> --}}


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="mb-4">@lang('Email Send Method')</label>
                                <select name="email_method" class="form-control">
                                    <option value="php" @if($general->mail_config->name == 'php') selected @endif>@lang('PHP
                                        Mail')</option>
                                    <option value="smtp" @if($general->mail_config->name == 'smtp') selected
                                        @endif>@lang('SMTP')</option>
                                </select>
                            </div>
                            <div class="row mt-4 d-none configForm" id="smtp">
                                <div class="col-md-12">
                                    <h6 class="mb-2">@lang('SMTP Configuration')</h6>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="fw-bold">@lang('Host') </label>
                                        <input type="text" class="form-control" placeholder="e.g. @lang('smtp.googlemail.com')"
                                            name="host" value="{{ $general->mail_config->host ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="fw-bold">@lang('Port') </label>
                                        <input type="text" class="form-control" placeholder="@lang('Available port')"
                                            name="port" value="{{ $general->mail_config->port ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="fw-bold">@lang('Encryption')</label>
                                        <select class="form-control" name="enc">
                                            <option value="ssl" {{ $general->mail_config->enc == 'ssl' ? 'selected' : "" }}>@lang('SSL')</option>
                                            <option value="tls" {{ $general->mail_config->enc == 'tls' ? 'selected' : "" }}>@lang('TLS')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="fw-bold">@lang('Username') </label>
                                        <input type="text" class="form-control"
                                            placeholder="@lang('Normally your email') address" name="username"
                                            value="{{ $general->mail_config->username ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="fw-bold">@lang('Password') </label>
                                        <input type="text" class="form-control"
                                            placeholder="@lang('Normally your email password')" name="password"
                                            value="{{ $general->mail_config->password ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                        <div class="form-group mr-4 p-3 text-end">
                            <button type="submit" class="btn btn-primary btn-global ">@lang('Submit')</button>
                        </div>
                    </form>
                </div><!-- card end -->
            </div>
        
        
        </div>
       
        
      

        {{-- test  --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">@lang('Email testing')</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.setting.notification.email.test') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Sent to') </label>
                                    <input type="text" name="email" class="form-control"
                                        placeholder="@lang('Email Address')">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary">@lang('Send')</button>
                    </div>
              </div>
            </div>
          </div>
     

        
        {{-- TEST MAIL MODAL --}}
        {{-- <div id="testMailModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Send Test Email')</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="las la-times"></i>
                        </button>
                    </div>
                    <form action="{{ route('admin.setting.notification.email.test') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('Sent to') </label>
                                        <input type="text" name="email" class="form-control"
                                            placeholder="@lang('Email Address')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-global">@lang('Send')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
            
        
    </div>
</div>

@endsection
@push('breadcrumb-plugins')
<button type="button" data-bs-target="#testMailModal" data-bs-toggle="modal" class="btn btn-sm btn--primary">@lang('Test
    Mail')</button>
@endpush
@push('script')
<script>
    (function ($) {
        "use strict";

        var method = '{{ $general->mail_config->name }}';
        emailMethod(method);
        $('select[name=email_method]').on('change', function () {
            var method = $(this).val();
            emailMethod(method);
        });

        function emailMethod(method) {
            $('.configForm').addClass('d-none');
            if (method != 'php') {
                $(`#${method}`).removeClass('d-none');
            }
        }

    })(jQuery);

</script>
@endpush
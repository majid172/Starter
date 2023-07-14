@extends('admin.layouts.app')
@section('panel')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card overflow-hidden">
                    <h6 class="p-3">@lang('Subject wise short-code')</h6>
                    <div class="card-body p-0">
                        <div class="table-responsive table-responsive--sm">
                            <table class=" table align-items-center table--light">
                                <thead>
                                    <tr>
                                        <th>@lang('Short Code') </th>
                                        <th>@lang('Description')</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <tr>
                                        <td><span class="short-codes">@{{fullname}}</span></td>
                                        <td>@lang('Fullname')</td>
                                    </tr>
                                    <tr>
                                        <td><span class="short-codes">@{{username}}</span></td>
                                        <td>@lang('Username ')</td>
                                    </tr>
                                    <tr>
                                        <td><span class="short-codes">@{{message}}</span></td>
                                        <td>@lang('Message')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 ">
               
                <div class="card overflow-hidden">
                    <h6 class="p-3">@lang('Site Short Codes')</h6>
                    <div class="card-body p-0">
                        <div class="table-responsive table-responsive--sm">
                            <table class=" table align-items-center table--light">
                                <thead>
                                    <tr>
                                        <th>@lang('Short Code') </th>
                                        <th>@lang('Description')</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($general->global_shortcodes as $shortCode => $codeDetails)
                                    <tr>
                                        <td><span class="short-codes">@{{@php echo $shortCode @endphp}}</span></td>
                                        <td>{{ __($codeDetails) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                
        
        </div>
        
        <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ route('admin.setting.notification.global.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold">@lang('Email Sent From') </label>
                                    <input type="text" class="form-control " placeholder="@lang('Email address')"
                                        name="email_from" value="{{ $general->email_from }}" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold">@lang('Email Body') </label>
                                    <textarea name="email_template" rows="15" class="form-control  trumEdit"
                                        placeholder="@lang('Your email template')">{{ $general->email_template }}</textarea>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-global">@lang('Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- card end -->
        </div>
        </div>
        
    </div>
</div>
@endsection
@extends('admin.layouts.app')
@section('panel')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 mb-3">
                
                <div class="card overflow-hidden">
                    <h6 class="p-3">@lang('Default Short Codes')</h6>
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
        
        <form action="{{ route('admin.setting.notification.template.update',$template->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-4">
                        <h5 class="card-title p-3 text-secondary">@lang('Email Template')</h5>
                        <div class="card-body">
                            <div class="row">
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="fw-bold">@lang('Subject')</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="@lang('Email subject')" name="subject" value="{{ $template->subj }}"
                                            required />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="fw-bold">@lang('Message') <span class="text-danger">*</span></label>
                                        <textarea name="email_body" rows="10" class="form-control trumEdit"
                                            placeholder="@lang('Your message using short-codes')">{{ $template->email_body }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="email_status" {{
                                            $template->email_status ?
                                        'checked' : null }}id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">@lang('Status')</label>
                                    </div>

                                    
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-global mt-4">@lang('Submit')</button>
                            </div>
                        </div>
                    </div>
                </div>
        
                
            </div>
            
        </form>
    </div>
</div>
@endsection


@push('breadcrumb-plugins')
<a href="{{ route('admin.setting.notification.templates') }}" class="btn btn-sm btn--primary"><i
        class="las la-undo"></i> @lang('Back') </a>
@endpush
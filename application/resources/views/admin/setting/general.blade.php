@extends('admin.layouts.app')
@section('panel')
{{-- <div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-body px-4">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label class="required"> @lang('Site Title')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <input class="form-control" type="text" name="site_name" required
                                        value="{{$general->site_name}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label class="required">@lang('Currency')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <input class="form-control" type="text" name="cur_text" required
                                        value="{{$general->cur_text}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label class="required">@lang('Currency Symbol')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <input class="form-control" type="text" name="cur_sym" required
                                        value="{{$general->cur_sym}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label> @lang('Timezone')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <select class="select2-basic" name="timezone">
                                        @foreach($timezones as $timezone)
                                        <option value="'{{ @$timezone }}'">{{ __($timezone) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label> @lang('Site Base Color')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-text p-0 border-0">
                                            <input type='text' class="form-control colorPicker"
                                                value="{{$general->base_color}}" />
                                        </span>
                                        <input type="text" class="form-control colorCode" name="base_color"
                                            value="{{ $general->base_color }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-3 col-xs-4 d-flex align-items-center">
                                    <label> @lang('Site Secondary Color')</label>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-text p-0 border-0">
                                            <input type='text' class="form-control colorPicker"
                                                value="{{$general->secondary_color}}" />
                                        </span>
                                        <input type="text" class="form-control colorCode" name="secondary_color"
                                            value="{{ $general->secondary_color }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('User Registration')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="registration" {{
                                    $general->registration ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('Email Verification')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="ev" {{ $general->ev ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('Email Notification')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="en" {{ $general->en ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('Mobile Verification')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="sv" {{ $general->sv ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('SMS Notification')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="sn" {{ $general->sn ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 mb-4">
                            <label class="fw-bold">@lang('Terms & Condition')</label>
                            <label class="switch m-0">
                                <input type="checkbox" class="toggle-switch" name="agree" {{ $general->agree ?
                                'checked' : null }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                            <button type="submit" class="btn btn--primary btn-global">@lang('Save')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

{{-- section --}}
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{__($pageTitle)}}</h4>
              <p class="card-description">
                @lang('Basic configuration of your website')
              </p>
              <form class="forms-sample" method="POST" action="{{route('admin.setting.update')}}">
                @csrf
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputUsername1">@lang('Site Title')</label>
                            <input type="text" name="site_name" value="{{$general->site_name}}" class="form-control" id="exampleInputUsername1" placeholder="Username">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('Site Color')</label>
                            <input type="text" name="base_color" value="{{ $general->base_color }}" class="form-control" id="exampleInputPassword1" placeholder="currency text">
                          </div>
          
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('Site Secondary Color')</label>
                            <input type="text" name="secondary_color" value="{{ $general->secondary_color }}"  class="form-control" id="exampleInputPassword1" placeholder="currency text">
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('Time Zone')</label>
                            <select class="form-control select2-basic" name="timezone" >
                              @foreach($timezones as $timezone)
                                <option value="'{{ @$timezone }}'">{{ __($timezone) }}</option>
                              @endforeach
                            </select>



                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('Currency Symbol')</label>
                            <input type="text" name="cur_sym" value="{{$general->cur_sym}}" class="form-control" id="exampleInputEmail1" placeholder="Email">
                          </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('Currency Text')</label>
                            <input type="text" name="cur_text" value="{{__($general->cur_text)}}" class="form-control" id="exampleInputPassword1" placeholder="currency text">
                          </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('Number of Pagination')</label>
                            <input type="number" name="paginate_no" value="{{__($general->paginate_no)}}" class="form-control" id="exampleInputPassword1" placeholder="Pagination number">
                          </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-sm-3">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="ev" {{ $general->ev ?
                                'checked' : null }} id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">@lang('Email Verification')</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="en" {{ $general->en ?
                                'checked' : null }} id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">@lang('Email Notification')</label>
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                       
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="registration" {{ $general->registration ?
                                'checked' : null }}id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">@lang('User Registration')</label>
                        </div>
                        
                    </div>

                    <div class="col-sm-3">
                        
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="agree" {{ $general->agree ?
                                'checked' : null }}id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">@lang('ToC')</label>
                        </div>
                    </div>

                    
                </div>
                
                <button type="submit" class="btn btn-primary me-2">@lang('Submit')</button>
                
              </form>
            </div>
          </div>
        </div>
        
      </div>


      {{-- logo & favicon --}}
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">@lang('Logo & Favicon')</h4>
              <p class="card-description">
                @lang('Basic configuration of your website')
              </p>
              <form class="forms-sample" method="POST" action="{{route('admin.setting.logo.icon')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <input type="file"   accept=".png, .jpg, .jpeg" name="logo" class="file-upload-field form-control" />
                        <img src=" {{ getImage(getFilePath('logoIcon').'/logo.png', '?'
                        .time()) }}" alt="{{config('app.name')}}" class="logo">
                    </div>

                    <div class="col-lg-6 col-sm-12 mb-2">
                        <input type="file" accept=".png, .jpg, .jpeg"  name="favicon"
                                    class="file-upload-field form-control" />
                         <img src=" {{ getImage(getFilePath('logoIcon') .'/favicon.png', '?'
                                    .time()) }}" alt="{{config('app.name')}}" class="favicon">
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary me-2">@lang('Submit')</button>
                
              </form>
            </div>
          </div>
        </div>
        
      </div>




    </div>
</div>
@endsection

@push('script-lib')
<script src="{{ asset('assets/admin/js/spectrum.js') }}"></script>
@endpush

@push('style-lib')
<link rel="stylesheet" href="{{ asset('assets/admin/css/spectrum.css') }}">
@endpush

@push('script')
<script>
    (function ($) {
        "use strict";
        $('.colorPicker').spectrum({
            color: $(this).data('color'),
            change: function (color) {
                $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
            }
        });

        $('.colorCode').on('input', function () {
            var clr = $(this).val();
            $(this).parents('.input-group').find('.colorPicker').spectrum({
                color: clr,
            });
        });

        $('select[name=timezone]').val("'{{ config('app.timezone') }}'").select2();
        $('.select2-basic').select2({
            dropdownParent: $('.card-body')
        });
    })(jQuery);

</script>
@endpush
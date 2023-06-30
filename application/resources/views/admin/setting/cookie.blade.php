@extends('admin.layouts.app')
@section('panel')

<div class="main-panel">        
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{__($pageTitle)}}</h4>
            <p class="card-description">
              @lang('Cookie page settings')
            </p>
            <form class="forms-sample" method="POST" action="">
              @csrf
              
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>@lang('Status')</label>
                      <label class="switch m-0">
                        <input type="checkbox" class="toggle-switch" name="status" {{ @$cookie->data_values->status ?
                        'checked' : null }}>
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>@lang('Short Description')</label>
                  <textarea class="form-control" rows="5" required
                    name="short_desc">{{ @$cookie->data_values->short_desc }}</textarea>
                </div>
                <div class="form-group">
                  <label>@lang('Description')</label>
                  <textarea class="form-control trumEdit" rows="10"
                    name="description">@php echo @$cookie->data_values->description @endphp</textarea>
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
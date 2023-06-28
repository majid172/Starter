@extends('admin.layouts.app')
@section('panel')


<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{__($pageTitle)}}</h4>
               
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>@lang('User')</th>
                        <th>@lang('Email')</th>
                        <th>@lang('Joined At')</th>
                        <th>@lang('Balance')</th>
                        <th>@lang('Action')</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{__($user->fullname)}}</td>
                                <td>{{__($user->email)}}</td>
                                <td>{{ showDateTime($user->created_at) }}</td>
                                <td>{{ $general->cur_sym }}{{ showAmount($user->balance) }}</td>
                                <td class="text-danger">  
                                    <a title="@lang('User Profile')" href="{{ route('admin.users.detail', $user->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="las la-eye text--shadow"></i>
                                    </a>
                                </td>
                                
                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr>
                            @endforelse

                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection



@push('breadcrumb-plugins')
<div class="d-flex flex-wrap justify-content-end">
    <form action="" method="GET" class="form-inline">
        <div class="input-group justify-content-end">
            <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Search by Username')"
                value="{{ request()->search }}">
            <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
@endpush
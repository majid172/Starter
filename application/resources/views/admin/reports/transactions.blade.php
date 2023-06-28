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
                        <th>@lang('Transaction number')</th>
                        <th>@lang('Date')</th>
                        <th>@lang('Amount')</th>
                        <th>@lang('Post Balance')</th>
                        <th>@lang('Details')</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $trx)
                            <tr>
                                <td>
                                    <a href="{{ appendQuery('search',$trx->user->username) }}">{{
                                        $trx->user->fullname }}</a>
                                </td>

                                <td>
                                    <strong>{{ $trx->trx }}</strong>
                                </td>

                                <td>
                                    {{ showDateTime($trx->created_at) }}
                                </td>

                                <td class="budget">
                                    <span class="fw-bold">
                                        {{ $trx->trx_type }} {{showAmount($trx->amount)}} {{ $general->cur_text }}
                                    </span>
                                </td>

                                <td class="budget">
                                    {{ showAmount($trx->post_balance) }} {{ __($general->cur_text) }}
                                </td>

                                <td>{{ __($trx->details) }}</td>
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

              @if($transactions->hasPages())
              <div class="card-footer py-4">
                  {{ paginateLinks($transactions) }}
              </div>
              @endif
            </div>
          </div>
      </div>
    </div>
</div>
@endsection

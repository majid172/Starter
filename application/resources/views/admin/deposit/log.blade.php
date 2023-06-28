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
                                <th>@lang('Gateway')</th>
                                <th>@lang('Transaction')</th>
                                <th>@lang('User')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Conversion')</th>
                                <th>@lang('Created at')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($deposits as $deposit)
                        @php
                        $details = $deposit->detail ? json_encode($deposit->detail) : null;
                        @endphp
                        <tr>
                            <td>
                                <span class="fw-bold"> <a
                                        href="{{ appendQuery('method',@$deposit->gateway->alias) }}">{{
                                        __(@$deposit->gateway->name) }}</a> </span>
                            </td>

                            <td>
                                {{ $deposit->trx }}
                            </td>
                            <td>
                                <a class="text-muted"
                                    href="{{ appendQuery('search',@$deposit->user->username) }}">{{
                                    @$deposit->user->fullname }}</a>
                            </td>
                            <td>
                                <strong title="@lang('Amount with charge')">
                                    {{ showAmount($deposit->amount+$deposit->charge) }} {{ __($general->cur_text) }}
                                </strong>
                            </td>
                            <td>
                                <strong>{{ showAmount($deposit->final_amo) }}
                                    {{__($deposit->method_currency)}}</strong>
                            </td>
                            <td>
                                {{ showDateTime($deposit->created_at) }}
                            </td>
                            <td>
                                @php echo $deposit->statusBadge @endphp
                            </td>
                            <td>
                                <a title="@lang('Details')"
                                    href="{{ route('admin.deposit.details', $deposit->id) }}"
                                    class="btn btn-sm btn-primary ms-1">
                                    <i class="la la-eye"></i>
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

              @if ($deposits->hasPages())
            <div class="card-footer py-4">
                @php echo paginateLinks($deposits) @endphp
            </div>
            @endif
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
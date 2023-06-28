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
                        <th>@lang('Created at')</th>
                        <th>@lang('User')</th>
                        <th>@lang('Amount')</th>
                        <th>@lang('Conversion')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($withdrawals as $withdraw)
                        @php
                        $details = ($withdraw->withdraw_information != null) ?
                        json_encode($withdraw->withdraw_information) : null;
                        @endphp
                        <tr>
                            <td>
                                <span class="fw-bold"><a href="{{ appendQuery('method',@$withdraw->method->id) }}">
                                        {{ __(@$withdraw->method->name) }}</a></span>
                            </td>
                            <td>
                                {{ showDateTime($withdraw->created_at) }}
                            </td>

                            <td>
                                <span class="fw-bold">{{ $withdraw->user->fullname }}</span>
                            </td>


                            <td>
                                <strong title="@lang('Amount after charge')">
                                    {{ showAmount($withdraw->amount-$withdraw->charge) }} {{ __($general->cur_text)
                                    }}
                                </strong>

                            </td>

                            <td>
                                <strong>{{ showAmount($withdraw->final_amount) }} {{ __($withdraw->currency)
                                    }}</strong>
                            </td>

                            <td>
                                @php echo $withdraw->statusBadge @endphp
                            </td>
                            <td>
                                <a title="@lang('Details')"
                                    href="{{ route('admin.withdraw.details', $withdraw->id) }}"
                                    class="btn btn-sm btn--primary ms-1">
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

              @if ($withdrawals->hasPages())
              <div class="card-footer py-4">
                  {{ paginateLinks($withdrawals) }}
              </div>
              @endif
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
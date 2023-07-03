@extends('admin.layouts.app')

@section('panel')
{{-- <div class="row">
    <div class="col-lg-12">
        
    </div>
</div> --}}

<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row">
            <div class="px-2">
                <div class="payment-method-header">

                    <div class="ps-0 w-100">
                        @if(count($supportedCurrencies) > 0)
                        <div class="d-flex justify-content-between">
                            
                            <div class="input-group d-flex flex-wrap justify-content-end width-375">
                                <select class="newCurrencyVal ">
                                    <option value="">@lang('Select currency')</option>
                                    @forelse($supportedCurrencies as $currency => $symbol)
                                    <option value="{{$currency}}" data-symbol="{{ $symbol }}">{{ __($currency)
                                        }} </option>
                                    @empty
                                    <option value="">@lang('No available currency support')</option>
                                    @endforelse

                                </select>
                                <button type="button"
                                    class="btn btn-primary input-group-text bg--primary newCurrencyBtn"
                                    data-crypto="{{ $gateway->crypto }}"
                                    data-name="{{ $gateway->name }}">@lang('Add Currency')</button>
                            </div>
                        
                        </div>
                        @endif

                        <p>{{ __($gateway->description) }}</p>
                    </div>
                </div>
            </div>
            <div class="">
                <form action="{{ route('admin.gateway.automatic.update', $gateway->code) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
    
                    <input type="hidden" name="alias" value="{{ $gateway->alias }}">
                    <input type="hidden" name="description" value="{{ $gateway->description }}">
    
                    <div class="row d-flex">
                        <div class="col-6 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ __($gateway->name) }}</h4>                  
                                        <div class="payment-method-item block-item">
                                            <div class="px-3">
                                                @if($gateway->code < 1000 && $gateway->extra)
                                                <div class="payment-method-body">
                                                    <div class="row">
                                                        @foreach($gateway->extra as $key => $param)
                                                        <div class="form-group col-lg-12">
                                                            <label>{{ __(@$param->title) }}</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" value="{{ route($param->value) }}"
                                                                    readonly />
                                                                <button type="button" class="copyInput input-group-text bg--primary"
                                                                    title="@lang('Copy')"><i class="fa fa-copy"></i></button>
                                                            </div>
            
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="payment-method-body">
                                                    <div class="row">
                                                        @foreach($parameters->where('global', true) as $key => $param)
                                                        <div class="form-group col-lg-12">
                                                            <label>{{ __(@$param->title) }}</label>
                                                            <input type="text" class="form-control" name="global[{{ $key }}]"
                                                                value="{{ @$param->value }}" required />
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
            
                                            </div>
            
                                        </div>
                                        <!-- payment-method-item start -->
                                    </div>
                            </div>
                        </div>


                        <div class="col-6">
                            @isset($gateway->currencies)
                            @foreach($gateway->currencies as $gatewayCurrency)
                            <div class="card  {{$loop->index == 0 ? 'mt-5' : ''}} mb-4">
    
                                <div class="card-header bg-primary">
                                    <div class="content w-100 ps-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group">
                                                <h4 class="bg-primary">{{ __($gateway->name) }} - {{__($gatewayCurrency->currency)}}
                                                </h4>
                                                <input type="text" hidden class="form-control"
                                                    name="currency[{{ $currencyIndex }}][name]"
                                                    value="{{ $gatewayCurrency->name }}" required />
                                            </div>
                                            <div class="remove-btn">
                                                <button title="@lang('Remove')" type="button"
                                                    class="btn btn-danger configuration-currency confirmationBtn"
                                                    data-question="@lang('Are you sure to remove this gateway currency?')"
                                                    data-action="{{ route('admin.gateway.automatic.remove',$gatewayCurrency->id) }}">
                                                    <i class="la la-trash-o"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
    
    
                                <div class="card-body">
                                    <input type="hidden" name="currency[{{ $currencyIndex }}][symbol]"
                                    value="{{ $gatewayCurrency->symbol }}">
                                    <div class=" block-item child--item mb-1">      
    
                                        <div class="payment-method-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                                    <div class="mt-2">
                                                        <div class="">
                                                            <div class="form-group">
                                                                <label>@lang('Min')</label>
                                                                <div class="input-group">
                                                                    <input type="number" step="any" class="form-control"
                                                                        name="currency[{{ $currencyIndex }}][min_amount]"
                                                                        value="{{ getAmount($gatewayCurrency->min_amount) }}"
                                                                        required />
                                                                    <div class="input-group-text bg-primary">{{ __($general->cur_text)
                                                                        }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>@lang('Max')</label>
                                                                <div class="input-group">
                                                                    <input type="number" step="any" class="form-control"
                                                                        name="currency[{{ $currencyIndex }}][max_amount]"
                                                                        value="{{ getAmount($gatewayCurrency->max_amount) }}"
                                                                        required />
                                                                    <div class="input-group-text bg-primary">{{ __($general->cur_text)
                                                                        }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                                    <div class="mt-2">
                                                        <div class="">
                                                            <div class="form-group">
                                                                <label>@lang('Fixed')</label>
                                                                <div class="input-group">
                                                                    <input type="number" step="any" class="form-control"
                                                                        name="currency[{{ $currencyIndex }}][fixed_charge]"
                                                                        value="{{ getAmount($gatewayCurrency->fixed_charge) }}"
                                                                        required />
                                                                    <div class="input-group-text bg-primary">{{ __($general->cur_text)
                                                                        }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>@lang('Percentage')</label>
                                                                <div class="input-group">
                                                                    <input type="number" step="any" class="form-control"
                                                                        name="currency[{{ $currencyIndex }}][percent_charge]"
                                                                        value="{{ getAmount($gatewayCurrency->percent_charge) }}"
                                                                        required />
                                                                    <div class="input-group-text bg-primary">%</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                                    <div class="mt-2">
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>@lang('Currency')</label>
                                                                        <input type="text"
                                                                            name="currency[{{ $currencyIndex }}][currency]"
                                                                            class="form-control border-radius-5 "
                                                                            value="{{ $gatewayCurrency->currency }}" readonly />
                                                                    </div>
    
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>@lang('Symbol')</label>
                                                                        <input type="text" name="currency[{{ $currencyIndex }}][symbol]"
                                                                            class="form-control border-radius-5 symbl"
                                                                            value="{{ $gatewayCurrency->symbol }}"
                                                                            data-crypto="{{ $gateway->crypto }}" required />
                                                                    </div>
    
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>@lang('Dollar Rate')</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text bg-primary">1 {{
                                                                        __($general->cur_text) }} =</div>
                                                                    <input type="number" step="any" class="form-control"
                                                                        name="currency[{{ $currencyIndex }}][rate]"
                                                                        value="{{ getAmount($gatewayCurrency->rate) }}" required />
                                                                    <div class="input-group-text bg-primary"><span
                                                                            class="currency_symbol text-white">{{
                                                                            __($gatewayCurrency->baseSymbol()) }}</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($parameters->where('global', false)->count() != 0 )
                                                @php
                                                $globalParameters = json_decode($gatewayCurrency->gateway_parameter);
                                                @endphp
                                                <div class="col-lg-12">
                                                    <div class="card border-primary mt-4">
                                                        
                                                        <div class="card-body">
                                                            <h5 class="text-dark">@lang('Configuration')</h5>
                                                            <div class="row">
                                                                @foreach($parameters->where('global', false) as $key => $param)
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __($param->title) }}</label>
                                                                        <input type="text" class="form-control"
                                                                            name="currency[{{ $currencyIndex }}][param][{{ $key }}]"
                                                                            value="{{ $globalParameters->$key }}" required />
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $currencyIndex++ @endphp
                        @endforeach
                    @endisset
    
    
                        <div class="card border-primary mt-5 newMethodCurrency d-none">
                          
                                <div class="card-body">
    
                                    <div class="payment-method-item child--item newMethodCurrency d-none">
                                        <input disabled type="hidden" name="currency[{{ $currencyIndex }}][symbol]"
                                            class="currencySymbol">
                                        <div class="payment-method-header">
    
                                            <div class="content w-100 ps-0">
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-group">
                                                        <h4 class="mx-2" id="payment_currency_name">@lang('Name')</h4>
                                                        <input hidden type="text" class="form-control" id="payment_currency_name_input"
                                                            name="currency[{{ $currencyIndex }}][name]" required />
                                                    </div>
                                                    <div class="remove-btn">
                                                        <button title="@lang('Remove')" type="button"
                                                            class="btn btn-danger newCurrencyRemove">
                                                            <i class="la la-trash-o"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
    
                                        <div class="payment-method-body ">
                                            <div class="row mb-3">

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>@lang('Minimum Amount')</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text bg-primary text-light">{{ __($general->cur_text)
                                                                }}</div>
                                                            <input disabled type="number" step="any" class="form-control"
                                                                name="currency[{{ $currencyIndex }}][min_amount]" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>@lang('Maximum Amount')</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text bg-primary text-light">{{ __($general->cur_text)
                                                                }}</div>
                                                            <input disabled type="number" step="any" class="form-control"
                                                                name="currency[{{ $currencyIndex }}][max_amount]" required />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>@lang('Fixed Charge')</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text bg-primary text-light">{{ __($general->cur_text)
                                                                }}</div>
                                                            <input disabled type="number" step="any" class="form-control"
                                                                name="currency[{{ $currencyIndex }}][fixed_charge]" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>@lang('Percent Charge')</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text bg-primary text-light">%</div>
                                                            <input disabled type="number" step="any" class="form-control"
                                                                name="currency[{{ $currencyIndex }}][percent_charge]" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>@lang('Currency')</label>
                                                        <input disabled type="step"
                                                            class="form-control currencyText border-radius-5"
                                                            name="currency[{{ $currencyIndex }}][currency]" readonly />
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>@lang('Symbol')</label>
                                                        <input disabled type="text"
                                                            name="currency[{{ $currencyIndex }}][symbol]"
                                                            class="form-control border-radius-5 symbl"
                                                            ata-crypto="{{ $gateway->crypto }}" disabled />
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>@lang('Rate')</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-primary text-light">
                                                                <b>1 </b>&nbsp; {{ __($general->cur_text) }}&nbsp; =
                                                            </span>
                                                            <input disabled type="number" step="any" class="form-control"
                                                                name="currency[{{ $currencyIndex }}][rate]" required />
                                                            <div class="input-group-text bg-primary"><span
                                                                    class="currency_symbol text-white"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                                {{-- <div class="mx-2">
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label>@lang('Minimum Amount')</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text bg--primary">{{ __($general->cur_text)
                                                                    }}</div>
                                                                <input disabled type="number" step="any" class="form-control"
                                                                    name="currency[{{ $currencyIndex }}][min_amount]" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                        <div class="form-group">
                                                            <label>@lang('Maximum Amount')</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text bg--primary">{{ __($general->cur_text)
                                                                    }}</div>
                                                                <input disabled type="number" step="any" class="form-control"
                                                                    name="currency[{{ $currencyIndex }}][max_amount]" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                          
    
                                                {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                    <div class="mx-2">
                                                        <div class="form-group">
                                                            <label>@lang('Fixed Charge')</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text bg--primary">{{ __($general->cur_text)
                                                                    }}</div>
                                                                <input disabled type="number" step="any" class="form-control"
                                                                    name="currency[{{ $currencyIndex }}][fixed_charge]" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>@lang('Percent Charge')</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text bg-primary">%</div>
                                                                <input disabled type="number" step="any" class="form-control"
                                                                    name="currency[{{ $currencyIndex }}][percent_charge]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                    <div class="mx-2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>@lang('Currency')</label>
                                                                    <input disabled type="step"
                                                                        class="form-control currencyText border-radius-5"
                                                                        name="currency[{{ $currencyIndex }}][currency]" readonly />
                                                                </div>
                                                            </div>
    
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>@lang('Symbol')</label>
                                                                    <input disabled type="text"
                                                                        name="currency[{{ $currencyIndex }}][symbol]"
                                                                        class="form-control border-radius-5 symbl"
                                                                        ata-crypto="{{ $gateway->crypto }}" disabled />
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                        <div class="form-group">
                                                            <label>@lang('Rate')</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text bg-primary">
                                                                    <b>1 </b>&nbsp; {{ __($general->cur_text) }}&nbsp; =
                                                                </span>
                                                                <input disabled type="number" step="any" class="form-control"
                                                                    name="currency[{{ $currencyIndex }}][rate]" required />
                                                                <div class="input-group-text bg-primary"><span
                                                                        class="currency_symbol text-white"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
    
                                                @if($parameters->where('global', false)->count() != 0 )
                                                <div class="col-lg-12">
                                                    <div class="mx-2">
                                                        <div class="row">
                                                            @foreach($parameters->where('global', false) as $key => $param)
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>{{ __($param->title) }}</label>
                                                                    <input disabled type="text" class="form-control"
                                                                        name="currency[{{ $currencyIndex }}][param][{{ $key }}]"
                                                                        required />
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- **new payment-method-item end -->
    
                                </div>
                        </div>
                        </div>
                        
                    </div>
    
                        <button type="submit" class="btn btn-primary btn-global my-4 float-start">
                            @lang('Submit')
                        </button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<x-confirmation-modal></x-confirmation-modal>

@endsection





@push('breadcrumb-plugins')
<a href="{{ route('admin.gateway.automatic.index') }}" class="btn btn-sm btn--primary"><i
        class="la la-undo"></i>@lang('Back')</a>
@endpush

@push('script')
<script>
    (function ($) {
        "use strict";

        $('.newCurrencyBtn').on('click', function () {
            var form = $('.newMethodCurrency');
            var getCurrencySelected = $('.newCurrencyVal').find(':selected').val();
            var currency = $(this).data('crypto') == 1 ? 'USD' : `${getCurrencySelected}`;
            if (!getCurrencySelected) return;
            form.find('input').removeAttr('disabled');
            var symbol = $('.newCurrencyVal').find(':selected').data('symbol');
            form.find('.currencyText').val(getCurrencySelected);
            form.find('.currency_symbol').text(currency);
            $('#payment_currency_name').text(`${$(this).data('name')} - ${getCurrencySelected}`);
            $('#payment_currency_name_input').val(`${$(this).data('name')} - ${getCurrencySelected}`);

            form.removeClass('d-none');
            $('html, body').animate({ scrollTop: $('html, body').height() }, 'slow');

            $('.newCurrencyRemove').on('click', function () {
                form.find('input').val('');
                form.remove();
            });
        });

        $('.symbl').on('input', function () {
            var curText = $(this).data('crypto') == 1 ? 'USD' : $(this).val();
            $(this).parents('.payment-method-body').find('.currency_symbol').text(curText);
        });

        $('.copyInput').on('click', function (e) {
            var copybtn = $(this);
            var input = copybtn.closest('.input-group').find('input');
            if (input && input.select) {
                input.select();
                try {
                    document.execCommand('SelectAll')
                    document.execCommand('Copy', false, null);
                    input.blur();
                    notify('success', `Copied: ${copybtn.closest('.input-group').find('input').val()}`);
                } catch (err) {
                    // alert('Please press Ctrl/Cmd + C to copy');
                }
            }
        });

    })(jQuery);

</script>
@endpush
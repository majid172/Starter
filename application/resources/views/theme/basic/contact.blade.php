@php
    $contact = getContent('contact_us.content',true);
@endphp
@extends($activeTemplate.'layouts.frontend')
@section('content')

<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>@lang('Phone')</h4>
                    <p>{{__($contact->data_values->contact_number)}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"><i class="las la-map-marker-alt"></i></span>
                    <h4>@lang('Address')</h4>
                    <p>{{__($contact->data_values->address)}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>@lang('Open time')</h4>
                    <p>10:00 am to 23:00 pm</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>@lang('Email')</h4>
                    <p>{{__($contact->data_values->email_address)}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://maps.google.com/maps?q={{ $contact->data_values->latitude }},{{ $contact->data_values->longitude }}&hl=es;z=14&amp;output=embed"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
       
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>{{__($pageTitle)}}</h2>
                    </div>
                </div>
            </div>

            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="name" placeholder="@lang('Your name')"  value="@if(auth()->user()){{ auth()->user()->fullname }} @else{{ old('name') }}@endif"
                        @if(auth()->user()) readonly @endif required>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="email" name="email"  value="@if(auth()->user()){{ auth()->user()->email }}@else{{  old('email') }}@endif"
                        @if(auth()->user()) readonly @endif required placeholder="@lang('Your Email')">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea name="message" placeholder="@lang('Your message')"></textarea>
                    </div>
                    <x-captcha></x-captcha>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">@lang('SEND MESSAGE')</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
@endsection
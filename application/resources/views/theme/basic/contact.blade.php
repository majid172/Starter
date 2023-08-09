@php
    $contact = getContent('contact_us.content',true);
@endphp
@extends($activeTemplate.'layouts.frontend')
@section('content')

<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">@lang('Contact For Any Queries')</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-3">
            <h4>{{$pageTitle}}</h4>
            <div class="contact-form">
                
                <div id="success"></div>
                <form action="" method="POST" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="@if(auth()->user()){{ auth()->user()->fullname }} @else{{ old('name') }}@endif"
                        @if(auth()->user()) readonly @endif required
                             data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                        name="email"  value="@if(auth()->user()){{ auth()->user()->email }}@else{{  old('email') }}@endif" @if(auth()->user()) readonly @endif required placeholder="@lang('Your Email')" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="control-group">
                        <input type="text" class="form-control" id="email" placeholder="@lang('Subject')"name="subject">
                        <p class="help-block text-danger"></p>
                    </div>

                  
                    <div class="control-group">
                        <textarea class="form-control" name="message" rows="6" id="message" placeholder="@lang('Message')"
                            required="required"
                            data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">@lang('Send Message')</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <h5 class="font-weight-semi-bold mb-3">@lang('Get In Touch')</h5>
            <p>{{__($contact->data_values->description)}}</p>
            <div class="d-flex flex-column mb-3">
               
                <p class="mb-2"><i class="fas fa-map-marker-alt text-primary mr-3"></i>{{__($contact->data_values->address)}}</p>
                <p class="mb-2"><i class="fas fa-envelope text-primary mr-3"></i>{{__($contact->data_values->email_address)}}</p>
                <p class="mb-2"><i class="fas fa-phone-alt text-primary mr-3"></i>{{__($contact->data_values->contact_number)}}</p>
            </div>
           
        </div>
    </div>
</div>

    <!-- Map Begin -->
    <div class="map mb-0">
        <iframe
            src="https://maps.google.com/maps?q={{ $contact->data_values->latitude }},{{ $contact->data_values->longitude }}&hl=es;z=14&amp;output=embed"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
       
    </div>
    <!-- Map End -->


@endsection
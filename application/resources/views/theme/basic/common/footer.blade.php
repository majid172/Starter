    @php
        $contact = getContent('contact_us.content',true);
        $pages = App\Models\Page::get();
        $policyPages = getContent('policy_pages.element',false,null,true);
        $cookie = getContent('cookie.data',true);
    @endphp
    <!-- Footer Section Begin -->
    {{-- <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('home')}}"><img src="{{ getImage('assets/images/general/logo.png') }}" alt="logo"></a>
                        </div>
                        <ul>
                            <li>@lang('Address'): {{__($contact->data_values->address)}}</li>
                            <li>@lang('Phone'): {{__($contact->data_values->contact_number)}}</li>
                            <li>@lang('Email'): {{__($contact->data_values->email_address)}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>@lang('Useful Links')</h6>
                        <ul>
                            @foreach ($pages as $page)
                            <li><a href="{{ route('pages', $page->slug) }}">{{ __($page->name)}}</a></li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>@lang('Important Links')</h6>
                        <ul>
                            @foreach($policyPages as $key => $data)
                            <li >
                                <a href="{{ route('policy.pages',[slug($data->data_values->title),$data->id]) }}"
                                    > {{__($data->data_values->title)}}</a>
                            </li>
                            @endforeach
                            <li>
                                <a href="{{route('cookie.policy')}}" class="footer-menu__link"> @lang('Cookie & Policy')
                                </a>
                            </li>  
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer__widget">
                        <h6>@lang('Join Our Newsletter Now')</h6>
                        <p>@lang('Get E-mail updates about our latest shop and special offers.')</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">@lang('Subscribe')</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright ">
                        <div class="footer__copyright__text "><p class="text-center">
                            @php echo $contact->data_values->website_footer; @endphp</p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}

    <div class="container-fluid footer text-light mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">@lang('A')</span>@lang('aqua')</h1>
                </a>
                <p>{{__($contact->data_values->description)}}</p>
                <p class="mb-2"><i class="fas fa-map-marker-alt text-primary mr-3"></i>{{__($contact->data_values->address)}}</p>
                <p class="mb-2"><i class="fas fa-envelope text-primary mr-3"></i>{{__($contact->data_values->email_address)}}</p>
                <p class="mb-0"><i class="fas fa-phone-alt text-primary mr-3"></i>{{__($contact->data_values->contact_number)}}</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">@lang('Quick Links')</h5>
                        <div class="d-flex flex-column justify-content-start">
                            @foreach ($pages as $page)
                            <a class="text-dark mb-2" href="{{ route('pages', $page->slug) }}"><i class="fas fa-angle-right mr-2"></i>{{ __($page->name)}}</a>
                           
                            @endforeach
                         
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">@lang('Important Links')</h5>
                        <div class="d-flex flex-column justify-content-start">

                            @foreach($policyPages as $key => $data)
                            <a class="text-dark mb-2"  href="{{ route('policy.pages',[slug($data->data_values->title),$data->id]) }}"><i class="fas fa-angle-right mr-2"></i>{{__($data->data_values->title)}}</a>
                            @endforeach
                            <a class="text-dark mb-2" href="{{route('cookie.policy')}}"><i class="fas fa-angle-right mr-2"></i> @lang('Cookie & Policy')</a>
                           
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">@lang('Newsletter')</h5>
                        <form action="javascript:void(0)" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="@lang('Your Name')" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="@lang('Your Email')"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">@lang('Subscribe Now')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-center text-dark">
                    <a class="text-dark font-weight-semi-bold" href="#">{{__($general->site_name)}}</a>. @php echo $contact->data_values->website_footer; @endphp
                
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
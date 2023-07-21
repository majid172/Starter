    @php
        $contact = getContent('contact_us.content',true);
        $pages = App\Models\Page::get();
        $policyPages = getContent('policy_pages.element',false,null,true);
        $cookie = getContent('cookie.data',true);
    @endphp
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('home')}}"><img src="{{ getImage('assets/images/general/logo.png') }}" alt=""></a>
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
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            @php echo $contact->data_values->website_footer; @endphp
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
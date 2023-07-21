    @php
        $languages = \App\Models\Language::get();
       $contact = getContent('contact_us.content',true);
       $pages = App\Models\Page::get();

    @endphp
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fas fa-envelope"></i> {{__($contact->data_values->email_address)}} </li>
                                <li>@lang('Free Shipping for all Order of $99')</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                            @guest
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                {{-- <div>English</div> --}}
                                <span class="arrow_carrot-down"></span>
                                <select class="select language-select">
                                    @foreach ($languages as $lang)
                                        <option value="{{$lang->code}}" @if(Session::get('lang')==$lang->code) selected @endif> {{__($lang->name)}} </option>
                                    @endforeach

                                </select>
                                {{-- <ul>
                                    @foreach($languages as $lang)
                                    <li><a href="#">Spanis</a></li>
                                    @endforeach
                                    <li><a href="#">English</a></li>
                                </ul> --}}
                            </div>
                            <div class="header__top__right__auth">
                                <a href="{{route('user.login')}}"><i class="fas fa-user"></i> @lang('Login')</a>
                            </div>
                            @endguest

                            @auth
                            <div class="header__top__right__auth">
                                <a href="{{route('user.logout')}}"><i class="fas fa-user"></i> @lang('Logout')</a>
                            </div>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('home')}}"><img src="{{ getImage('assets/images/general/logo.png') }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            

                            @foreach ($pages as $page)
                                <li><a href="{{route('pages',$page->slug)}}">{{__($page->name)}}</a></li>
                            @endforeach
                            {{-- <li><a href="javascript:void()">@lang('Shop')</a></li> --}}
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                       
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fas fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fas fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">@lang('item'): <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
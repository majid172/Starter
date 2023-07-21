<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg" style="background-image: url({{asset($activeTemplateTrue.'images/breadcrumb.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{__($pageTitle)}}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">@lang('Home')</a>
                        <span>{{__($pageTitle)}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
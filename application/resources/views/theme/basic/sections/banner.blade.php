@php
    $content = getContent('banner.content',true);
@endphp

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fas fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        <li><a href="#">Fresh Meat</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruit & Nut Gifts</a></li>
                        <li><a href="#">Fresh Berries</a></li>
                        <li><a href="#">Ocean Foods</a></li>
                        <li><a href="#">Butter & Eggs</a></li>
                        <li><a href="#">Fastfood</a></li>
                        <li><a href="#">Fresh Onion</a></li>
                        <li><a href="#">Papayaya & Crisps</a></li>
                        <li><a href="#">Oatmeal</a></li>
                        <li><a href="#">Fresh Bananas</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
               
                <div class="hero__item set-bg" data-setbg="{{getImage(getFilePath('frontend').'/banner/'.$content->data_values->background_image)}}" style="background-image: url({{asset($activeTemplateTrue.'images/banner.jpg')}});">
                    <div class="hero__text">
                        <span> {{__($content->data_values->subheading)}} </span>
                        <h2> {{__($content->data_values->heading)}} </h2>
                        <p> {{__($content->data_values->paragraph)}} </p>
                        <a href="#" class="primary-btn"> {{__($content->data_values->button)}} </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
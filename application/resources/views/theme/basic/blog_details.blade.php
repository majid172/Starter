@extends($activeTemplate.'layouts.frontend')
@section('content')
    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#" method="POST">
                                <input type="text" placeholder="@lang('Search...')">
                                <button type="submit"><span><i class="fas fa-search"></i></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>@lang('Categories')</h4>
                            <ul>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Beauty (20)</a></li>
                                <li><a href="#">Food (5)</a></li>
                                <li><a href="#">Life Style (9)</a></li>
                                <li><a href="#">Travel (10)</a></li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>@lang('Recent News')</h4>
                            <div class="blog__sidebar__recent">
								@foreach ($latests as $item)
								<a href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{__(getImage(getFilePath('frontend').'/blog/'.'thumb_'.$item->data_values->blog_image))}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{__($item->data_values->title)}}</h6>
                                        <span>{{$item->created_at}}</span>
                                    </div>
                                </a>
								@endforeach
                                
                                
                               
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>@lang('Search By')</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Apple</a>
                                <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="{{__(getImage(getFilePath('frontend').'/blog/'.$blog->data_values->blog_image))}}" alt="blog_img">
						<h3>{{__($blog->data_values->title)}}</h3>
                        <p> @php
							echo $blog->data_values->description;
						@endphp </p>
                        
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="img/blog/details/details-author.jpg" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>@lang('Michael Scofield')</h6>
                                        <span>@lang('Admin')</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>@lang('Categories'):</span> Food</li>
                                        <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="https://www.facebook.com/share.php?u={{ Request::url() }}&title={{slug($blog->data_values->title)}}"><i class="fab fa-facebook"></i></a>
                                        <a href="https://twitter.com/intent/tweet?status={{slug($blog->data_values->title)}}+{{ Request::url() }}"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{slug($blog->data_values->title)}}&source=propertee"><i class="fab fa-linkedin"></i></a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
@push('fbComment')
	@php echo loadExtension('fb-comment') @endphp
@endpush

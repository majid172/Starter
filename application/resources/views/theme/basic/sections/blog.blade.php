@php
    $content = getContent('blog.content',true);
    dd(request()->url(),request('/'));
    if (request()->url() == request('/').'/blog') {
        
        $blogs = getContent('blog.element',false,8);
    }
    else{
        dd('dd');
        $blogs = getContent('blog.element',false,3);
    }
    $categories = App\Models\Category::all();
    
    #getContent('data_key','singleQuery true/false','limit');
@endphp
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="@lang('Search...')">
                            <button type="submit"><span><i class="fas fa-search"></i></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>@lang('Categories')</h4>
                        <ul>
                            <li><a href="#">@lang('All')</a></li>
                            @foreach ($categories as $category)
                            <li><a href="#">{{__($category->name)}}</a></li>
                            @endforeach
                            
                           
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>@lang('Recent News')</h4>
                        <div class="blog__sidebar__recent">

                            @foreach ($blogs as $item)
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
                        <h4>Search By</h4>
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
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    @foreach ($blogs as $item)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{__(getImage(getFilePath('frontend').'/blog/'.$item->data_values->blog_image))}}" alt="blog_img">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fas fa-calendar-o"></i> {{$item->created_at}} </li>
                                   
                                </ul>
                                <h5><a href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}">{{__($item->data_values->title)}}</a></h5>
                                <p>
                                    @php
                                        $description = $item->data_values->description;
                                        $limitDescription = Str::limit($description, 80, '...');
                                        echo $limitDescription;
                                    @endphp
                                </p>
                                <a href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}" class="blog__btn">@lang('READ MORE') <span><i class="fas fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
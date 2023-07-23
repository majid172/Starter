@php
    $content = getContent('blog.content',true);
    $blogs = getContent('blog.element',false,4);
    #getContent('data_key','singleQuery true/false','limit');
@endphp
    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2> {{__($content->data_values->heading)}}</h2>
                    </div>
                </div>
            </div>

         
            <div class="row">
                @foreach ($blogs as $item)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <a href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}">
                            <img src="{{__(getImage(getFilePath('frontend').'/blog/'.$item->data_values->blog_image))}}" alt="">
                        </a>
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fas fa-calendar-o me-2"></i>{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</li>
                                
                            </ul>
                            <h5><a href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}">{{__($item->data_values->title)}}</a></h5>
                            <p> @php
                             echo   $item->data_values->description
                            @endphp </p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
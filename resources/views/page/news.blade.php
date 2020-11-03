@extends('layout.master')

@section('content')

<div class="container">
    <div id="content">
        <div class="our-history">
            <h2 class="text-center wow fadeInDown">Tin tức</h2>
            <div class="space35">&nbsp;</div>

            <div class="history-slider">
                <div class="history-navigation">
                    <a data-slide-index="0" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">01</span></a>
                    <a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">02</span></a>
                    <a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">03</span></a>
                    <a data-slide-index="3" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">04</span></a>
                    <a data-slide-index="4" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">05</span></a>
                    <a data-slide-index="5" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">06</span></a>
                    <a data-slide-index="6" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">07</span></a>
                </div>
                <div class="history-slides">
                    @foreach($news as $ns)
                        <div> 
                            <div class="row">
                                <div class="col-sm-1"></div>
                            <div class="col-sm-3">
                                <img style="height: 200px; width: 290px" src="upload/news/{{$ns->news_image}}" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">{{$ns->news_title}}</h5>
                                <p><i class="fa fa-clock-o"></i> Posted on : {{$ns->created_at}}</p>
                                <div class="space20">&nbsp;</div>
                                
                            </div>
                            <div class="col-sm-1"></div>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <p>{!! $ns->news_content !!}</p>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('web.layouts.main')

@section('content')
    @include('web.includes.banner',[$banner, 'type'=> $blog->short_url])
    <section class="blog_details_page">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 ">
                    <div class="blog_details_image">
                        {!! Helper::printImage($blog, 'image','image_webp','image_attribute', 'img-fluid') !!}
                    </div>
                    <h5>
                        {{ $blog->title }}
                    </h5>
                    <div class="blog_profile">
                        <div class="profile_pic">
                            {!! Helper::printImage($blog, 'author_image', 'author_image_webp', '', 'img-fluid') !!}
                        </div>
                        <div class="profile_info">
                            <div class="name">
                                Posted By {{ $blog->author }}
                            </div>
                            <div class="date">
                                {{ date('d-m-Y', strtotime($blog->posted_date)) }}
                            </div>
                        </div>
                    </div>
                    {!! $blog->description !!}
                    <div class="video-area ">

                            {!! Helper::printImage($blog, 'video_thumbnail_image', 'video_thumbnail_image_webp', 'video_thumbnail_image_attribute', 'img-fluid') !!}
                            @if($blog->video_url !='' || $blog->video_url != null)
                            <a href="{{ $blog->video_url }}" data-fancybox="group">
                                <button type="button" class="video-btn">
                                    <img class="img-fluid"  src="{{asset('frontend/images/svg/play.svg')}}" alt="">
                                </button>
                            </a>
                            @endif

                    </div>
                    <h5>
                        {{ $blog->sub_title }}
                    </h5>
                    {!! $blog->description !!}
                    <div class="share_navigation_area">
                        <div class="share">
                            <p>Share On:</p>

                            <a href="{{'https://www.facebook.com/sharer/sharer.php?u='.Request::fullUrl() }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{'https://twitter.com/intent/tweet/?url='.Request::fullUrl() }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                            <a href="{{'https://www.linkedin.com/shareArticle?mini=true&url='.Request::fullUrl() }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="{{'https://wa.me/?text='.Request::fullUrl()}}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                        <div class="prev_next">
                            @if($previousBlog)
                                <a class="primary_btn" href="{{ url('blog/'.$previousBlog->short_url) }}"><i class="fa-solid fa-arrow-left"></i> PREVIOUS</a>
                            @endif
                            @if($nextBlog)
                                <a class="primary_btn" href="{{ url('blog/'.$nextBlog->short_url) }}">NEXT <i class="fa-solid fa-arrow-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                @if($recentBlogs->isNotEmpty())
                    <div class="col-lg-4 sticky-lg-top sticky-lg-top-110">
                        <div class="recent_detail_list">
                            <h4>
                                Recent Blogs
                            </h4>
                            @foreach( $recentBlogs as $blog)
                                <div class="recent_blog_list">
                                    <h6>
                                        {{ $blog->title }}
                                    </h6>
                                    <div class="blog_profile">
                                        <div class="profile_pic">
                                            {!! Helper::printImage($blog, 'author_image', 'author_image_webp', '', 'img-fluid') !!}
                                        </div>
                                        <div class="profile_info">
                                            <div class="name">
                                                Posted By {{ $blog->author }}
                                            </div>
                                            <div class="date">
                                                {{ date('d-m-Y', strtotime($blog->posted_date)) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="textArea">
                                        {!! $blog->description !!}
                                    </div>
                                    <a class="more" href="{{ url('blog/'.$blog->short_url) }}">Read More</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

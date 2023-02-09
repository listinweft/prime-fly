@extends('web.layouts.main')

@section('content')
    @include('web.includes.banner',[$banner, 'type'=> 'Blogs'])
    <section class="blog_page">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>{{ @$heading->title }}</h1>
                    <h6 class="subtext">
                        {!! @$heading->description !!}
                    </h6>
                </div>
                <div class="col-lg-6 position-relative">
                    <div class="recent_blog_card">
                        @if($latestBlog)
                            <div class="recent_blog_image">
                                {!! Helper::printImage(@$latestBlog, 'image','image_webp','image_attribute', 'img-fluid') !!}
                            </div>
                            <div class="recent_blog_text">
                                <div class="recent_blog_text_wrapper">
                                    <h5>
                                        {{ @$latestBlog->title }}
                                    </h5>
                                    <div class="profile">
                                        <div class="profile_pic">
                                            {!! Helper::printImage(@$latestBlog, 'author_image', 'author_image_webp', '', 'img-fluid') !!}
                                        </div>
                                        <div class="profile_info">
                                            <div class="name">
                                                Posted By {{ @$latestBlog->author }}
                                            </div>
                                            <div class="date">
                                                {{ date('d-m-Y', strtotime(@$latestBlog->posted_date)) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="textArea">
                                        {!! @$latestBlog->description !!}
                                    </div>
                                    <a class="primary_btn" href="{{ url('blog/'.@$latestBlog->short_url) }}">READ MORE <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @if($latestThreeBlogs->isNotEmpty())
                    <div class="col-lg-6">
                        <ul class="recent_blog_list">
                            @foreach( $latestThreeBlogs as $blog)
                                <li>
                                    <div class="recent_blog_list_image">
                                        {!! Helper::printImage($blog, 'image','image_webp','image_attribute', 'img-fluid') !!}
                                    </div>
                                    <div class="recent_blog_list_text blog_profile_cnt">
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
                                        <div class="textArea">
                                            {!! $blog->description !!}
                                        </div>
                                        <a class="primary_btn" href="{{ url('blog/'.$blog->short_url) }}">READ MORE <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            @include('web.includes._blog_list')
        </div>
    </section>
@endsection

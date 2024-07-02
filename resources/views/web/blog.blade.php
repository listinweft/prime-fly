
@extends('web.layouts.main')
@section('content')
<section class="single-blog-banner">
{!! Helper::printImage($blog, 'image','image_webp','image_attribute', 'img-fluid') !!}
        </section>
        <section class="single-blog-content">
            <div class="blog-contaier">
                <div class="d-flex">
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-header">
                                <h1>{{ $blog->title }}</h1>
                                <!-- <span>Jun . 7 . 2024 | 5 min read</span> -->
                            </div>
                            <div class="blog-content">
                            {!! strip_tags($blog->description) !!}

                                <div class="blog-author">
                                    <div class="blog-author-image"><img src="{{ asset('frontend/img/blog/blog-author.jpg')}}" alt=""></div>
                                    <div class="blog-author-content">
                                        <h5>By Joanna Wellick</h5>
                                        <p>{{ date('d-m-Y', strtotime($blog->posted_date)) }}</p>
                                    </div>
                                </div>
                                <div class="blog-share">
                                    <ul>
                                        
                                        <li class="fb-share">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo url('blog/' . $blog->short_url); ?>">
                                                <div class="share-icon"><img src="{{ asset('frontend/img/icons/facebook.png')}}" alt=""></div>
                                                <div class="share-content"><p><span>SHARE</span></p></div>
                                            </a>
                                        </li>
                                        <li class="x-share">
                                            <a href="https://twitter.com/share?url=<?php echo url('blog/' . $blog->short_url); ?>&text=Check out this blog">
                                                <div class="share-icon"><img src="{{ asset('frontend/img/icons/twitter-x.png')}}" alt=""></div>
                                                <div class="share-content"><p><span>TWEET</span></p></div>
                                            </a>
                                        </li>

                                        <li class="whatsapp">
                                        <a href="https://api.whatsapp.com/send?text={{ url('blog/'.$blog->short_url) }}">
                                                        <img src="{{ asset('frontend/images/icon/whatsapp.png')}}" alt="">
                                                    </a>
                                        </li>
                                      

                                        
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="popular-blogs">
                                <h4>Popular Blogs</h4>
                                <div class="trending-item-wraper">
                                    
                                   @foreach($latestBlogs as $latestBlog)
                                    <div class="trending-item-box">
                                        <div class="trending-item">
                                            <a href="{{ url('blog/'.@$latestBlog->short_url) }}">
                                                <div class="trending-item-inside">
                                                {!! Helper::printImage($latestBlog, 'image','image_webp','image_attribute', 'img-fluid') !!}
                                                    <div class="trending-item-container">
                                                        <h5>{{$latestBlog->title}}</h5>
                                                        <p>{!! strip_tags($latestBlog->description) !!}.</p>
                                                        <span>{{ date('d-m-Y', strtotime($latestBlog->posted_date)) }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-12">
                    <div class="you-may-like">
                        <h3 class="mb-3">You May Also Like</h3>
                        <div class="row">
                           @foreach($recentBlogs as $recentBlog)
                            <div class="col-md-4 col-sm-6 blog-item-grid">
                                <div class="blog-item">
                                    <a href="{{ url('blog/'.@$recentBlog->short_url) }}"><div class="blog-item-image">  {!! Helper::printImage($recentBlog, 'image','image_webp','image_attribute', 'img-fluid') !!}</div></a>
                                    <div class="blog-item-content">
                                        <a href="single-blog.html"><h3>{{$recentBlog->title}}</h3></a>
                                        <p class="mb-1">{!! strip_tags($recentBlog->description) !!}.</p>
                                        <div class="r-post-date">{{ date('d-m-Y', strtotime($recentBlog->posted_date)) }}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                          
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    @endsection
@push('scripts')

@endpush


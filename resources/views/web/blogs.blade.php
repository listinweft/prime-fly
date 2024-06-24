

@extends('web.layouts.main')
@section('content')

<section class="col-12 locationbanner p-0">
           <div class="d-flex justify-content-end">
              <div class="locinner_bannerimg">
                <img src="{{ asset('frontend/img/blog-banner.png')}}" class="w-100" alt="Meet and Greet" />
                <div class="loc-text text-start">
                    <div class="container">
                        <h1>BLOG</h1>
                    </div> 
                </div>
              </div>
           </div> 
         </section>
         <section class="blog-wraper">
            <div class="blog-contaier"> 
                <div class="d-flex justify-content-center mb-4">
                    <div class="col-lg-6">
                        <div class="input-group mb-3 blog-search">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                              </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="Search" aria-label="Searcch" aria-describedby="basic-addon1" id="main-search">
                            <div class="searchResult">
                            <ul id="search-result-append-here"></ul>
                        </div>
                          </div>
                    </div>
                </div>
                <div class="blog-item-wraper">
                    <h2 class="mb-3">Blogs</h2>
                    @include('web._blog_list')
                  
                    
                </div>
                <div class="rt-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="section-head-2 mb-3">Featured</h3>
                            <div class="recent-blogs">
                               
                                <div class="d-flex flex-wrap">
                                    <div class="col-lg-6 pe-4">
                                        <a href="single-blog.html">
                                            <div class="featured-blog-item-image mb-3">
                                            {!! Helper::printImage($latestBlog, 'image', 'image_webp', '', 'img-fluid') !!}

                                            
                                            </div>
                                        </a>
                                        <a href="single-blog.html">
                                            <div class="recent-blog-item-content">
                                                <span class="mb-2">{{ date('d-m-Y', strtotime($latestBlog->posted_date)) }}</span>
                                                <h4>{{ $latestBlog->title }}</h4> 
                                                {!! $latestBlog->description !!}
                                                
                                            </div> 
                                        </a>
                                        <div class="col-12 text-start mt-3">
                                            <a href="#" class="btn-style-2"><div class="btn-in">Read More</div></a>
                                          </div>
                                    </div>
                                    <div class="col-lg-6 recent-blog-item-wraper">
                                       
                                        @foreach($latestThreeBlogs as $lastthree)
                                        <div class="recent-blog-item">
                                            <div class="row align-items-center">
                                                <div class="col-sm-5">
                                                    <a href="single-blog.html"><div class="recent-blog-item-image">{!! Helper::printImage($lastthree, 'image', 'image_webp', '', 'img-fluid') !!}</div></a>
                                                </div>
                                                <div class="col-sm-7">
                                                    <a href="single-blog.html"> 
                                                        <div class="recent-blog-item-content">
                                                            <h4>{{ $lastthree->title }}</h4>
                                                            {!! $lastthree->description !!}
                                                            <span> {{ date('d-m-Y', strtotime($lastthree->posted_date)) }}</span>
                                                        </div>
                                                    </a> 
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                       
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- <div class="col-lg-3">
                            <div class="trending-wraper">
                                <h4 class="section-head-2">Trending</h4>
                                <div class="trending-item-wraper">
                                    <div class="trending-item-box">
                                        <div class="trending-item">
                                            <a href="single-blog.html">
                                                <div class="trending-item-inside">
                                                    <img src="images/blog/trending-blog.webp" alt="">
                                                    <div class="trending-item-container">
                                                        <h5>Amet Consectetur.</h5>
                                                        <p>Lorem ipsum dolor sit amet consectetur. Justo mus non accumsan nisl commodo congue fringilla commodo.</p>
                                                        <span>June 21,2024</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="trending-item-box">
                                        <div class="trending-item">
                                            <a href="single-blog.html">
                                                <div class="trending-item-inside">
                                                    <img src="images/blog/trending-blog.webp" alt="">
                                                    <div class="trending-item-container">
                                                        <h5>Amet Consectetur.</h5>
                                                        <p>Lorem ipsum dolor sit amet consectetur. Justo mus non accumsan nisl commodo congue fringilla commodo.</p>
                                                        <span>June 21,2024</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="trending-item-box">
                                        <div class="trending-item">
                                            <a href="single-blog.html">
                                                <div class="trending-item-inside">
                                                    <img src="images/blog/trending-blog.webp" alt="">
                                                    <div class="trending-item-container">
                                                        <h5>Amet Consectetur.</h5>
                                                        <p>Lorem ipsum dolor sit amet consectetur. Justo mus non accumsan nisl commodo congue fringilla commodo.</p>
                                                        <span>June 21,2024</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="trending-item-box">
                                        <div class="trending-item">
                                            <a href="single-blog.html">
                                                <div class="trending-item-inside">
                                                    <img src="images/blog/trending-blog.webp" alt="">
                                                    <div class="trending-item-container">
                                                        <h5>Amet Consectetur.</h5>
                                                        <p>Lorem ipsum dolor sit amet consectetur. Justo mus non accumsan nisl commodo congue fringilla commodo.</p>
                                                        <span>June 21,2024</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="trending-item-box">
                                        <div class="trending-item">
                                            <a href="single-blog.html">
                                                <div class="trending-item-inside">
                                                    <img src="images/blog/trending-blog.webp" alt="">
                                                    <div class="trending-item-container">
                                                        <h5>Amet Consectetur.</h5>
                                                        <p>Lorem ipsum dolor sit amet consectetur. Justo mus non accumsan nisl commodo congue fringilla commodo.</p>
                                                        <span>June 21,2024</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="trending-item-box">
                                        <div class="trending-item">
                                            <a href="single-blog.html">
                                                <div class="trending-item-inside">
                                                    <img src="images/blog/trending-blog.webp" alt="">
                                                    <div class="trending-item-container">
                                                        <h5>Amet Consectetur.</h5>
                                                        <p>Lorem ipsum dolor sit amet consectetur. Justo mus non accumsan nisl commodo congue fringilla commodo.</p>
                                                        <span>June 21,2024</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
                               
                        
                           
   


    @endsection
@push('scripts')

@endpush


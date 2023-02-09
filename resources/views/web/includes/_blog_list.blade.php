@if($blogs->isNotEmpty())
    <div class="row more_list">
        @foreach( $blogs as $blog )
            <div class="col-lg-4">
                <div class="blog_card">
                    <div class="blog_image">
                        {!! Helper::printImage($blog, 'image','image_webp','image_attribute', 'img-fluid') !!}
                    </div>
                    <div class="blog_profile_cnt">
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
                </div>
            </div>
            @if($loop->last)
                <div class="appendHere_{{$offset}}"></div>
            @endif
        @endforeach

        <input type="hidden" id="totalBlogs" name="total_blogs" value="{{$totalBlog}}">
        <input type="hidden" id="blog_loading_offset" name="blog_loading_offset" value="{{$offset}}">
        <input type="hidden" id="blog_loading_limit" name="blog_loading_limit" value="{{$loading_limit}}">

        @if($totalBlog>$offset)
            <div class="col-12 d-flex justify-content-center mt-3 more-section-{{$offset}}">
                <a href="#" class="primary_btn load-more-button">Load more</a>
            </div>
        @endif
    </div>
@endif

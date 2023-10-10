@if($blogs->isNotEmpty())

@foreach( $blogs as $blog )

<div class="col-lg-4" data-aos="fade-up" data-aos-duration="800">
    <div class="col-12 blog_grid">
        <div class="blog_thumb">
        {!! Helper::printImage($blog, 'image', 'image_webp', '', 'img-fluid') !!}
        </div>
        <div class="blog_desc">
            <h4> {{ $blog->title }}</h4>
           <p> {!! strlen($blog->description) > 100  ? substr($blog->description, 0, 100) . '...' : $blog->description !!}</p>

            <a href="{{ url('blog/'.$blog->short_url) }}" class="common-btn mt-4">Read</a>
        </div>
    </div>
</div>

@if($loop->last)
<div class="appendHere_{{$offset}}"></div>
@endif
@endforeach
@endif
<input type="hidden" id="totalBlogs" name="total_blogs" value="{{$totalBlog}}">
        <input type="hidden" id="blog_loading_offset" name="blog_loading_offset" value="{{$offset}}">
        <input type="hidden" id="blog_loading_limit" name="blog_loading_limit" value="{{$loading_limit}}">

            @if($totalBlog>$offset)
            <div class="row">
                <div class="col-12 text-center more-section-{{$offset}}">
                    <a class="primary_btn load-more-button">Load More</a>
                </div>
            </div>

            @endif
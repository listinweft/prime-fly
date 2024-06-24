@if($blogs->isNotEmpty())



<div class="row">
@foreach( $blogs as $blog )
                        <div class="col-md-4 col-sm-6 blog-item-grid">
                            <div class="blog-item">
                                <a href="single-blog.html"><div class="blog-item-image">{!! Helper::printImage($blog, 'image', 'image_webp', '', 'img-fluid') !!}</div></a>
                                <div class="blog-item-content">
                                    <a href="single-blog.html"><h3>{{ $blog->title }}</h3></a>


                                  <p>  {!! strlen($blog->description) > 200  ? substr($blog->description, 0, 200) . '...' : $blog->description !!} </p>

                                    
                                    <a href="{{ url('blog/'.@$latestBlog->short_url) }}" class="btn-style-2"><div class="btn-in">Read More</div></a>
                                </div>
                            </div>
                        </div>

                        @if($loop->last)
<div class="appendHere_{{$offset}}"></div>
@endif
                        @endforeach
                    </div>



@endif
<input type="hidden" id="totalBlogs" name="total_blogs" value="{{$totalBlog}}">
        <input type="hidden" id="blog_loading_offset" name="blog_loading_offset" value="{{$offset}}">
        <input type="hidden" id="blog_loading_limit" name="blog_loading_limit" value="{{$loading_limit}}">

            @if($totalBlog>$offset)
            <div class="row">
                <div class="mt-0 col-12 text-center more-section-{{$offset}}">
                    

                    <div class="col-12 text-center mt-3">
                        <a href="" class="btn btn-primary load-more-button">Load More</a>
                     </div>
                </div>
            </div>

            @endif
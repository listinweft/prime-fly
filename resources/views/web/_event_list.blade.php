@if($blogs->isNotEmpty())

@foreach( $blogs as $blog )




<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="col-12 events_grid">
                                    <a href="{{ url('event/'.$blog->short_url) }}">{!! Helper::printImage($blog, 'image', 'image_webp', '', 'img-fluid') !!}</a>
                                        <div class="d-flex event_grid_descrp">
                                            <div class="eventgrid_date">
                                         <?php    $postDate = $blog->posted_date; // Replace with your actual date variable

$day = date('d', strtotime($postDate));
$month = date('M', strtotime($postDate));
$year = date('Y', strtotime($postDate));
?>

<h4><?php echo $day; ?></h4>
<p><?php echo $month; ?> <?php echo $year; ?></p>
                                            </div>
                                            <div class="eventgrid_desc">
                                                <a href="{{ url('event/'.$blog->short_url) }}"><h4>{{$blog->title}}</h4></a>
                                                <p> {!! strlen($blog->description) > 100  ? substr($blog->description, 0, 100) . '...' : $blog->description !!}</p>
                                                <!-- <div class="d-flex flex-wrap eventgrid_">
                                                    <div class="eventgrid_author_wraper d-flex">
                                                        <div class="eventgrid_img"> {!! Helper::printImage($blog, 'author_image', 'author_image_webp', '', 'img-fluid') !!}</div>
                                                        <div class="eventgrid_author">
                                                            <div>
                                                                <h6>{{$blog->author}}</h6>
                                                                
                                                            </div>
                                                            <a href="{{ url('event/'.$blog->short_url) }}" class="meeting-btn">View Event</a>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

@if($loop->last)
<div class="appendHere_{{$offset}}"></div>
@endif
@endforeach
@endif
<input type="hidden" id="totalevents" name="total_events" value="{{$totalBlog}}">
        <input type="hidden" id="event_loading_offset" name="blog_loading_offset" value="{{$offset}}">
        <input type="hidden" id="event_loading_limit" name="blog_loading_limit" value="{{$loading_limit}}">

            @if($totalBlog>$offset)
            <div class="row">
                <div class="mt-0 col-12 text-center more-section-{{$offset}}">
                    

                    <div class="col-12 text-center mt-lg-5 mt-sm-4 mt-2">
                    <a href="#0" class="common-btn load-more-events-button" onclick="eventLoadMoreData()">View More Events</a>

                                </div>
                </div>
            </div>

            @endif

            <script>
    @stack('scripts')

    function eventLoadMoreData() {
        var total_blogs = $('#totalevents').val();
        var offset = $('#event_loading_offset').val();
        var loading_limit = $('#event_loading_limit').val();
        $.ajax({
            type: 'POST', data: {total_blogs: total_blogs, offset: offset, loading_limit: loading_limit}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/event-load-more', success: function (response) {
                if (response != 0) {
                    $('.appendHere_' + offset).after(response).remove();
                    $('.more-section-' + offset).remove();
                    $('.load-more-product').html(btnHtml);
                } else {
                    swal.fire({
                        title: 'Error', text: 'Some error occurred', icon: 'error'
                    });
                }
            }
        });
    }
</script>

           
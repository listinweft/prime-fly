@foreach($reviews as $review)
    <li>
        <div class="profil_area">
            <div class="profil_photo">
                {!! Helper::getReviewUserImage($review->email) !!}
            </div>
            <div class="profil_details">
                <div class="name">{{$review->name}}</div>
                <div class="mail">{{$review->email}}</div>
                <div class="rate_area">
                    <i class="fa-solid fa-star"></i>
                    {{$review->rating}}
                </div>
            </div>
        </div>
        @if($review->review!=NULL)
            <div class="review_p">
                <p>{!!$review->review!!}</p>
            </div>
        @endif
    </li>
    @if($loop->last)
        <div class="appendReviewHere{{$review_offset}}"></div>
    @endif
@endforeach
@if($totalRatings > $review_offset)
    <div class="row">
        <div class="col-12 text-center more-review-section-{{$review_offset}}">
            <a href="javascript:void(0)"
               class="loadmore load-more-reviews">Load More...</a>
        </div>
    </div>
@endif
<script>
    $('#review_offset').val({{ $review_offset }});
</script>

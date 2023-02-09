@foreach($products as $product)
    @include('web.includes.product_box',[$product])
    @if($loop->last)
        <div class="appendHere{{$offset}}"></div>
    @endif
@endforeach
@if($totalProducts>$offset)
    <div class="moreBx more-section-{{$offset}}">
        <button class="primary_btn d-block m-auto load-more-product">Loading..</button>
    </div>
@endif
<script>
    $('#product_count').html({{ $offset }});
    $('#loading_offset').val({{ $offset }});
</script>

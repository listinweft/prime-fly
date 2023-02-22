@foreach($products as $product)
    @include('web.includes.product_box',[$product])
    @if($loop->last)
        <div class="appendHere{{$offset}}"></div>
    @endif
@endforeach
@if($totalProducts>$offset)
    

        <div class="row">
                <div class="col-12 text-center-{{$offset}}">
                    <button class="primary_btn d-block m-auto load-more-product">Load More</button>
                </div>
            </div>
    </div>
    
@endif
@push('scripts')

<script>
    $('#product_count').html({{ $offset }});
    $('#loading_offset').val({{ $offset }});
</script>
@endpush
    

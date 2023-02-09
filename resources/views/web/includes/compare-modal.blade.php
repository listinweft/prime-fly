@if (Session::exists('compare_products'))
    <div class="btn-group  compare_btn_test compare_count_item dropup" id="compare_count">
        <a href="{{ count(Session::get('compare_products')) >=2 ? url('compare-products'): 'javascript:void(0)' }}"
           class="dropdown-toggle {{ count(Session::get('compare_products')) >=2 ? '': 'min_compare_error' }}">
            <h6>Compare</h6>
            <div class="count_num">
                
                {{ count(Session::get('compare_products')) }}
            </div>
        </a>
        <ul class="dropdown-menu aa" aria-labelledby="">
            @foreach (Session::get('compare_products') as $key => $session_compare_product)
                <li>
                    @php
                        $product = App\Models\Product::find($session_compare_product['product_id']);
                    @endphp
                 @isset($product)
                     
                 <div class="dropdown-item aaa">
                     <a href="javascript:void(0)" class="close_compare_btn"
                        onclick="addCompareProduct({{ $product->id }})">
                         <i class="fa-solid fa-xmark"></i></a>
                     <a href="">
                         {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                         <div class="p_name">{{ $product->title }}</div>
                     </a>
                 </div>
                 @endisset
                    
                </li>
            @endforeach
        </ul>
    </div>
@endif
<script>
    function addCompareProduct(product_id) {
        $.ajax({
            type: 'POST', dataType: 'json', data: {product_id}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/add-compare-product', success: function (response) {
                if (response.status == 'success') {
                    Toast.fire('Success!', response.message, 'success');
                } else {
                    Toast.fire("Oops", response.message, "error");
                }
                window.location.reload();
            }
        });
    }
</script>

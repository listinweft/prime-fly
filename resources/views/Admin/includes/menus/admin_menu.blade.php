@if ((Auth::user()->admin->role) == "Super Admin")
    <li class="nav-item">
        <a href="{{url(Helper::sitePrefix().'administration')}}"
           class="nav-link {{ (Request::segment(2)=='administration')?'active':'' }}">
            <i class="nav-icon fas fa-user-shield"></i>
            <p>Administration</p>
        </a>
    </li>
@endif
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'customer')}}"
       class="nav-link {{ (Request::segment(2)=='customer')?'active':'' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Customer</p>
    </a>
</li>
<li class="nav-item {{ (Request::segment(2)=='home-corporate')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='home')?'active':'' }}">
        <i class="nav-icon fas fa-th-list"></i>
        <p>Home-Corporate
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='home-corporate')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home-corporate/banner')}}"
               class="nav-link {{ (Request::segment(3)=='banner')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Banner</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home-corporate/get-a-quote')}}"
               class="nav-link {{ (Request::segment(3)=='get-a-quote')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Get A Quote</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home-corporate/advertisement')}}"
               class="nav-link {{ (Request::segment(3)=='advertisement')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Advertisement</p>
            </a>
        </li>

        <li class="nav-item {{ (Request::segment(2)=='home-ecommerce')?'menu-is-opening menu-open':'' }}">
    </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='home-ecommerce')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='home')?'active':'' }}">
        <i class="nav-icon fas fa-th-list"></i>
        <p>Home-Ecommerce
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='home-ecommerce')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home-ecommerce/banner')}}"
               class="nav-link {{ (Request::segment(3)=='banner')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Banner</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home-ecommerce/get-a-quote')}}"
               class="nav-link {{ (Request::segment(3)=='get-a-quote')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Get A Quote</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home-ecommerce/advertisement')}}"
               class="nav-link {{ (Request::segment(3)=='advertisement')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Advertisement</p>
            </a>
        </li>
       
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home-ecommerce/latest')}}"
               class="nav-link {{ (Request::segment(3)=='latest')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Latest-product</p>
            </a>
        </li>
        

{{--        <li class="nav-item">--}}
{{--            <a href="{{url(Helper::sitePrefix().'home/hot-deal')}}"--}}
{{--               class="nav-link {{ (Request::segment(3)=='hot-deal')?'active':'' }}">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Hot Deal</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{url(Helper::sitePrefix().'home/key-feature')}}"--}}
{{--               class="nav-link {{ (Request::segment(3)=='key-feature')?'active':'' }}">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Key Feature</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{url(Helper::sitePrefix().'home/testimonial')}}"--}}
{{--               class="nav-link {{ (Request::segment(3)=='testimonial')?'active':'' }}">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Testimonials</p>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='banner')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='banner')?'active':'' }}">
        <i class="nav-icon fas fa-image"></i>
        <p>Banner
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='banner')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/about')}}"
               class="nav-link {{ (Request::segment(3)=='about')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>About </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/blogs')}}"
               class="nav-link {{ (Request::segment(3)=='blogs')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Blog</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/cart')}}"
               class="nav-link {{ (Request::segment(3)=='cart')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Cart</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/checkout')}}"
               class="nav-link {{ (Request::segment(3)=='checkout')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Checkout</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/contact')}}"
               class="nav-link {{ (Request::segment(3)=='contact')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/my-account')}}"
               class="nav-link {{ (Request::segment(3)=='my-account')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>My Account</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/privacy-policy')}}"
               class="nav-link {{ (Request::segment(3)=='privacy-policy')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Privacy Policy</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/terms-and-conditions')}}"
               class="nav-link {{ (Request::segment(3)=='terms-and-conditions')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Terms and Conditions</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/products')}}"
               class="nav-link {{ (Request::segment(3)=='products')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/compare')}}"
               class="nav-link {{ (Request::segment(3)=='compare')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Compare</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/404')}}"
               class="nav-link {{ (Request::segment(3)=='404')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>404 </p>
            </a>
        </li>
    </ul>
</li>
{{-- <li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'offer-strip')}}"
       class="nav-link {{ (Request::segment(2)=='offer-strip')?'active':'' }}">
        <i class="nav-icon fas fa-asterisk"></i>
        <p>Offer Strip</p>
    </a>
</li> --}}
<li class="nav-item {{ (Request::segment(2)=='about')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='about')?'active':'' }}">
        <i class="nav-icon fas fa-th-list"></i>
        <p>About
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='about')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'about')}}"
               class="nav-link {{ (Request::segment(2)=='about' && Request::is(Helper::sitePrefix().'about'))?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>About Us</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'about/feature')}}"
               class="nav-link {{ (Request::segment(3)=='feature')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>About Feature</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'about/history')}}"
               class="nav-link {{ (Request::segment(3)=='history')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>History</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'contact-address')}}"
       class="nav-link {{ (Request::segment(2)=='contact-address')?'active':''}}">
        <i class="nav-icon fas fa-address-book"></i>
        <p>Contact Us</p>
    </a>
</li>
<li class="nav-item {{ (Request::segment(2)=='enquiry')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Enquiry
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='enquiry')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'enquiry')}}"
               class="nav-link {{ (Request::is(Helper::sitePrefix().'enquiry'))?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact Page</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'enquiry/product')}}"
               class="nav-link {{ (Request::segment(3)=='product')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'enquiry/get-quote')}}"
               class="nav-link {{ (Request::segment(3)=='get-quote')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Get A Quote</p>
            </a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a href="{{url(Helper::sitePrefix().'enquiry/bulk')}}"--}}
{{--               class="nav-link {{ (Request::segment(3)=='bulk')?'active':'' }}">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Bulk Enquiry</p>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'enquiry/newsletter')}}"
               class="nav-link {{ (Request::segment(3)=='newsletter')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Newsletter</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'site-information')}}"
       class="nav-link {{ (Request::segment(2)=='site-information')?'active':''}}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>Site Information</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'blog')}}"
       class="nav-link {{ (Request::segment(2)=='blog')?'active':''}}">
        <i class="nav-icon fas fa-rss"></i>
        <p>Blog</p>
    </a>
</li>
{{--
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'currency')}}"
       class="nav-link {{ (Request::segment(2)=='currency')?'active':'' }}">
        <i class="nav-icon fas fa-money-check"></i>
        <p>Currency</p>
    </a>
</li>
--}}
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'country')}}"
       class="nav-link {{ (Request::segment(2)=='country') && (Request::segment(3)!='shipping-charge')?'active':'' }}">
        <i class="nav-icon fas fa-globe"></i>
        <p>Country</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'country/shipping-charge')}}"
       class="nav-link {{ (Request::segment(3)=='shipping-charge')?'active':'' }}">
        <i class="nav-icon fas fa-ship"></i>
        <p>Shipping charge</p>
    </a>
</li>
<li class="nav-item {{ (Request::segment(2)=='seo')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-asterisk"></i>
        <p>SEO Data
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='seo')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/home')}}"
               class="nav-link {{ (Request::segment(3)=='home')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Home</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/about')}}"
               class="nav-link {{ (Request::segment(3)=='about')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>About</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/blogs')}}"
               class="nav-link {{ (Request::segment(3)=='blogs')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Blog</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/contact')}}"
               class="nav-link {{ (Request::segment(3)=='contact')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/privacy-policy')}}"
               class="nav-link {{ (Request::segment(3)=='privacy-policy')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Privacy Policy</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/return-policy')}}"
               class="nav-link {{ (Request::segment(3)=='return-policy')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Return Policy</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/shipping-policy')}}"
               class="nav-link {{ (Request::segment(3)=='shipping-policy')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Shipping Policy</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/terms-and-conditions')}}"
               class="nav-link {{ (Request::segment(3)=='terms-and-conditions')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Terms & Conditions</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/disclaimer')}}"
               class="nav-link {{ (Request::segment(3)=='disclaimer')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Disclaimer</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/products')}}"
               class="nav-link {{ (Request::segment(3)=='products')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Products</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/login')}}"
               class="nav-link {{ (Request::segment(3)=='login')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Login</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/my-account')}}"
               class="nav-link {{ (Request::segment(3)=='my-account')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>My Account</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/cart')}}"
               class="nav-link {{ (Request::segment(3)=='cart')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Cart</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/wishlist')}}"
               class="nav-link {{ (Request::segment(3)=='wishlist')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Wishlist</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/checkout')}}"
               class="nav-link {{ (Request::segment(3)=='checkout')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Checkout</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/thank-you')}}"
               class="nav-link {{ (Request::segment(3)=='thank-you')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thank you</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/compare')}}"
               class="nav-link {{ (Request::segment(3)=='compare')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Compare</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'seo/extra')}}"
               class="nav-link {{ (Request::segment(3)=='extra')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Extra Seo Data</p>
            </a>
        </li>
    </ul>
</li>
{{--
<li class="nav-item {{ (Request::segment(2)=='advertisement')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='advertisement')?'active':'' }}">
        <i class="nav-icon fas fa-th-list"></i>
        <p>Advertisements
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='advertisement')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'advertisement/home')}}"
               class="nav-link {{ (Request::segment(3)=='home')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Home</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'advertisement/blog-detail')}}"
               class="nav-link {{ (Request::segment(3)=='blog-detail')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Blog Detail</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'advertisement/cart')}}"
               class="nav-link {{ (Request::segment(3)=='cart')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Cart</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'advertisement/checkout')}}"
               class="nav-link {{ (Request::segment(3)=='checkout')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Checkouts</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'advertisement/product')}}"
               class="nav-link {{ (Request::segment(3)=='product')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'advertisement/product-detail')}}"
               class="nav-link {{ (Request::segment(3)=='product-detail')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Detail</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'advertisement/wishlist')}}"
               class="nav-link {{ (Request::segment(3)=='wishlist')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Wishlist</p>
            </a>
        </li>
    </ul>
</li>
--}}
<li class="nav-item {{ (Request::segment(2)=='product')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='product')?'active':'' }}">
        <i class="nav-icon fas icon fas fa-info"></i>
        <p>
            Product
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='product')?'block':'none' }}">
{{--        <li class="nav-item">--}}
{{--            <a href="{{url(Helper::sitePrefix().'product/brand')}}"--}}
{{--               class="nav-link {{ (Request::segment(3)=='brand')?'active':'' }}">--}}
{{--                <i class="nav-icon fas fa-tag"></i>--}}
{{--                <p>Brand</p>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'product/category')}}"
               class="nav-link {{ (Request::segment(3)=='category')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'product/sub-category')}}"
               class="nav-link {{ (Request::segment(3)=='sub-category')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sub Category</p>
            </a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a href="{{url(Helper::sitePrefix().'product/measurement-unit')}}"--}}
{{--               class="nav-link {{ (Request::segment(3)=='measurement-unit')?'active':'' }}">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Measurement Unit</p>--}}
{{--            </a>--}}
{{--        </li>--}}
        {{--
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'product/color')}}"
               class="nav-link {{ (Request::segment(3)=='color')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Color</p>
            </a>
        </li>
        --}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{url(Helper::sitePrefix().'product/tag')}}"--}}
{{--               class="nav-link {{ (Request::segment(3)=='tag')?'active':'' }}">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Tags</p>--}}
{{--            </a>--}}
{{--        </li>--}}


                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'product/color')}}"
                       class="nav-link {{ (Request::segment(3)=='color')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Color</p>
                    </a>
                </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'product/')}}"
               class="nav-link {{ (Request::segment(2)=='product' && Request::is(Helper::sitePrefix().'product'))?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'product/review')}}"
               class="nav-link {{ (Request::segment(3)=='review')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Reviews</p>
                <span class="badge badge-info pull-right">{{App\Models\ProductReview::active()->count()}}</span>
            </a>
        </li>
    </ul>
</li>
{{-- <li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'deal')}}" class="nav-link {{ (Request::segment(2)=='deal')?'active':'' }}">
        <i class="nav-icon fas fa-question-circle"></i>
        <p>Deal</p>
    </a>
</li> --}}
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'coupon')}}" class="nav-link {{ (Request::segment(2)=='coupon')?'active':'' }}">
        <i class="nav-icon fas fa-asterisk"></i>
        <p>Coupon</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'order')}}" class="nav-link {{ (Request::segment(2)=='order')?'active':'' }}">
        <i class="nav-icon fas fa-th-list"></i>
        <p>Order</p>
        <span class="pull-right-container">
            <span class="badge badge-success pull-right">{{App\Models\Order::OrderCountByStatus('Processing')}}</span>
        </span>
    </a>
</li>
<li class="nav-item {{ (Request::segment(2)=='menu')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-list"></i>
        <p>Menu
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='menu')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'menu')}}"
               class="nav-link {{ (Request::is(Helper::sitePrefix().'menu'))?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'menu/detail')}}"
               class="nav-link {{ (Request::segment(3)=='detail')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu Detail</p>
            </a>
        </li>

    </ul>
</li>
<li class="nav-item menu-report hide-menu {{ (Request::segment(2)=='report')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas icon fas fa-info"></i>
        <p>Report
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='report')?'block':'none' }}">
        <li class="nav-item {{ (Request::segment(3)=='product')?'menu-is-opening menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: {{ (Request::segment(3)=='product')?'block':'none' }}">
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/product/out-of-stock')}}"
                       class="nav-link {{ (Request::segment(4)=='out-of-stock')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Out of stock</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/product/featured')}}"
                       class="nav-link {{ (Request::segment(4)=='featured')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Featured</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/product/new-product')}}"
                       class="nav-link {{ (Request::segment(4)=='new-product')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>New Product</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ (Request::segment(3)=='order')?'menu-is-opening menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Order
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: {{ (Request::segment(3)=='order')?'block':'none' }}">
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/order/processing')}}"
                       class="nav-link {{ (Request::segment(4)=='processing')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Processing Order</p>
                        <span class="pull-right-container">
                            <span
                                class="badge badge-info pull-right">{{App\Models\Order::OrderCountByStatus('Processing')}}</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/order/on hold')}}"
                       class="nav-link {{ (Request::segment(4)=='on hold')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>On-hold Orders</p>
                        <span class="pull-right-container">
                            <span
                                class="badge badge-info pull-right">{{App\Models\Order::OrderCountByStatusOnHold()}}</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/order/out for delivery')}}"
                       class="nav-link {{ (Request::segment(4)=='out for delivery')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Out for delivery Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/order/completed')}}"
                       class="nav-link {{ (Request::segment(4)=='completed')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Completed Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/order/cancelled')}}"
                       class="nav-link {{ (Request::segment(4)=='cancelled')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Cancelled Orders</p>
                        <span class="pull-right-container">
                            <span
                                class="badge badge-info pull-right">{{App\Models\Order::OrderCountByStatus('Cancelled')}}</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/order/refunded')}}"
                       class="nav-link {{ (Request::segment(4)=='refunded')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Refund Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/order/failed')}}"
                       class="nav-link {{ (Request::segment(4)=='failed')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Failed Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/order/method/cod')}}"
                       class="nav-link {{ (Request::segment(5)=='cod')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>COD Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/order/method/online-payment')}}"
                       class="nav-link {{ (Request::segment(5)=='online-payment')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Online-payment Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/order-offer')}}"
                       class="nav-link {{ (Request::segment(3)=='order-offer')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Offer applied orders</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ (Request::segment(3)=='product')?'menu-is-opening menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: {{ (Request::segment(3)=='customer')?'block':'none' }}">
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/customer/basic')}}"
                       class="nav-link {{ (Request::segment(4)=='basic')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Basic Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/customer/order-report')}}"
                       class="nav-link {{ (Request::segment(4)=='order-report')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Customer Order Report</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
<li class="nav-item menu-detail hide-menu">
    <a href="{{url(Helper::sitePrefix().'report/detail-report')}}"
       class="nav-link {{ (Request::segment(3)=='detail_report')?'active':'' }}">
        <i class="nav-icon fas fa-th-list"></i>
        <p>
            Detail Report
        </p>
    </a>
</li>
<li class="nav-item hide-menu{{ (Request::segment(2)=='mail')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-asterisk"></i>
        <p>
            Abandoned Cart
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='mail')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'mail/list')}}"
               class="nav-link {{ (Request::segment(3)=='list')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Mail Template </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'mail/cart')}}"
               class="nav-link {{ (Request::segment(3)=='cart')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Cart</p>
            </a>
        </li>
    </ul>
</li>

@if($banner)

    <div class="d-none d-md-block">
        <section class="inner_banner ">
            {!! Helper::printImage($banner, 'desktop_banner','desktop_banner_webp','banner_attribute','img-fluid') !!}
        </section>
    </div>

    <div class="d-block d-md-none">
        <section class="inner_banner ">
            {!! Helper::printImage($banner, 'mobile_banner','mobile_banner_webp','banner_attribute','img-fluid') !!}
        </section>
    </div>
@endif
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        {{ $type }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

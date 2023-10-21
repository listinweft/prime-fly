@extends('web.layouts.main')
@section('content')

<section class="col-12 event-details p-0">
{!! Helper::printImage($blog, 'desktop_banner','desktop_banner_webp','image_attribute', 'img-fluid') !!}
        </section> 
        <section class="col-12 event-details-content">
            <div class="container">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-5">
                    <h1>{{$blog->title}}</h1>
                </div> 
                <div class="row">
                    <div class="col-lg-6 event-details-desc pe-5">
                    @php $originalText =  $blog->description;


$textLength = strlen($originalText);


$splitPoint = ceil($textLength / 2);


$part1 = substr($originalText, 0, $splitPoint);
$part2 = substr($originalText, $splitPoint);



@endphp

                        <p>{!!$part1!!}</p>
                    </div>
                    <div class="col-lg-6  event-details-desc ps-5">


                        <p>{!!$part2!!}</p>
                    </div>
                </div>
            </div>
        </section>

@endsection
@push('scripts')

@endpush
@extends('web.layouts.main')

@section('content')
    @include('web.includes.banner',[$banner, 'type'=> @$title])



<section class="privacy_policy">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{@$title}}</h1>
                {!! $siteInformation->$field !!}

            </div>
        </div>
    </div>
</section>

@endsection

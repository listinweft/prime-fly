@extends('web.layouts.main')
@section('content')



    <section class="col-12 privacy-content">
            <div class="container">
                <div class="col-12 privacy-head">
                    <h1 class="main-head">Privacy Policies</h1>
                   
                </div>
                <div class="col-12 privacy-content-details">
                {!! $policydata->privacy_policy !!}
                </div>
            </div>
        </section>



@endsection
@push('scripts')
    
@endpush

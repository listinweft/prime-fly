@extends('web.layouts.main')
@section('content')



    <section class="col-12 privacy-content">
            <div class="container">
                <div class="col-12 privacy-head">
                    <h1 class="main-head">Terms and conditions</h1>
                    <h5 class="sub-head">This privacy statement is effective as of 25, April 2023</h5>
                </div>
                <div class="col-12 privacy-content-details">
                {!! $policydata->privacy_policy !!}
                </div>
            </div>
        </section>



@endsection
@push('scripts')
    
@endpush

@extends('web.layouts.main')
@section('content')



    <section class="col-12 privacy-content">
            <div class="container">
                <div class="col-12 privacy-head">
                    <h1 class="main-head">Terms and conditions</h1>
                  
                </div>
                <div class="col-12 privacy-content-details">
                {!! $policydata->terms_and_conditions !!}
                </div>
            </div>
        </section>



@endsection
@push('scripts')
    
@endpush

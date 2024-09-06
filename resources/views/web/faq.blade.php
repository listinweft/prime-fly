@extends('web.layouts.main')
@section('content')

<main class="faq-page">
<section class="col-12 locationbanner p-0">
           <div class="d-flex justify-content-end">
              <div class="locinner_bannerimg w-100">
                <img src="{{ asset('frontend/img/faq.png')}}" class="w-100" alt="Meet and Greet" />
                <div class="loc-text text-start">
                    <div class="container">
                        <h1>FAQ</h1>
                    </div> 
                </div>
              </div>
           </div> 
         </section>

    <div class="container position-relative pt-5 pb-5">
        <div class="faq-header text-center mb-4">
            <h1>Frequently Asked   Questions</h1>
            <!-- <p>Id volutpat aliquet eget soenim. Sed auctor feugiat volutpat metus vitae laoreet sed </p> -->
        </div>

        <div class="faq-contents">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="row">
                    <div class="col-lg-12">   @php   $i = 1; @endphp
                        @foreach($faqs->slice(0, 20) as $faq)

                     
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading{{ $faq->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{ $faq->id }}" aria-expanded="false"
                                            aria-controls="flush-collapse{{ $faq->id }}">
                                        <div class="faq-number me-2">{{ $i }}</div> {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                     aria-labelledby="flush-heading{{ $faq->id }}" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                    {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                          @php   $i++; @endphp
                        @endforeach
                    </div>
                    <div class="col-lg-12">
                    @php   $i = 21; @endphp
                        @foreach($faqs->slice(5) as $faq)
                  
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading{{ $faq->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{ $faq->id }}" aria-expanded="false"
                                            aria-controls="flush-collapse{{ $faq->id }}">
                                        <div class="faq-number">{{ $i }}</div> {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                     aria-labelledby="flush-heading{{ $faq->id }}" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>{!! $faq->answer !!}</p>
                                    </div>
                                </div>
                            </div>
                            @php   $i++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@push('scripts')

@endpush

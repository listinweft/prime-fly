@extends('web.layouts.main')
@section('content')

<main class="faq-page">
    <img src="{{ asset('frontend/images/faq-banner.png')}}" alt="" class="faq-bckdrop">

    <div class="container">
        <div class="faq-header">
            <h1>Frequently Asked Questions</h1>
            <p>Id volutpat aliquet eget soenim. Sed auctor feugiat volutpat metus vitae laoreet sed </p>
        </div>

        <div class="faq-contents">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="row">
                    <div class="col-md-6">   @php   $i = 1; @endphp
                        @foreach($faqs->slice(0, 5) as $faq)

                     
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
                    <div class="col-md-6">
                    @php   $i = 6; @endphp
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

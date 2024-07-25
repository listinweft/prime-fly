@extends('web.layouts.main')

@section('content')
<section class="col-12 package-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 section-head text-center mb-4" data-aos="fade-up" data-aos-duration="600">
                <h2>Choose Your Package</h2>
                <p>{{ $categorys   }}</p>
            </div>
            <div class="col-lg-10 packge-content" data-aos="fade-up" data-aos-duration="600">
                <ul class="nav nav-pills justify-content-center" id="packageTab" role="tablist">
                    @foreach ($totalAmounts as $index => $item)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $index === 0 ? 'active' : '' }}" id="package{{ $index + 1 }}-tab" data-bs-toggle="tab" data-bs-target="#package{{ $index + 1 }}-tab-pane"
                           type="button" role="tab" aria-controls="package{{ $index + 1 }}-tab-pane" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                           <p>{{ ucwords($item['product']['title']) }}</p>

                            <h4>&#8377; {{ number_format($item['total_amount']) }}</h4>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="packageTabContent">
                    @foreach ($totalAmounts as $index => $item)
                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="package{{ $index + 1 }}-tab-pane" role="tabpanel" aria-labelledby="package{{ $index + 1 }}-tab" tabindex="0">
                        <div class="d-flex justify-content-center">
                            <div class="col-lg-11 packagecontent-wrp">
                                <div class="col-12 packge-content-edit">
                                    <div class="d-flex justify-content-between align-items-center">
                                    
                                        <div>
                                            <h4>{{ $item['product']['location_title'] ?? 'Location' }}</h4>
                                            <p>Travel Type:{{ ucwords($item['product']['service_type']) }}, {{ $item['setdate'] }}, {{ $item['flight_number'] ?? '' }}</p>

                                            @if(session('category') == 'Meet and Greet' || session('category') == 'Airport Entry' || session('category') == 'Lounge Booking')
        @if($item['totalguest'] > 0)
            <p>{{ $item['totalguest'] }} Guest</p>
        @endif
    @elseif( session('category') == 'Cloak Room' ||  session('category') == 'Baggage wrapping')
        @if($item['totalguest'] > 0)
            <p>{{ $item['totalguest'] }} Bag</p>
        @endif
        @elseif(session('category') == 'Car Parking' )
        @if($item['totalguest'] > 0)
            <p>{{ $item['totalguest'] }} Car</p>
        @endif

        @else

        @if($item['totalguest'] > 0)
            <p>{{ $item['totalguest'] }} Porter</p>
        @endif
         
        
    @endif

                                        </div>
                                       
                                        <div>
                                        <a href="#" onclick="window.history.go(-1);"> <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path     fill=" #6e53f5" d="M21.8082 15.921V25.6705C21.8082 26.2372 21.3488 26.6967 20.782 26.6967H1.02629C0.4595 26.6967 0 26.2372 0 25.6705V5.91492C0 5.34818 0.4595 4.88865 1.02629 4.88865H12.7002C13.2669 4.88865 13.7264 5.34818 13.7264 5.91492C13.7264 6.48167 13.2669 6.94119 12.7002 6.94119H2.05258V24.6442H19.7557V15.921C19.7557 15.3542 20.2152 14.8947 20.782 14.8947C21.3488 14.8947 21.8082 15.3542 21.8082 15.921ZM26.6089 5.60725L13.0024 19.2138C12.8197 19.3963 12.5753 19.5033 12.3173 19.5135L8.30346 19.6723C8.28993 19.6728 8.27631 19.673 8.26286 19.673C7.99123 19.673 7.73004 19.5653 7.53713 19.3725C7.33484 19.17 7.22605 18.8923 7.23737 18.6062L7.39605 14.5922C7.40631 14.3342 7.51333 14.0897 7.69589 13.907L21.3024 0.300554C21.4949 0.10813 21.7558 0 22.028 0C22.3003 0 22.5612 0.10813 22.7538 0.300665L26.6089 4.1558C27.0097 4.55668 27.0097 5.20637 26.6089 5.60725ZM24.4319 4.88151L22.028 2.47758L9.4312 15.0745L9.33223 17.5774L11.835 17.4784L24.4319 4.88151Z" fill="url(#paint0_linear_13805_219214)"/>
                                                    <!-- <defs>
                                                        <linearGradient id="paint0_linear_13805_219214" x1="26.9095" y1="-14.3192" x2="-7.99989" y2="-8.93771" gradientUnits="userSpaceOnUse">
                                                            <stop offset="0.28901" stop-color="#7B45F6"/>
                                                            <stop offset="1" stop-color="#338DF2"/>
                                                        </linearGradient>
                                                    </defs> -->
                                                </svg></a>
                                               
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 package-content-list">
                                    <div class="d-flex flex-wrap justify-content-between">
                                      
                                        {!! ($item['product']['description']) !!}
                                       
                                        
                                    </div>
                                </div>
                                @php

                                $user = Auth::guard('customer')->user();
                                @endphp
                                <div class="col-12 package-content-button text-center">
                                    <a href="" class="btn btn-primary cart-action" data-id="{{$item['product']['id']}}" data-customerid="{{$user->id ?? ''}} " data-price="{{ $item['total_amount']  }}" data-guest="{{ $item['totalguest']}}"  data-setdate="{{ $item['setdate']}}"  data-flight_number="{{ $item['flight_number'] ?? '' }}" data-origin="{{ $item['origin'] ?? '' }}" data-destination="{{ $item['destination'] ?? '' }}" data-travel_sector="{{ $item['travel_sector'] ?? '' }}"  data-travel_type="{{ $item['travel_type'] ?? '' }}"   data-terminal="{{ $item['terminal'] ?? '' }}" data-entry_time="{{ $item['entry_time'] ?? '' }}" data-exit_time="{{ $item['exit_time'] ?? '' }}" data-bag_count="{{ $item['bag_count'] ?? '' }}" data-adults="{{$item['adults'] ?? ''}} " data-infants="{{$item['infants'] ?? '' }}" data-children="{{$item['children'] ?? ''}} " data-pnr="{{$item['pnr'] ?? ''}} ">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- Your additional scripts here -->
@endpush
  
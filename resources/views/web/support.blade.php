@extends('web.layouts.main')
@section('content')


<section class="col-12 locationbanner p-0">
           <div class="d-flex justify-content-end">
              <div class="locinner_bannerimg">
                <img src="{{ asset('frontend/img/support.png')}}" class="w-100" alt="Meet and Greet" />
                <div class="loc-text text-start">
                    <div class="container">
                        <h1>SUPPORT</h1>
                    </div> 
                </div>
              </div>
           </div> 
         </section>          
                      
<section class="col-12 support-section">
             <div class="col-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="col-lg-6 supprt-infrmation">
                        <h3>Important Information</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="information-list">
                                        <img src="{{ asset('frontend/img/refund-icon.png')}}" alt="icon" />
                                        <p>Refund Policy</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="information-list">
                                        <img src="{{ asset('frontend/img/cancel-icon.png')}}" alt="icon" />
                                        <p>Flight Cancellation</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="information-list">
                                        <img src="{{ asset('frontend/img/baggage-icon.png')}}" alt="icon" />
                                        <p>Baggage Allowance</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="information-list">
                                        <img src="{{ asset('frontend/img/checkin-icon.png')}}" alt="icon" />
                                        <p>Web Check-in</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="information-list">
                                        <img src="{{ asset('frontend/img/box-icon.png')}}" alt="icon" />
                                        <p>Dangerous Goods 
                                            Policy</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 support-links">
                        <h3>Important Links</h3>
                        <ul class="d-flex flex-wrap">
                            @foreach($categorys as $category)
                            <li>
                                <a href="{{ url('service/'.@$category->short_url) }}" class="btn-style-2">
                                    <div class="btn-in">
                                        <svg width="15" height="27" viewBox="0 0 15 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0313 4.36543V6.10818H10.3872V4.36543C10.5989 4.41605 10.8196 4.41605 11.0313 4.36543ZM4.63492 6.10818V4.36543C4.84666 4.41605 5.06735 4.41605 5.27908 4.36543V6.10818H4.63492ZM2.62776 9.87797C2.63032 9.79426 2.66538 9.71483 2.7255 9.65652C2.78562 9.5982 2.86609 9.56559 2.94984 9.56559C3.0336 9.56559 3.11406 9.5982 3.17418 9.65652C3.2343 9.71483 3.26936 9.79426 3.27192 9.87797V20.7519C3.26936 20.8356 3.2343 20.915 3.17418 20.9733C3.11406 21.0317 3.0336 21.0643 2.94984 21.0643C2.86609 21.0643 2.78562 21.0317 2.7255 20.9733C2.66538 20.915 2.63032 20.8356 2.62776 20.7519V9.88038V9.87797ZM5.06948 9.87797C5.07204 9.79426 5.1071 9.71483 5.16722 9.65652C5.22734 9.5982 5.30781 9.56559 5.39156 9.56559C5.47532 9.56559 5.55578 9.5982 5.6159 9.65652C5.67603 9.71483 5.71108 9.79426 5.71364 9.87797V20.7519C5.71108 20.8356 5.67603 20.915 5.6159 20.9733C5.55578 21.0317 5.47532 21.0643 5.39156 21.0643C5.30781 21.0643 5.22734 21.0317 5.16722 20.9733C5.1071 20.915 5.07204 20.8356 5.06948 20.7519V9.88038V9.87797ZM7.5109 9.87797C7.51449 9.79492 7.55001 9.71647 7.61005 9.65897C7.67009 9.60147 7.75 9.56938 7.83313 9.56938C7.91626 9.56938 7.99618 9.60147 8.05622 9.65897C8.11625 9.71647 8.15177 9.79492 8.15536 9.87797V20.7519C8.15177 20.8349 8.11625 20.9134 8.05622 20.9709C7.99618 21.0284 7.91626 21.0605 7.83313 21.0605C7.75 21.0605 7.67009 21.0284 7.61005 20.9709C7.55001 20.9134 7.51449 20.8349 7.5109 20.7519V9.88038V9.87797ZM9.95262 9.87797C9.95518 9.79426 9.99024 9.71483 10.0504 9.65652C10.1105 9.5982 10.1909 9.56559 10.2747 9.56559C10.3585 9.56559 10.4389 9.5982 10.499 9.65652C10.5592 9.71483 10.5942 9.79426 10.5968 9.87797V20.7519C10.5942 20.8356 10.5592 20.915 10.499 20.9733C10.4389 21.0317 10.3585 21.0643 10.2747 21.0643C10.1909 21.0643 10.1105 21.0317 10.0504 20.9733C9.99024 20.915 9.95518 20.8356 9.95262 20.7519V9.88038V9.87797ZM12.3943 9.87797C12.3969 9.79426 12.432 9.71483 12.4921 9.65652C12.5522 9.5982 12.6327 9.56559 12.7164 9.56559C12.8002 9.56559 12.8806 9.5982 12.9408 9.65652C13.0009 9.71483 13.0359 9.79426 13.0385 9.87797V20.7519C13.0359 20.8356 13.0009 20.915 12.9408 20.9733C12.8806 21.0317 12.8002 21.0643 12.7164 21.0643C12.6327 21.0643 12.5522 21.0317 12.4921 20.9733C12.432 20.915 12.3969 20.8356 12.3943 20.7519V9.88038V9.87797ZM5.43116 3.57822C5.49301 3.51927 5.54226 3.44839 5.57596 3.36987C5.60965 3.29136 5.62709 3.20682 5.62721 3.12138V2.46668C5.62879 2.38279 5.66363 2.30295 5.72405 2.24473C5.78447 2.18651 5.86555 2.15466 5.94944 2.1562H9.71682C9.75835 2.15544 9.79962 2.16287 9.83827 2.17806C9.87693 2.19326 9.91221 2.21592 9.9421 2.24475C9.972 2.27358 9.99592 2.30802 10.0125 2.3461C10.0291 2.38418 10.038 2.42515 10.0388 2.46668V3.12138C10.0389 3.20685 10.0564 3.29139 10.0901 3.36991C10.1239 3.44843 10.1732 3.51929 10.2351 3.57822C10.3631 3.69964 10.5328 3.76732 10.7093 3.76732C10.8857 3.76732 11.0554 3.69964 11.1834 3.57822C11.2453 3.51929 11.2946 3.44843 11.3284 3.36991C11.3621 3.29139 11.3796 3.20685 11.3798 3.12138V1.51023C11.3796 1.42477 11.3621 1.34022 11.3284 1.2617C11.2946 1.18318 11.2453 1.11232 11.1834 1.05339C11.0559 0.931304 10.886 0.8635 10.7094 0.864264H4.95745C4.78091 0.8635 4.61097 0.931304 4.48344 1.05339C4.42155 1.11232 4.37223 1.18318 4.33849 1.2617C4.30474 1.34022 4.28726 1.42477 4.2871 1.51023V3.12138C4.28726 3.20685 4.30474 3.29139 4.33849 3.36991C4.37223 3.44843 4.42155 3.51929 4.48344 3.57822C4.61146 3.69964 4.78117 3.76732 4.9576 3.76732C5.13404 3.76732 5.30375 3.69964 5.43177 3.57822H5.43116ZM1.58639 24.0564V25.0619C1.58508 25.1458 1.61564 25.2271 1.67191 25.2893C1.69356 25.3132 1.71987 25.3325 1.74924 25.3458C1.77861 25.3592 1.8104 25.3664 1.84266 25.367H13.8236C13.8559 25.3664 13.8877 25.3592 13.917 25.3458C13.9464 25.3325 13.9727 25.3132 13.9944 25.2893C14.0506 25.2271 14.0812 25.1458 14.0799 25.0619V24.0567C13.5716 24.3612 12.9901 24.5215 12.3977 24.5205H3.26861C2.67616 24.5215 2.09462 24.3609 1.58639 24.0564ZM4.50934 25.9877H3.15417C3.1511 26.0147 3.14959 26.0418 3.14965 26.069C3.14979 26.1559 3.16756 26.2419 3.20188 26.3218C3.2362 26.4016 3.28635 26.4737 3.34932 26.5337C3.4794 26.657 3.65186 26.7258 3.83116 26.7258C4.01045 26.7258 4.18291 26.657 4.31299 26.5337C4.376 26.4737 4.4262 26.4017 4.46057 26.3218C4.49494 26.2419 4.51276 26.1559 4.51296 26.069C4.51293 26.0418 4.51132 26.0147 4.50814 25.9877H4.50934ZM12.5115 25.9877H11.1563C11.1531 26.0147 11.1515 26.0418 11.1515 26.069C11.1517 26.1559 11.1695 26.2419 11.2038 26.3217C11.2381 26.4016 11.2883 26.4737 11.3512 26.5337C11.4813 26.657 11.6537 26.7257 11.833 26.7257C12.0123 26.7257 12.1847 26.657 12.3148 26.5337C12.3778 26.4737 12.428 26.4016 12.4623 26.3218C12.4966 26.2419 12.5144 26.1559 12.5145 26.069C12.5146 26.0418 12.5131 26.0147 12.51 25.9877H12.5115ZM14.1299 23.2418C14.1568 23.2014 14.1925 23.1676 14.2344 23.143C14.4601 22.9204 14.6395 22.6553 14.7624 22.363C14.8852 22.0707 14.9491 21.7571 14.9502 21.44V9.18774C14.9488 8.86261 14.8816 8.54113 14.7527 8.24266C14.6238 7.94419 14.4358 7.6749 14.2 7.45101C13.7155 6.9858 13.0694 6.7267 12.3977 6.72825H3.26861C2.59686 6.72654 1.95068 6.98566 1.46623 7.45101C1.23047 7.6749 1.04247 7.94419 0.913545 8.24266C0.784622 8.54113 0.717447 8.86261 0.716064 9.18774V21.4403C0.717221 21.7574 0.78106 22.0711 0.903911 22.3634C1.02676 22.6558 1.2062 22.9209 1.4319 23.1436C1.47379 23.168 1.50953 23.2017 1.5364 23.2421C2.01313 23.6671 2.62992 23.9013 3.26861 23.8998H12.3977C13.0363 23.9013 13.6531 23.6668 14.1299 23.2418Z" fill="#381A25"/>
                                            <rect x="1.95026" y="8.6875" width="12.0715" height="13.4643" fill="#381A25"/>
                                         </svg> 
                                        {{$category->title}}
                                    </div>
                                </a>
                            </li>
                           @endforeach
                        </ul>
                    </div>
                </div>
             </div>
         </section>   

         @endsection
@push('scripts')

@endpush
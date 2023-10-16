@extends('web.layouts.main')
@section('content')

<!-- @include('web.includes.banner',[$banner, 'title'=> 'Contact Us','type'=> 'Contact Us']) -->


<main class="contact-page">
    <div class="contatct-image">
            
            @if ($banner->desktop_banner != null)
            {!! Helper::printImage($banner, 'desktop_banner','desktop_banner_webp','banner_attribute','img-fluid') !!}
            
        @endif</div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-left">
                    <div class="contact-us-content-wraper">
                        <div class="contact-us-content">
                            <div class="contact-us-content-container">
                                <div class="contact-us-icon">
                                    <svg width="154" height="94" viewBox="0 0 154 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M153.096 47.1641L93.8809 36.9424L86.5292 79.5309L145.744 89.7526L153.096 47.1641Z" fill="#F3F3F3"/>
                                        <path d="M94.4883 37.6172L119.511 65.1205L152.303 47.5943" stroke="#C1C1C1" stroke-width="0.220733" stroke-miterlimit="10"/>
                                        <path d="M117.566 62.9844L87.3164 79.142" stroke="white" stroke-width="0.220733" stroke-miterlimit="10"/>
                                        <path d="M145.131 89.1275L122.033 63.7344" stroke="#C1C1C1" stroke-width="0.220733" stroke-miterlimit="10"/>
                                        <path d="M24.6485 87.3852C41.23 85.0896 52.6993 71.6602 41.9452 59.0166L22.2734 70.4859L24.6485 87.3852Z" fill="#A4AEE9"/>
                                        <path d="M22.2134 70.0178L41.6555 58.681C41.3023 58.2837 40.9492 57.8863 40.5519 57.4979C35.1307 52.0767 33.6385 48.6156 33.8151 45.3311L19.9707 54.0103L22.2134 70.0178Z" fill="#A4AEE9"/>
                                        <path d="M83.2939 23.954V9.35033L76.3275 7.47852V18.9566H49.6453V7.47852L42.679 9.35033V23.954C42.679 23.954 17.3477 45.1267 17.3477 65.3635C17.3477 78.0954 17.3477 81.7154 17.3477 81.7154H62.9864H108.625C108.625 81.7154 108.625 78.0954 108.625 65.3635C108.616 45.1267 83.2939 23.954 83.2939 23.954Z" fill="#FF000A"/>
                                        <path d="M82.1738 54.8187C85.3817 44.2244 79.3937 33.0355 68.7994 29.8277C58.2051 26.6198 47.0162 32.6077 43.8083 43.202C40.6005 53.7964 46.5884 64.9852 57.1827 68.1931C67.7771 71.401 78.966 65.413 82.1738 54.8187Z" fill="#C1C1C1"/>
                                        <path d="M62.9886 0C-6.03898 0 1.98685 23.1593 1.98685 23.1593H30.6557C30.6557 8.48498 62.9886 8.48499 62.9886 8.48499C62.9886 8.48499 95.3216 8.48498 95.3216 23.1593H123.99C123.982 23.1593 132.007 0 62.9886 0Z" fill="#FF000A"/>
                                        <path d="M1.94245 30.921H30.7525C31.8297 30.921 32.695 30.0469 32.695 28.9785V23.213C32.695 22.1358 31.8209 21.2705 30.7525 21.2705H1.94245C0.86527 21.2705 0 22.1446 0 23.213V28.9785C0 30.0557 0.86527 30.921 1.94245 30.921Z" fill="black"/>
                                        <path d="M95.2179 30.921H124.028C125.105 30.921 125.97 30.0469 125.97 28.9785V23.213C125.97 22.1358 125.096 21.2705 124.028 21.2705H95.2179C94.1407 21.2705 93.2754 22.1446 93.2754 23.213V28.9785C93.2754 30.0557 94.1407 30.921 95.2179 30.921Z" fill="black"/>
                                        <path d="M62.9901 59.8981C69.0026 59.8981 73.8766 55.024 73.8766 49.0115C73.8766 42.9991 69.0026 38.125 62.9901 38.125C56.9776 38.125 52.1035 42.9991 52.1035 49.0115C52.1035 55.024 56.9776 59.8981 62.9901 59.8981Z" fill="black"/>
                                        <path d="M47.9313 51.5012C49.3064 51.5012 50.4211 50.3865 50.4211 49.0114C50.4211 47.6362 49.3064 46.5215 47.9313 46.5215C46.5562 46.5215 45.4414 47.6362 45.4414 49.0114C45.4414 50.3865 46.5562 51.5012 47.9313 51.5012Z" fill="white"/>
                                        <path d="M49.8484 56.7806C48.7977 57.6635 48.6565 59.2351 49.5394 60.2858C50.4223 61.3365 51.9939 61.4778 53.0446 60.5949C54.0953 59.7119 54.2366 58.1403 53.3537 57.0896C52.4707 56.0389 50.9079 55.8977 49.8484 56.7806Z" fill="#DFE0E1"/>
                                        <path d="M57.925 63.4043C57.6866 64.7552 58.5872 66.0443 59.9469 66.2827C61.2978 66.5211 62.5869 65.6205 62.8252 64.2607C63.0636 62.9099 62.163 61.6208 60.8033 61.3824C59.4524 61.1528 58.1634 62.0534 57.925 63.4043Z" fill="#DFE0E1"/>
                                        <path d="M68.3548 63.2892C69.0434 64.4812 70.5621 64.8873 71.754 64.1986C72.946 63.5099 73.3522 61.9913 72.6635 60.7993C71.9748 59.6074 70.4561 59.2012 69.2642 59.8899C68.0722 60.5786 67.6661 62.1061 68.3548 63.2892Z" fill="#DFE0E1"/>
                                        <path d="M76.2741 56.4986C77.5632 56.9665 78.9935 56.3043 79.4615 55.0152C79.9294 53.7262 79.2672 52.2958 77.9781 51.8279C76.689 51.3599 75.2587 52.0221 74.7908 53.3112C74.3228 54.6003 74.985 56.0306 76.2741 56.4986Z" fill="white"/>
                                        <path d="M77.9797 46.2033C79.2688 45.7353 79.9398 44.305 79.463 43.0159C78.9951 41.7268 77.5647 41.0558 76.2757 41.5326C74.9866 42.0094 74.3156 43.4309 74.7923 44.7199C75.2603 46.009 76.6906 46.6712 77.9797 46.2033Z" fill="white"/>
                                        <path d="M49.8484 56.7806C48.7977 57.6635 48.6565 59.2351 49.5394 60.2858C50.4223 61.3365 51.9939 61.4778 53.0446 60.5949C54.0953 59.7119 54.2366 58.1403 53.3537 57.0896C52.4707 56.0389 50.9079 55.8977 49.8484 56.7806Z" fill="white"/>
                                        <path d="M72.6635 37.2238C73.3522 36.0318 72.946 34.5132 71.754 33.8245C70.5621 33.1358 69.0434 33.5419 68.3548 34.7339C67.6661 35.9259 68.0722 37.4445 69.2642 38.1332C70.4561 38.813 71.9748 38.4069 72.6635 37.2238Z" fill="white"/>
                                        <path d="M57.925 63.4043C57.6866 64.7552 58.5872 66.0443 59.9469 66.2827C61.2978 66.5211 62.5869 65.6205 62.8252 64.2607C63.0636 62.9099 62.163 61.6208 60.8033 61.3824C59.4524 61.1528 58.1634 62.0534 57.925 63.4043Z" fill="white"/>
                                        <path d="M62.825 33.7542C62.5866 32.4033 61.2975 31.4939 59.9466 31.7323C58.5957 31.9707 57.6863 33.2598 57.9247 34.6107C58.1631 35.9616 59.4522 36.871 60.8031 36.6326C62.1628 36.403 63.0634 35.1139 62.825 33.7542Z" fill="white"/>
                                        <path d="M68.3548 63.2892C69.0434 64.4812 70.5621 64.8873 71.754 64.1986C72.946 63.5099 73.3522 61.9913 72.6635 60.7993C71.9748 59.6074 70.4561 59.2012 69.2642 59.8899C68.0722 60.5786 67.6661 62.1061 68.3548 63.2892Z" fill="white"/>
                                        <path d="M53.0524 37.4261C52.0018 36.5432 50.4301 36.6844 49.5472 37.7351C48.6643 38.7858 48.8055 40.3574 49.8562 41.2404C50.9069 42.1233 52.4785 41.982 53.3615 40.9313C54.2356 39.8807 54.1031 38.309 53.0524 37.4261Z" fill="white"/>
                                        <path d="M17.2502 87.7454H108.722C109.216 87.7454 109.623 87.3393 109.623 86.8448V76.5852C109.623 76.0907 109.216 75.6846 108.722 75.6846H17.2502C16.7557 75.6846 16.3496 76.0907 16.3496 76.5852V86.8448C16.3496 87.3393 16.7469 87.7454 17.2502 87.7454Z" fill="black"/>
                                        <path d="M123.146 60.7821L87.4082 67.3672L92.1438 93.0681L127.882 86.4831L123.146 60.7821Z" fill="white"/>
                                        <path d="M87.8984 67.624L107.853 77.9985L122.792 61.1963" stroke="#C1C1C1" stroke-width="0.220733" stroke-miterlimit="10"/>
                                        <path d="M106.302 77.1943L92.5195 92.6898" stroke="#C1C1C1" stroke-width="0.220733" stroke-miterlimit="10"/>
                                        <path d="M127.412 86.2624L108.994 76.6826" stroke="#C1C1C1" stroke-width="0.220733" stroke-miterlimit="10"/>
                                    </svg>                            
                                </div>
                                <h1>Contact Us</h1>
                                <h3>{!! $contact->address !!}</h3>
                                <ul>
                                    <li>
                                        <a href="tel:+971505218456">
                                            <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72624 0.316817C3.52367 0.114255 3.24867 0 2.96176 0C2.67486 0 2.39986 0.114255 2.19729 0.316817C1.85164 0.662469 1.38128 1.13283 0.950205 1.56354C0.119414 2.3947 -0.197403 3.61006 0.122659 4.74109C0.12302 4.74181 0.123019 4.74217 0.12338 4.7429C0.652491 6.5728 1.80659 9.5085 4.14866 11.8506C6.49073 14.1926 9.42643 15.3467 11.2567 15.8751C11.2574 15.8751 11.2578 15.8755 11.2585 15.8755C12.3892 16.1956 13.6042 15.8791 14.435 15.0483C14.8664 14.618 15.3368 14.1476 15.6824 13.8019C15.8853 13.5994 15.9992 13.3244 15.9992 13.0375C15.9992 12.7506 15.885 12.4756 15.6824 12.273C14.9965 11.5871 13.7833 10.3739 13.0974 9.68799C12.8949 9.48543 12.6198 9.37118 12.3329 9.37118C12.046 9.37118 11.771 9.48507 11.5685 9.68799L10.1794 11.0771C10.103 11.1535 9.99663 11.1913 9.88995 11.1813C9.33344 11.0187 8.19304 10.5505 6.82089 9.17834C5.44945 7.80691 4.98125 6.66759 4.82843 6.11325C4.81726 6.0062 4.85402 5.90167 4.92899 5.8267C4.93079 5.82526 4.93223 5.82347 4.93404 5.82167C5.26996 5.47205 5.87728 4.86508 6.31124 4.43076C6.51416 4.2282 6.62806 3.95319 6.62806 3.66629C6.62806 3.37939 6.5138 3.10438 6.31124 2.90182L3.72624 0.316817ZM3.21659 0.826465L5.80159 3.41147C5.86899 3.47887 5.9072 3.57078 5.9072 3.66629C5.9072 3.76181 5.86899 3.85372 5.80159 3.92112C5.36511 4.3576 4.75526 4.96745 4.41646 5.31995C4.17677 5.56144 4.06612 5.90239 4.11802 6.23831C4.11983 6.25129 4.12271 6.26391 4.12595 6.27653C4.2867 6.87736 4.77941 8.15617 6.31124 9.68799C7.84054 11.2177 9.11683 11.7107 9.7155 11.8816C9.72992 11.8855 9.74469 11.8888 9.75947 11.8909C10.1001 11.9436 10.4454 11.8304 10.689 11.5867L12.0781 10.1976C12.1455 10.1302 12.2374 10.092 12.3329 10.092C12.4285 10.092 12.5204 10.1302 12.5878 10.1976L15.1728 12.7826C15.2402 12.85 15.2784 12.942 15.2784 13.0375C15.2784 13.133 15.2402 13.2249 15.1728 13.2923C14.8271 13.6376 14.3571 14.1079 13.9257 14.5383L13.9253 14.5387C13.2794 15.1846 12.3344 15.4307 11.4553 15.182C9.70577 14.6771 6.89694 13.5792 4.65831 11.3409C2.42004 9.10229 1.32217 6.29346 0.816126 4.54394C0.567429 3.66449 0.813963 2.71944 1.46021 2.07355L2.70694 0.826465C2.77434 0.759065 2.86625 0.72086 2.96176 0.72086C3.05728 0.72086 3.14919 0.759065 3.21659 0.826465Z" fill="white"/>
                                            </svg>
                                            </span>{!! $contact->phone !!}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:admin@esoan.org">
                                            <span>
                                                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.157089 0.0448833L0.146836 0.0512954C0.119906 0.0686076 0.095536 0.0897672 0.0743766 0.115415L0.0666865 0.125032L0.0621958 0.130804C0.0359069 0.16671 0.016672 0.208388 0.00705414 0.253912L0.00512672 0.26353L0.00384504 0.271866L0.00192741 0.287895L0.000645732 0.303926L0 0.316108V0.320596V11.5415C0 11.7184 0.143627 11.8621 0.320596 11.8621H18.274C18.451 11.8621 18.5946 11.7184 18.5946 11.5415V0.320596L18.5939 0.303926L18.5927 0.287895L18.5914 0.276354L18.5888 0.260965L18.5875 0.253912C18.5779 0.208388 18.5587 0.16671 18.5324 0.130804L18.526 0.122468L18.5202 0.115415C18.4991 0.0897672 18.4747 0.0686076 18.4478 0.0512954L18.4375 0.0448833C18.3894 0.0160296 18.3336 0 18.274 0H0.320596C0.260965 0 0.205179 0.0160296 0.157089 0.0448833ZM0.641193 0.934859V11.2209H17.9534V0.934859L9.48067 6.83511C9.37039 6.91206 9.2242 6.91206 9.11392 6.83511L0.641193 0.934859ZM9.29729 6.18174L17.2526 0.641193H1.34202L9.29729 6.18174Z" fill="white"/>
                                                </svg>                                        
                                            </span>
                                            {!! $contact->alternate_email !!}</a>
                                    </li>
                                </ul>
                                <h3>Emirati Journal of Anesthesiology</h3>
                                <ul>
                                    <li>
                                        <a href="mailto:ejoan@esoan.org">
                                            <span>
                                                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.157089 0.0448833L0.146836 0.0512954C0.119906 0.0686076 0.095536 0.0897672 0.0743766 0.115415L0.0666865 0.125032L0.0621958 0.130804C0.0359069 0.16671 0.016672 0.208388 0.00705414 0.253912L0.00512672 0.26353L0.00384504 0.271866L0.00192741 0.287895L0.000645732 0.303926L0 0.316108V0.320596V11.5415C0 11.7184 0.143627 11.8621 0.320596 11.8621H18.274C18.451 11.8621 18.5946 11.7184 18.5946 11.5415V0.320596L18.5939 0.303926L18.5927 0.287895L18.5914 0.276354L18.5888 0.260965L18.5875 0.253912C18.5779 0.208388 18.5587 0.16671 18.5324 0.130804L18.526 0.122468L18.5202 0.115415C18.4991 0.0897672 18.4747 0.0686076 18.4478 0.0512954L18.4375 0.0448833C18.3894 0.0160296 18.3336 0 18.274 0H0.320596C0.260965 0 0.205179 0.0160296 0.157089 0.0448833ZM0.641193 0.934859V11.2209H17.9534V0.934859L9.48067 6.83511C9.37039 6.91206 9.2242 6.91206 9.11392 6.83511L0.641193 0.934859ZM9.29729 6.18174L17.2526 0.641193H1.34202L9.29729 6.18174Z" fill="white"/>
                                                </svg>                                        
                                            </span>
                                            {!! $contact->enquiry_emails !!}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="contact-social-icons">
                            <ul>
                                <li><a href="#0">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5308 8.30132C16.4219 4.10894 12.9646 0.706055 8.6905 0.706055C4.4709 0.706055 1.04076 4.00006 0.850197 8.13799C0.850197 8.24688 0.850197 8.35579 0.850197 8.4919C0.850197 9.96196 1.25856 11.3231 1.96636 12.5209L0.550781 16.6861L4.87927 15.2977C5.99542 15.9238 7.30217 16.2778 8.66334 16.2778C12.9918 16.2778 16.5036 12.7932 16.5036 8.4919C16.5308 8.43746 16.5308 8.38299 16.5308 8.30132ZM8.6905 15.0527C7.35656 15.0527 6.10433 14.6443 5.06985 13.9638L2.53811 14.7805L3.35477 12.3576C2.5653 11.2687 2.10253 9.96194 2.10253 8.51911C2.10253 8.30133 2.10247 8.08355 2.12969 7.89299C2.45637 4.57175 5.26038 1.98555 8.6905 1.98555C12.1479 1.98555 15.0063 4.6534 15.2513 8.00186C15.2785 8.1652 15.2786 8.32855 15.2786 8.51911C15.2786 12.1126 12.3112 15.0527 8.6905 15.0527Z" fill="#FF000A"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2836 10.0712C12.0931 9.98957 11.1402 9.52675 10.9769 9.44508C10.8135 9.39063 10.6775 9.33621 10.5414 9.55399C10.4053 9.74456 10.0514 10.1801 9.94247 10.289C9.83358 10.4251 9.72462 10.4251 9.53406 10.3434C9.34349 10.2346 8.71742 10.044 7.9824 9.39066C7.41071 8.90064 7.02954 8.27448 6.92065 8.08392C6.81176 7.89335 6.92065 7.78446 7.00232 7.70279C7.08399 7.62112 7.19292 7.48502 7.30181 7.37613C7.32904 7.3489 7.35626 7.32168 7.38348 7.29446C7.43793 7.21279 7.46509 7.15834 7.49231 7.07667C7.54676 6.94055 7.51959 6.83167 7.46515 6.75C7.4107 6.64111 7.02957 5.71551 6.86623 5.33438C6.70289 4.95326 6.53954 5.00772 6.43065 5.00772C6.32176 5.00772 6.18563 4.98047 6.07674 4.98047C5.94062 4.98047 5.75005 5.03491 5.55949 5.22547C5.39615 5.41603 4.87891 5.87886 4.87891 6.83167C4.87891 7.04946 4.90615 7.26722 4.98782 7.485C5.17839 8.16558 5.61396 8.71006 5.6684 8.81896C5.7773 8.95507 7.00232 10.9424 8.96239 11.7046C10.9225 12.4669 10.9225 12.2218 11.2764 12.1674C11.6303 12.1402 12.4198 11.7046 12.5831 11.269C12.7465 10.8335 12.7464 10.4523 12.692 10.3707C12.6103 10.2073 12.4742 10.1801 12.2836 10.0712Z" fill="#FF000A"/>
                                    </svg>                                    
                                </a></li>
                                <li><a href="#0">
                                    <svg width="8" height="17" viewBox="0 0 8 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.88741 16.3317H5.01807V8.51863H7.19598L7.44098 5.90519H5.04532C5.04532 5.90519 5.04532 4.92518 5.04532 4.40794C5.04532 3.78181 5.18146 3.53678 5.75315 3.53678C6.24317 3.53678 7.44098 3.53678 7.44098 3.53678V0.814453C7.44098 0.814453 5.67144 0.814453 5.29032 0.814453C2.97634 0.814453 1.91466 1.84893 1.91466 3.78178C1.91466 5.49684 1.91466 5.87798 1.91466 5.87798H0.28125V8.51863H1.91466V16.3317H1.88741Z" fill="#FF000A"/>
                                    </svg>                                    
                                </a></li>
                                <li><a href="#0">
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.99927 2.04048C11.1771 2.04048 11.4221 2.0405 12.2933 2.09494C13.0827 2.12217 13.5184 2.2583 13.7906 2.36719C14.1717 2.50331 14.4439 2.69387 14.7162 2.96611C14.9884 3.23834 15.179 3.51056 15.3151 3.89169C15.424 4.19114 15.5601 4.5995 15.5873 5.38897C15.6146 6.23289 15.6417 6.5051 15.6417 8.68296C15.6417 10.8608 15.6418 11.1058 15.5873 11.977C15.5601 12.7665 15.424 13.202 15.3151 13.4743C15.179 13.8554 14.9884 14.1276 14.7162 14.3999C14.4439 14.6721 14.1717 14.8627 13.7906 14.9988C13.4911 15.1077 13.0827 15.2438 12.2933 15.271C11.4493 15.2982 11.1771 15.3254 8.99927 15.3254C6.82141 15.3254 6.57643 15.3254 5.70528 15.271C4.91581 15.2438 4.48019 15.1077 4.20796 14.9988C3.82683 14.8627 3.55461 14.6721 3.28238 14.3999C3.01014 14.1276 2.81958 13.8554 2.68346 13.4743C2.57457 13.1748 2.43844 12.7665 2.41121 11.977C2.38399 11.1331 2.3568 10.8608 2.3568 8.68296C2.3568 6.5051 2.35677 6.26012 2.41121 5.38897C2.43844 4.5995 2.57457 4.16392 2.68346 3.89169C2.81958 3.51056 3.01014 3.23834 3.28238 2.96611C3.55461 2.69387 3.82683 2.50331 4.20796 2.36719C4.50741 2.2583 4.91581 2.12217 5.70528 2.09494C6.57643 2.06772 6.82141 2.04048 8.99927 2.04048ZM8.99927 0.597656C6.79419 0.597656 6.52193 0.597668 5.65079 0.652114C4.77964 0.679338 4.20795 0.815452 3.69071 1.03324C3.14624 1.25102 2.71068 1.52325 2.24788 1.95882C1.78509 2.42161 1.51286 2.85718 1.3223 3.40165C1.13174 3.91889 0.995665 4.5178 0.941218 5.36172C0.913995 6.23287 0.886719 6.50513 0.886719 8.71021C0.886719 10.9153 0.886772 11.1875 0.941218 12.0587C0.968442 12.9298 1.10451 13.5015 1.3223 14.0187C1.54009 14.5632 1.81231 14.9988 2.24788 15.4616C2.71068 15.9244 3.14624 16.1966 3.69071 16.3871C4.20795 16.5777 4.80686 16.7138 5.65079 16.7683C6.52193 16.7955 6.79419 16.8227 8.99927 16.8227C11.2044 16.8227 11.4766 16.8227 12.3478 16.7683C13.2189 16.741 13.7906 16.6049 14.3078 16.3871C14.8523 16.1694 15.2879 15.8971 15.7507 15.4616C16.2135 14.9988 16.4857 14.5632 16.6762 14.0187C16.8668 13.5015 17.0029 12.9026 17.0573 12.0587C17.0846 11.1875 17.1118 10.9153 17.1118 8.71021C17.1118 6.50513 17.1118 6.23287 17.0573 5.36172C17.0301 4.49058 16.8668 3.91889 16.6762 3.40165C16.4585 2.85718 16.1862 2.42161 15.7507 1.95882C15.2879 1.49602 14.8523 1.2238 14.3078 1.03324C13.7906 0.842675 13.1917 0.706561 12.3478 0.652114C11.4766 0.597668 11.2044 0.597656 8.99927 0.597656Z" fill="#FF000A"/>
                                        <path d="M8.99718 4.5459C6.68321 4.5459 4.83203 6.42434 4.83203 8.71109C4.83203 11.0251 6.71043 12.8762 8.99718 12.8762C11.3112 12.8762 13.1623 10.9978 13.1623 8.71109C13.1623 6.39712 11.3112 4.5459 8.99718 4.5459ZM8.99718 11.4062C7.49991 11.4062 6.30211 10.1811 6.30211 8.71109C6.30211 7.21381 7.52713 6.01598 8.99718 6.01598C10.4672 6.01598 11.6923 7.24104 11.6923 8.71109C11.6923 10.2084 10.4945 11.4062 8.99718 11.4062Z" fill="#FF000A"/>
                                        <path d="M14.3116 4.38238C14.3116 4.92685 13.876 5.36242 13.3316 5.36242C12.7871 5.36242 12.3516 4.92685 12.3516 4.38238C12.3516 3.83792 12.7871 3.40234 13.3316 3.40234C13.876 3.40234 14.3116 3.83792 14.3116 4.38238Z" fill="#FF000A"/>
                                    </svg>                                    
                                </a></li>
                                <li><a href="#0">
                                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.449219 11.5543C1.8376 12.4526 3.52552 12.9698 5.29503 12.9698C11.1753 12.9698 14.4965 8.01523 14.2787 3.55062C14.9048 3.11505 15.422 2.54334 15.8576 1.91721C15.2859 2.16222 14.687 2.32558 14.0337 2.40725C14.687 2.02612 15.177 1.39999 15.422 0.664963C14.8231 1.01886 14.1425 1.29109 13.4075 1.42721C12.8358 0.801075 12.0191 0.419922 11.0935 0.419922C9.05177 0.419922 7.55456 2.32557 8.01736 4.31287C5.3767 4.17675 3.06266 2.92446 1.48372 1.01884C0.667018 2.43444 1.04819 4.31286 2.46379 5.23845C1.94655 5.21122 1.45654 5.07512 1.02097 4.83011C0.993743 6.30017 2.02821 7.66132 3.55271 7.96077C3.11714 8.06966 2.62715 8.0969 2.13713 8.01523C2.54548 9.2675 3.71607 10.1931 5.10445 10.2203C3.79774 11.282 2.13706 11.7448 0.449219 11.5543Z" fill="#FF000A"/>
                                    </svg>                                    
                                </a></li>
                                <li><a href="#0">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.3896 11.6505C11.9613 11.6505 12.4513 11.5144 12.8324 11.2694C13.2135 11.0244 13.513 10.6977 13.758 10.2894C14.003 9.881 14.1663 9.41824 14.2752 8.87377C14.3841 8.32931 14.4386 7.75761 14.4386 7.1587C14.4386 6.58701 14.3568 6.01531 14.2207 5.44362C14.0846 4.84471 13.8124 4.32748 13.4313 3.83746C13.0502 3.37466 12.5057 2.96633 11.7979 2.66688C11.0901 2.36742 10.1917 2.20405 9.07557 2.20405C7.98665 2.20405 7.00659 2.36739 6.16267 2.72129C5.31875 3.0752 4.58375 3.53799 3.98484 4.16412C3.38593 4.79026 2.92314 5.55251 2.62368 6.42366C2.32422 7.2948 2.16085 8.27484 2.16085 9.36377C2.16085 10.3438 2.32422 11.1877 2.62368 11.8956C2.92314 12.6034 3.35868 13.2023 3.87593 13.6378C4.42039 14.1006 5.04656 14.4273 5.78159 14.6451C6.48939 14.8629 7.27882 14.9718 8.12274 14.9718L8.99391 14.9445C9.26614 14.9445 9.45671 15.0262 9.59282 15.1895C9.72894 15.3529 9.81057 15.5162 9.81057 15.7068C9.81057 15.8974 9.72891 16.0879 9.56557 16.224C9.40223 16.3874 9.15723 16.469 8.80333 16.469H8.20441C7.22437 16.469 6.29876 16.3329 5.37317 16.0879C4.44758 15.8157 3.6309 15.4073 2.9231 14.8629C2.21529 14.2912 1.64359 13.5834 1.20802 12.685C0.772447 11.8139 0.554688 10.725 0.554688 9.47269C0.554688 8.22042 0.745227 7.0498 1.12635 5.96087C1.50748 4.87194 2.05199 3.94635 2.78701 3.15688C3.52204 2.3674 4.42038 1.76851 5.48209 1.30572C6.54379 0.870145 7.76886 0.652344 9.15724 0.652344C10.4367 0.652344 11.4984 0.842898 12.3968 1.1968C13.268 1.5507 13.9758 2.04073 14.5202 2.61242C15.0647 3.21133 15.473 3.8919 15.6908 4.68137C15.9358 5.47084 16.0447 6.26032 16.0447 7.10424C16.0447 7.92093 15.963 8.68322 15.7725 9.39102C15.5819 10.0988 15.2824 10.7522 14.9013 11.2966C14.493 11.8411 14.003 12.2767 13.4041 12.6033C12.8051 12.93 12.0701 13.0933 11.2534 13.0933C11.0901 13.0933 10.9267 13.0934 10.7634 13.0661C10.6001 13.0389 10.4095 12.9845 10.2734 12.93C10.1101 12.8483 9.97396 12.7395 9.86507 12.5761C9.72896 12.4128 9.64727 12.195 9.59282 11.9228L9.48391 11.8956C9.40224 12.0317 9.29338 12.1678 9.18449 12.3039C9.04837 12.44 8.88497 12.5761 8.69441 12.685C8.50385 12.7939 8.28609 12.9028 8.04108 12.9845C7.79607 13.0661 7.55104 13.0933 7.25158 13.0933C6.84323 13.0933 6.46215 13.0117 6.10825 12.8756C5.75435 12.7395 5.42765 12.5217 5.15542 12.2222C4.88319 11.9228 4.66543 11.5689 4.50209 11.1061C4.33875 10.6433 4.25709 10.0988 4.25709 9.4999C4.25709 8.62875 4.39316 7.86651 4.63817 7.21315C4.91041 6.5598 5.2371 6.01531 5.67267 5.57974C6.10824 5.14417 6.57103 4.79028 7.1155 4.5725C7.65996 4.35471 8.23164 4.21858 8.80333 4.21858C9.29334 4.21858 9.75611 4.30026 10.1372 4.43637C10.5456 4.57249 10.8723 4.79026 11.1446 5.06249C11.4168 5.33473 11.6074 5.6342 11.7435 6.01532C11.8796 6.36923 11.9068 6.77758 11.8796 7.21315L11.3896 11.6505ZM7.82333 11.2694C8.01389 11.2694 8.17724 11.2422 8.34058 11.1605C8.50392 11.0788 8.66721 10.9972 8.80333 10.8611C8.96667 10.7522 9.07554 10.616 9.21166 10.5071C9.32055 10.371 9.42949 10.2894 9.51116 10.1805L9.81057 7.45815C9.86502 7.0498 9.78339 6.72314 9.59282 6.45091C9.40226 6.17867 9.07554 6.04253 8.61274 6.04253C7.98661 6.04253 7.52382 6.31479 7.16991 6.83203C6.84324 7.34927 6.6255 8.11153 6.54383 9.09156C6.48939 9.74492 6.5438 10.2893 6.76158 10.6705C6.92492 11.0788 7.30609 11.2694 7.82333 11.2694Z" fill="#FF000A"/>
                                    </svg>                                    
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="contact-right">
                    <div class="contact-page-form-wraper">
                    <form action="{{ url('contact') }}" method="post" id="requestMoreInfoForm" name="requestMoreInfoForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grid">
                                        <input type="text" name="firstname" id="firstname" placeholder="First Name" required class="required">
                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grid">
                                        <input type="text" name="lastname" id="lastname" placeholder="Last Name" required class="required">
                                    
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-grid">
                                        <input type="email" name="email" id="email" placeholder="Email" required class="required">
                                    
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-grid">
                                        <input type="tel" name="phone" id="phone" placeholder="Phone" required class="required">
                                    
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-grid">
                                        <textarea name="" id="message" placeholder="Type Your message" required class=""></textarea>
                                    
                                    </div>
                                </div>
                                <input type="hidden" name="type" value="contact">
                                <div class="col-md-12">
                                    <div class="form-grid mb-0">
                                        <input type="submit" value="Submit" class="primary_btn contact_form_btn"   data-url="/enquiry">

                                    
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


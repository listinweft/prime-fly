@extends('web.layouts.main')
@section('content')
<section class="col-12 primefly_section about_main">
          <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-7 primefly_feature_content">
                  <h2 data-aos="fade-up" data-aos-duration="600">Primefly</h2>
                  <p data-aos="fade-up" data-aos-duration="800">Primefly is an exclusive airport hospitality service provided by Speedwings. They provide services such as meet 
                    and greet, parking, cloakroom, check-in assistance, and baby/elder sitting within the airport premises. 
                    They have been operating in most parts of India for the past 25 years and have earned the trust of millions of passengers.. </p>
                </div>
                <div class="company-counter" data-aos="fade-up" data-aos-duration="1000">
                  <div class="company-counter-item">
                      <div class="company-counter-item-wraper">
                          <div class="company-counter-item-icon"><img src="{{ asset('frontend/img/trust.webp')}}" alt=""></div>
                          <div class="company-counter-item-content">
                              <h4 class="count adon" data-count="25" data-adon="+">25+</h4>
                              <span>Years of Trust</span>
                          </div>
                      </div>
                  </div>
                  <div class="company-counter-item">
                      <div class="company-counter-item-wraper">
                          <div class="company-counter-item-icon"><img src="{{ asset('frontend/img/happy-customer.webp')}}" alt=""></div>
                          <div class="company-counter-item-content">
                              <h4 class="count adon" data-count="22" data-adon="+">22+</h4>
                              <span>Lakhs Customers</span>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
          </div>
          <div class="col-lg-12 places"> 
            <img src="{{ asset('frontend/img/places.webp')}}" class="w-100 place_vector" alt="Place" />
            <img src="{{ asset('frontend/img/cloud.webp')}}" class="cloud-left" alt="cloud"/>
            <img src="{{ asset('frontend/img/cloud2.webp')}}" class="cloud-right" alt="cloud"/>
          </div>
         </section>
         <section class="col-12 about-who">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6 who_illlstrater">
                                <img src="{{ asset('frontend/img/about.png')}}" class="w-100" alt="cloud"/>
                            </div>
                            <div class="col-lg-5 who_content">
                                <h3>Who <br> We Are</h3>    
                                <h4>We Provide Quality Service with No Compromise</h4>
                                <p>Pulvinar vel egestas lectus cras scelerisque massa. Magna augue lobortis aliquet felis 
                                    nunc pellentesque aliquam amet sit. Diam diam volutpat feugiat leo magna senectus 
                                    cursus dictum. Libero morbi consectetur sed bibendum urna massa lectus placerat sed. 
                                    Ac faucibus ut hendrerit dapibus sagittis feugiat molestie. Ultricies eu purus pharetra 
                                    quam nullam consequat habitant aliquam dapibus. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
         <section class="col-12 about-why">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5 why-content">
                        <h3>Why us</h3>
                        <p>Pulvinar vel egestas lectus cras scelerisque massa. Magna augue lobortis aliquet felis nunc pellentesque 
                            aliquam amet sit. Diam diam volutpat feugiat leo magna senectus cursus dictum. Libero morbi consectetur sed bibendum urna massa lectus placerat sed. Ac faucibus ut hendrerit dapibus sagittis feugiat molestie. 
                            Ultricies eu purus pharetra quam nullam consequat habitant aliquam dapibus. </p>
                    </div>
                    <div class="col-lg-6 vision_mission_wrap">
                        <div class="row justify-content-between">
                            <div class="col-lg-5 why_mission">
                                <img src="{{ asset('frontend/img/mission.png')}}" alt="cloud"/>
                                <h4>Mission</h4>
                                <p>Lorem ipsum dolor sit amet consectetur. Nec est justo sed tempus laoreet. Scelerisque feugiat
                                    ut diam volutpat sit habitasse vitae tortor. </p>
                            </div>
                            <div class="col-lg-5 why_vision">
                                <img src="{{ asset('frontend/img/vision.png')}}" alt="cloud"/>
                                <h4>Vision</h4>
                                <p>Lorem ipsum dolor sit amet consectetur. Nec est justo sed tempus laoreet. Scelerisque feugiat
                                    ut diam volutpat sit habitasse vitae tortor. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
         <section class="our-features">
            <div class="our-features-container">
                <h2 class="section-head aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">Our Features</h2>
                <div class="features-item-wraper">
                    <div class="features-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <div class="features-item-image satisfaction"><img src="{{ asset('frontend/img/featur1.png')}}" alt="Customer Satisfaction"></div>
                        <div class="features-item-content">
                            <h4>Customer Satisfaction</h4>
                            <p>At Speedwings, customer satisfaction is paramount. We prioritize the needs and preferences of our travelers, striving to exceed their expectations at every touchpoint.&nbsp;</p>
                        </div>
                    </div>
                    <div class="features-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <div class="features-item-image quality"><img src="{{ asset('frontend/img/featur2.png')}}" alt="Quality service"></div>
                        <div class="features-item-content">
                            <h4>Quality service</h4>
                            <p>Trust forms the bedrock of our operations. We understand the importance of earning and maintaining the trust of our customers by consistently delivering on our promises.</p>
                        </div>
                    </div>
                    <div class="features-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <div class="features-item-image trust"><img src="{{ asset('frontend/img/featur3.png')}}" alt="Trust"></div>
                        <div class="features-item-content">
                            <h4>Trust</h4>
                            <p>Quality is ingrained in everything we do at Speedwings. From meet-and-greet services to baggage wrapping, we uphold the highest standards of excellence.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <table class="invoice_table" style=" width: 100%; background-color: #fff;max-width:600px;margin:auto ">
<tr>
   <td style="padding:30px">
      <table style="width:100%">
<tr>
   <table>
      <tr>
         <td>
            <h1 style="font-size:30px;color:#B2B7C2;">INVOICE</h1>
            <h4 style="color:#707070; font-size: 14px; text-transform: uppercase;">#AB2324-01</h4>
         </td>
         <td class="text-end">
            <img style="width:90px" src="{{ asset('frontend/img/logo-blue.png')}}"/>
         </td>
      </tr>
      <table>
         </tr> 
         <tr>
            <td>
               <table>
                  <tr>
                     <td style="width:33%;border:1px solid #D7DAE0;border-left:0;padding:20px;padding-left:0">
                        <h4 style="color:#1A1C21;font-size:12px;font-weight:600">Issued</h4>
                        <h5 style="color:#5E6470;font-size:12px">01 Aug, 2024</h5>
                     </td>
                     <td style="width:33%;border:1px solid #D7DAE0;border-left:0;borrder-right:0;padding:20px;">
                        <h4 style="color:#1A1C21;font-size:12px;font-weight:600">Billed to</h4>
                        <h5 style="color:#5E6470;font-size:12px;font-weight:500;">Company Name / Person</h5>
                        <p style="color:#5E6470;font-size:11px">Company address
                           City, Country - 00000 <br> +0 (000) 123-4567
                        </p>
                     </td>
                     <td style="width:33%;border:1px solid #D7DAE0;border-right:0;padding:20px;padding-right:0">
                        <h4 style="color:#1A1C21;font-size:12px;font-weight:600">From</h4>
                        <h5 style="color:#5E6470;font-size:12px;font-weight:500;">Primefly</h5>
                        <p style="color:#5E6470;font-size:11px">Business address
                           City, State, IN - 000 000 <br>TAX ID 00XXXXX1234X0XX
                        </p>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td style="padding:10px 0;border-bottom:1px solid #D7DAE0;">
               <table>
                  <tr>
                     <td style="width:50%">
                        <h2 style="color:#1A1C21;font-size:14px;font-weight:600;margin:0">Bookings</h2>
                     </td>
                     <td  style="width:50%;text-align:right">
                        <h4 style="color:#1A1C21;font-size:10px;font-weight:500;margin:0">SUBTOTAL</h4>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td style="border-bottom:1px solid #D7DAE0;">
               <table>
                  <tr>
                     <td style="color:#151525;font-size:11px;padding:10px 0px;">
                        1
                     </td>
                     <td style="padding:10px 0px;">
                        <h3 style="color:#151525;font-size:11px;">Executive Departure, Domestic</h3>
                        <h4 style="color:#707070;font-size:11px; ">24.02.2024 Mumbai</h4>
                     </td>
                     <td  style="padding:10px 0px;">
                        <h5 style="color:#707070;font-size:11px;text-align:right;padding:10px 0px;">₹ 2, 400</h5>
                     </td>
                  </tr>
                  <tr>
                     <td style="color:#151525;font-size:11px;padding:10px 0px;">
                        2
                     </td>
                     <td style="padding:10px 0px;">
                        <h3 style="color:#151525;font-size:11px; ">Porter Service</h3>
                     </td>
                     <td style="padding:10px 0px;">
                        <h5  style="color:#707070;font-size:11px;text-align:right; ">₹ 600</h5>
                     </td>
                  </tr>
                  <tr>
                     <td style="color:#151525;font-size:11px;padding:10px 0px;">
                        3
                     </td>
                     <td style="padding:10px 0px;">
                        <h3 style="color:#151525;font-size:11px; ">Parking Service</h3>
                     </td>
                     <td style="padding:10px 0px;">
                        <h5 style="color:#707070;font-size:11px;text-align:right;">₹ 450</h5>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td style="padding:15px 0;;padding-bottom:50px;">
               <table>
                  <tr>
                     <td style="padding:10px 0;border-bottom:1px solid #D7DAE0;">
                        <h4 style="color:#151525;font-size:11px;font-weight:600">Total</h4>
                     </td>
                     <td style="text-align:right;padding:10px 0;border-bottom:1px solid #D7DAE0;">
                        <h1 style="color:#7B45F6;font-size:15px;font-weight:700">₹ 3, 450.00</h1>
                        <p style="color:#707070;font-size:10px;margin-bottom:0">CGST 9% ₹ 1500</p>
                        <p style="color:#707070;font-size:10px;margin-bottom:0">SGST 9% ₹ 1500</p>
                     </td>
                  </tr>
                  <tr>
                     <td style="padding:10px 0">
                        <h4 style="color:#151525;font-size:11px;font-weight:600">Total To Pay</h4>
                     </td>
                     <td style="text-align:right;padding:10px 0">
                        <h1 style="color:#7B45F6;font-size:15px;font-weight:700">₹ 6, 450.00</h1>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
      </td>
      </tr> 
   </table>
   <table style="background-color:#FAFAFA;max-width:600px;margin:auto;width:100%">
      <tr>
         <td style="padding:30px;width:100%">
            <table style="width:100%">
               <tr>
                  <td style="width:30%">
                     <p style="color:#707070;font-size:10px;margin-bottom:0">Payment Mode</p>
                     <b style="color:#707070;font-size:11px;display:block;font-weight:500">Debit/Credit Card</b>
                  </td>
                  <td style="width:30%">
                     <p  style="color:#707070;font-size:10px;margin-bottom:0">Coupons <br></p>
                     <b style="color:#707070;font-size:11px;display:block;font-weight:500">Nill</b>
                  </td>
                  <td style="width:40%">
                     <p  style="color:#707070;font-size:10px;margin-bottom:0">Contact</p>
                     <b style="color:#707070;font-size:11px;display:block;font-weight:500">info@primefly.com +91 8301 960 000</b>
                  </td> 
               </tr>
               <tr>
                  <td>
                     <h4 style="color:#151525;font-size:14px;font-weight:700;margin-top:10px;margin-bottom:0">
                        Thank you 
                        <svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M4.83094 1.58987C5.22324 0.654065 6.11945 0.000195638 7.16184 0.000195638C8.56602 0.000195638 9.57731 1.20913 9.70445 2.64991C9.70445 2.64991 9.77307 3.00757 9.62202 3.65146C9.41634 4.52837 8.93286 5.30746 8.28102 5.90204L4.83094 9L1.43898 5.90185C0.787142 5.30746 0.303659 4.52817 0.09798 3.65126C-0.0530718 3.00737 0.0155527 2.64972 0.0155527 2.64972C0.142693 1.20893 1.15398 0 2.55816 0C3.60075 0 4.43863 0.654065 4.83094 1.58987Z" fill="#7B45F6"/>
                        </svg>
                     </h4>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
   </table>      
        @endsection
@push('scripts')

@endpush
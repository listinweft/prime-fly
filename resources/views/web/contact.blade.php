@extends('web.layouts.main')
@section('content')

<!-- @include('web.includes.banner',[$banner, 'title'=> 'Contact Us','type'=> 'Contact Us']) -->


  <section class="col-12 locationbanner p-0">
           <div class="d-flex justify-content-end">
              <div class="locinner_bannerimg">
                <img src="{{ asset('frontend/img/contact.png')}}" class="w-100" alt="Meet and Greet" />
                <div class="loc-text text-start">
                    <div class="container">
                        <h1>CONTACT US</h1>
                    </div> 
                </div>
              </div>
           </div> 
         </section>
        
         <section class="col-12 contact-section">
             <div class="col-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="col-lg-6 contact-left">
                        <h2>We are Here for <br> Your Help </h2>
                        <div class="d-flex flex-wrap">
                            <div class="col-lg-4 address-grid">
                                <div class="d-flex align-items-start">
                                    <img src="{{ asset('frontend/img/map-pin.png')}}">
                                    <p>Lorem ipsum dolor sit 
                                        amet consectetur
                                        velit odio
                                        </p>
                                </div>
                            </div>
                            <div class="col-lg-4 address-grid">
                                <div class="d-flex align-items-start">
                                    <img src="{{ asset('frontend/img/call.png')}}">
                                    <p>+7 (411) 390-51-11
                                        </p>
                                </div>
                            </div>
                            <div class="col-lg-4 address-grid">
                                <div class="d-flex align-items-start">
                                    <img src="{{ asset('frontend/img/mail.png')}}    ">
                                    <p>info@primefly.com
                                        </p>
                                </div>
                            </div>
                        </div>
                        <ul class="d-flex contact-links p-0">
                            <li>
                                <a href="{{ url('support') }}" class="btn-style-2">
                                    <div class="btn-in"> 
                                        Help & Support
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn-style-2">
                                    <div class="btn-in"> 
                                        FAQ’S
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 contact-form">
                       <div class="row flex-wrap">
                            <div class="col-lg-6 form-grid">
                                <input type="text" placeholder="First name"/>
                            </div>
                            <div class="col-lg-6 form-grid">
                                <input type="text" placeholder="Last name"/>
                            </div>
                            <div class="col-lg-6 form-grid">
                                <input type="tel" placeholder="Mobile No."/>
                            </div>
                            <div class="col-lg-6 form-grid">
                                <input type="email" placeholder="Email ID"/>
                            </div>
                            <div class="col-lg-6 form-grid">
                                 <select>
                                    <option>Select Airport</option>
                                    <option>Airport 1</option>
                                    <option>Airport 2</option>
                                    <option>Airport 3</option>
                                 </select>
                            </div>
                            <div class="col-lg-6 form-grid">
                                <input type="email" placeholder="Flight Number"/>
                            </div>
                            <div class="col-lg-6 form-grid">
                                <input type="email" placeholder="Flight Date"/>
                            </div>
                            <div class="col-lg-6 form-grid">
                                <select>
                                   <option>How Can We Help You?</option>
                                   <option>Airport 1</option>
                                   <option>Airport 2</option>
                                   <option>Airport 3</option>
                                </select>
                           </div>
                           <div class="col-lg-12 form-grid">
                             <textarea placeholder="Description"></textarea>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <input type="submit" class="btn btn-primary" value="Book Now"/> 
                             </div>
                       </div>     
                    </div>
                </div>
             </div>
         </section>  
@endsection


@extends('web.layouts.main')

@section('content')

<main> 
    <div class="col-12 register-wrap">
        <section class="col-12 BtoB_back">
            <a href="#"> 
                <svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="..." fill="#969696" stroke="#969696" stroke-width="0.476123"/>
                </svg>
                Back
            </a>   
        </section>

        <section class="col-12 otp_wrap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 otp_toursit text-center">
                        <img src="{{ asset('img/wanderlust.png') }}" alt="tourist"/>
                    </div>

                    <div class="col-lg-3 otp_grid text-center">
                        <h4>OTP Verification</h4>
                        <p>Enter the verification code we just sent to your number +233 *******53.</p>

                        {{-- Laravel Flash/Error Messages --}}
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Laravel OTP Form --}}
                       <form action="#0" id="login"> 
                            @csrf
                            <div class="otp-inputs d-flex justify-content-center gap-2 mt-4">
                            @for ($i = 0; $i < 6; $i++)
    <input type="text" name="otp[{{ $i }}]" maxlength="1" class="otp-input text-center" required style="width: 40px; height: 40px;" />
    

@endfor




</div>


                            <div class="text-center mt-3">
                                 <input type="submit" value="Login"  class="otp_submit_btn" data-url="/confirm-otp">
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <p>Didn’t receive code? <a href="">Resend</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    </div>
</main>

@endsection

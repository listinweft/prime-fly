@extends('web.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('OTP Verification') }}</div>

                <div class="card-body">
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

                    <form action="#0" id="login"> 
                        @csrf
                        <div class="form-group">
                            <label for="otp">{{ __('Enter OTP') }}</label>
                            <input type="text" id="otp" name="otp" class="form-control required" required placeholder="6-digit OTP">
                        </div>

                        <input type="submit" value="Login"  class="otp_submit_btn" data-url="/confirm-otp">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

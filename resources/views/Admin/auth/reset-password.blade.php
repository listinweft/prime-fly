<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Reset Password</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('backend/dist/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/sweetalert-overrides.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/dist/css/login.css?v=1.0')}}">
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
    </script>
</head>
<body class="hold-transition login-page">
<div class="login-reg-panel">
    <div class="register-info-box">
        <div>
            {!! Helper::printImage($siteInformation, 'logo','logo_webp','logo_attribute','animation__shake') !!}
        </div>
        <h2>Reset Your Password</h2>
        {{--<p>Lorem ipsum dolor sit amet</p>--}}
    </div>
    <div class="white-panel">
        <div class="login-show">
            <h2>Reset Password</h2>
            @if(@$status == 'invalid')
                <div class="alert alert-danger">
                    <li>{{ $message }}</li>
                </div>
            @elseif(@$link_expired=='true')
                <div class="alert alert-danger">
                    <li>Link Expired</li>
                </div>
            @else
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="" id="reset-password-form">
                    @csrf
                    <input type="password" name="password" class="@error('password') is-invalid @enderror required"
                           id="password" placeholder="Password" minlength="8" maxlength="30">
                    <div class="help-block with-errors" id="password_error"></div>
                    <input type="password" name="password_confirmation"
                           class="@error('password_confirmation') is-invalid @enderror required"
                           id="password_confirmation" placeholder="Confirm Password" min="8" maxlength="30">
                    <div class="help-block with-errors" id="password_confirmation_error"></div>
                    <input type="hidden" name="token" id="token" value="{{$token}}">
                    <input type="submit" value="Reset Password" id="password_reset">
                    <span class="error_message"></span>
                </form>
            @endif
        </div>
    </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('backend/dist/js/sweetalert.min.js')}}"></script>
<script src="{{asset('backend/dist/js/sweetalert-init.js')}}"></script>
<script src="{{asset('backend/dist/js/custom.js')}}"></script>
<style>
    .error {
        color: red;
    }
</style>
</body>
</html>

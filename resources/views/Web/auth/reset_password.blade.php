@extends('Web.layouts.main')
@section('content')

    <div class="breadcrumbsBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Choose a new password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!--faq section -->
    <section class="reset_password_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="reset_password_wrapper">
                        <h5>Reset Password</h5>
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
                            <form  method="POST" action="" id="resetPasswordForm">
                                <div class="form-group">
                                    <input type="password" id="password" name="password" minlength="8" maxlength="30" class="form-control  @error('password') is-invalid @enderror required" placeholder="New password*">
                                    <div class="help-block with-errors" id="password_error"></div>

                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" minlength="8" maxlength="30" class="form-control @error('password_confirmation') is-invalid @enderror required" placeholder="Confirm password*">
                                    <div class="help-block with-errors" id="password_confirmation_error"></div>

                                </div>
                                <div class="form-group">
                                    <button class="btn primary_btn form_submit_btn" data-url="/reset-password/{{ $token }}">Change password</button>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--faq section -->

@endsection

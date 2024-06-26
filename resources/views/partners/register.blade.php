@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">


<div class="container loginRegister partnerSection">

    <div class="partnerSectionHead">
        <div class="wrapper">
            <section>
                <h4>Partner With Us!</h4>
                <p>PharmConect builds solutions at the intersection of innovation and flexibility. Partner with our
                    global team.</p>
            </section>
        </div>
    </div>
    <div class="wrapper">
        <div class="partnerSectionHub">

            <div class="row justify-content-center partnerLeftCollumn">
                <div class="col-md-8">
                    <div class="card">
                        <!-- <div class="card-header headerBG-register">{{ __('Partner With Us!') }}</div> -->

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                <div class="flexSet">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            <span id="name-error" class="invalid-feedback" role="alert"></span>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="last-name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="last-name" type="text" class="form-control" name="last_name"
                                                value="{{ old('lats_name') }}" autocomplete="last-name" autofocus>
                                        </div>
                                    </div>
                                    <div class="row mb-3 width100Set">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Email') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            <span id="email-error" class="invalid-feedback" role="alert"></span>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">
                                            <span id="password-error" class="invalid-feedback" role="alert"></span>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                            <span id="password-confirm-error" class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input type="text" id="phone" class="form-control " name="phone"
                                                value="{{ old('phone') }}" pattern="[789][0-9]{9}" required>
                                            <span id="phone-error" class="invalid-feedback" role="alert"></span>
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company-name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="company-name" type="text"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                name="company_name" value="{{ old('company_name') }}" required
                                                autocomplete="company-name" autofocus>
                                            <span id="company-name-error" class="invalid-feedback" role="alert"></span>
                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Alternate Contact Name') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input type="text" id="alternate_contact_name" class="form-control "
                                                name="alternate_contact_name"
                                                value="{{ old('alternate_contact_name') }}" required>
                                            <span id="alternate-contact-error" class="invalid-feedback" role="alert"></span>
                                            @error('alternate_contact_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Alternate Phone Number') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input type="text" id="alternate_phone_number" class="form-control "
                                                name="alternate_phone_number"
                                                value="{{ old('alternate_phone_number') }}" pattern="[789][0-9]{9}"
                                                required>
                                            <span id="alternate-phone-error" class="invalid-feedback" role="alert"></span>
                                            @error('alternate_phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="type" id="cat_idd" value="2">
                                    <div class="row mb-0  width100Set">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" id="btn-sb" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="partnerRightCollumn">
                <h5>PharmConnect has the bespoke solutions to your business’s complex challenges.</h5>
                <p>We partner with pharmaceutical, biotechnology, and medical device clients to inspire the future of
                    science to deliver the technologies, medicines, and therapies to improve patient health and safety.

                    Contact us to learn how our experienced team can help ensure regulatory and development success
                    throughout the product lifecycle.</p>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on('focusout', '#email', function() {
        var email = $(this).val();
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(email)) {
            $('#email-error').text('Please enter a valid email address');
        }
    });

    $(document).on('focusout', '#password', function() {
        var password = $(this).val();
        if (password.length < 8) {
            $('#password-error').text('Password length must be greater than 8');
        }
    });

    $(document).on('focusout', '#password-confirm', function() {
        var password = $(this).val();
        var password_confirm = $('#password').val();
        if (password != password_confirm) {
            $('#password-confirm-error').text('Confirmed password does not match');
        }
    });

    $(document).on('focusout', '#phone', function() {
        var phoneNumber = $(this).val();
        var regex = /^\d{10}$/;
        if (!regex.test(phoneNumber)) {
            $('#phone-error').text('Enter a valid phone number');
        }
    });
    var errorAppended = false;
    $('#phone').keypress(function(event) {

        var charCode = (event.which) ? event.which : event.keyCode;
        if (charCode >= 48 && charCode <= 57 || charCode === 8 || charCode === 46) {

        } else {
            $('#phone-error').text('Numbers allowed only');
            errorAppended = false;
        }
    });
});
$(document).on('click', '#btn-sb', function() {
    if ($('#name').val() == '' ) {
        $('#name-error').text('Please enter a valid name');
        return false;
    }
    if ($('#email').val() == '') {
        $('#email-error').text('Please enter a valid email address');
        return false;
    }
    if ($('#password').val() == '') {
        $('#password-error').text('Please enter a valid password');
        return false;
    }
    if ($('#compnay-name').val() == '') {
        $('#company-name-error').text('Please enter company name');
        return false;
    }
})
</script>

@endsection
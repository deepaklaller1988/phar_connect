@extends('layouts.app')

@section('content')
<div class="container loginRegister">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header headerBG-register">{{ __('Partner With Us!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        <div class="flexSet">
                            @csrf
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contact Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Company Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
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
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input  type="text" id="phone" class="form-control " name="phone"
                                        value="{{ old('phone') }}" pattern="[789][0-9]{9}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="company_website"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Company Website') }}</label>

                                <div class="col-md-6">
                                    <input id="company_website" type="text"
                                        class="form-control @error('company_website') is-invalid @enderror"
                                        name="company_website" value="{{ old('company_website') }}" required
                                        autocomplete="company_website" id="company_website" autofocus>

                                    @error('company_website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 width100Set">
                                <label for="location" class="col-md-4 col-form-label text-md-end">Location (If
                                    Applicable)</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control" name="location"
                                        value="{{ old('location') }}" autocomplete="location" autofocus>

                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="type" value="2">
                        <div class="row mb-3 width100Set">
                            <label for="company_profile"
                                class="col-md-4 col-form-label text-md-end">{{ __('Company Profile') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="company_profile" maxlength="300"
                                    placeholder="add company description around 300 word" id="company_profile">{{ old('company_profile') }}</textarea>
                                @error('company_profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0  width100Set">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script>
if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // Make a request to reverse geocoding service
        $.getJSON('https://nominatim.openstreetmap.org/reverse', {
            lat: latitude,
            lon: longitude,
            format: 'json',
            zoom: 10
        }).done(function(data) {
            var city = data.address.city;
            if (!city) {
                city = data.address.town || data.address.village || data.address.hamlet || data.address
                    .suburb || data.address.state;
            }
            $('#location').val(city)
        }).fail(function() {
            alert("Failed to retrieve city information.");
        });
    });
} else {
    alert("Geolocation is not supported by your browser");
}

$(document).ready(function() {
    $(document).on('focusout', '#email', function() {
        var email = $(this).val();
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(email)) {
            $('#email').after(
                '<span class="invalid-feedback" role="alert"><strong>Please enter a valid email address</strong></span>'
                );
        }
        setTimeout(function() {
            $('.invalid-feedback').remove();
        }, 2000);
    });

    $(document).on('focusout', '#password', function() {
        var password = $(this).val();
        if (password.length < 8) {
            $('#password').after(
                '<span class="invalid-feedback" role="alert"><strong>Password length must be greater than 8 </strong></span>'
            );
        }
        setTimeout(function() {
            $('.invalid-feedback').remove();
        }, 2000);
    });

    $(document).on('focusout', '#password-confirm', function() {
        var password = $(this).val();
        var password_confirm = $('#password').val();
        if (password != password_confirm) {
            $('#password-confirm').after(
                '<span class="invalid-feedback" role="alert"><strong>Confirmed password does not match </strong></span>'
            );
        }
        setTimeout(function() {
            $('.invalid-feedback').remove();
        }, 2000);
    });

    $(document).on('focusout', '#phone', function() {
        var phoneNumber = $(this).val();
        var regex = /^\d{10}$/; 
        if (!regex.test(phoneNumber)) {
            $('#phone').after(
                '<span class="invalid-feedback" role="alert"><strong>Enter a valid phone number </strong></span>'
            );
        }
        setTimeout(function() {
            $('.invalid-feedback').remove();
        }, 2000);
    });
    var errorAppended = false;
    $('#phone').keypress(function(event) {

        var charCode = (event.which) ? event.which : event.keyCode;
        if (charCode >= 48 && charCode <= 57 || charCode === 8 || charCode === 46) {

        } else {
            $('#phone').after(
                '<span class="invalid-feedback" role="alert"><strong>Numbers allowed only</strong></span>'
            );
            errorAppended = false;
        }

        setTimeout(function() {
            $('.invalid-feedback').remove();
        }, 1000);
    });
});
</script>
@endsection
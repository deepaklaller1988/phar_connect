@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">


<div class="container loginRegister">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header headerBG-register">{{ __('Partner With Us!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        <div class="flexSet">
                            @csrf
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <div class="page-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5></h5>
                                                </div>
                                                <div class="card-block">
                                                    <div class="row">
                                                        <div class="col-lg-12 mb-3">
                                                            <div class="common_input mb_15 d-flex align-items-center">
                                                                <label class="text-nowrap mr-1">Select Category :
                                                                </label>
                                                                <select id="select_main_cayegory"
                                                                    class="form-control selectFixCZ" name="category_ids[]">
                                                                    <option value="">Select Category : </option>
                                                                    @foreach($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="custom-form"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 default-form">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contact Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus disabled>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 default-form">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('company_name') is-invalid @enderror"
                                        name="company_name" value="{{ old('company_name') }}" required
                                        autocomplete="name" autofocus disabled>

                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 default-form">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Company Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" disabled>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 default-form">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" disabled>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 default-form">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" disabled>
                                </div>
                            </div>
                            <div class="row mb-3 default-form">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input type="text" id="phone" class="form-control " name="phone"
                                        value="{{ old('phone') }}" pattern="[789][0-9]{9}" disabled>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 default-form">
                                <label for="company_website"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Company Website') }}</label>

                                <div class="col-md-6">
                                    <input id="company_website" type="text"
                                        class="form-control @error('company_website') is-invalid @enderror"
                                        name="company_website" value="{{ old('company_website') }}" required
                                        autocomplete="company_website" id="company_website" autofocus disabled>

                                    @error('company_website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 default-form">
                                <label for="company_website"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                                <div class="common_input mb_15">
                                    <div class="col-md-6">
                                        <select class="form-select js-example-placeholder-multiple col-sm-12"
                                            id="multiselect" name="country_id[]" disabled>
                                            @foreach ($countries as $country)
                                            <option value="">Select Country</option>
                                            <option value="{{$country->id}}">{{$country->country_name}}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 default-form">
                                <label for="company_website"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control selectFixCZ" id="select_main_categorytest"
                                        name="category_ids[]" disabled>
                                        <option value="">Select Category : </option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 default-form" id="subcategory_div" style="display: none;">
                                <label for="sub_category"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Sub Category') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control selectFixCZ" id="select_sub_category"
                                        name="category_ids[]" disabled>
                                        <option value="">Select Subcategory : </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="2">
                        <div class="row mb-3 width100Set default-form">
                            <label for="company_profile"
                                class="col-md-4 col-form-label text-md-end">{{ __('Company Profile') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="company_profile" disabled maxlength="300"
                                    placeholder="add company description around 300 word"
                                    id="company_profile">{{ old('company_profile') }}</textarea>
                                @error('company_profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0  width100Set default-form">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" disabled class="btn btn-primary">
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

<script type="text/javascript" src="{{ asset('assets/admin/pages/advance-elements/select2-custom.js') }}"></script>
<!-- <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script> -->

<script>
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

<script>
$(document).ready(function() {
    $('#select_main_cayegory').change(function() {
        var category_id = $(this).val();
        if (category_id !== '') {
            $.ajax({
                url: "{{ route('partner.register.addblade') }}",
                method: 'POST',
                data: {
                    category_id: category_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.html) {
                        $('#custom-form').html(data.html);
                        $('.default-form').hide();
                    } else {
                        $('#subcategory_div').hide();
                    }
                }
            });
        } else {
            $('#subcategory_div').hide();
        }
    });
});
</script>
@endsection
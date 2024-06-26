@extends('partners.layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">
<style>
    label.error {
        color: red !important;
    }
</style>
<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Profile</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('partner.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class=""><a href="#!">Profile</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                @if(session('success'))
                <div class="card" id="successMessage">
                    <div class="card-header">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
                @endif
                @if(session('error'))
                <div class="card" id="successMessage">
                    <div class="card-header">
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5>Update Profile Information</h5>
                    </div>

                    <div class="card-block">
                        <form id="myForm" action="{{ route('partner.update',auth()->user()->id ) }}" method="post"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="white_card_body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Company Picture:</label>
                                            <div class="pictureAdmin"><span><input id="logo-input" type="file"
                                                        name="logo"><b>+</b></span><img
                                                    src="{{ auth()->user()->logo ? asset('storage/' .auth()->user()->logo) : asset('assets/images/consultBanner.jpg')}} "
                                                    alt="profile banner" id="logo" /></div>
                                            @if($errors->has('logo'))
                                            <div class="error">{{ $errors->first('logo') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Company Banner:</label>
                                            <div class="bannerAdmin"><span><input id="banner-input" type="file"
                                                        name="banner"><b>Upload
                                                        Banner</b>
                                                    @if($errors->has('banner'))
                                                    <div class="error">{{ $errors->first('banner') }}</div>
                                                    @endif
                                                    <p>Prefferable Size 1186px x 120px</p>
                                                </span><img
                                                    src="{{ auth()->user()->banner ? asset('storage/' .auth()->user()->banner) : asset('assets/images/consultBanner.jpg')}}"
                                                    alt="profile banner" id="banner" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ auth()->user()->name }}" required>
                                            @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Company Name:</label>
                                            <input type="text" class="form-control" name="company_name"
                                                value="{{ auth()->user()->company_name }}" required>
                                            @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('company_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Email:</label>
                                            <input disabled type="text" class="form-control" name="email"
                                                value="{{ auth()->user()->email }}" placeholder="Email Address">

                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label>Phone Number : </label>
                                        <div class="common_input mb_15">
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ auth()->user()->phone }}" required id="phone" pattern="[987][0-9]{9}"
                                                placeholder="Mobile No">
                                            @if($errors->has('phone'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Password:</label>
                                            <input disabled type="password" class="form-control" name="password"
                                                value="{{ auth()->user()->password }}" placeholder="Password">

                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Alternate Contact Name</label>
                                            <input type="text" name="alternate_contact_name" class="form-control"
                                                value="{{ auth()->user()->alternate_contact_name }}" required placeholder="Alternate Contact name">
                                            @if($errors->has('alternate_contact_name'))
                                            <div class="error">{{ $errors->first('alternate_contact_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Alternate Contact Number</label>
                                            <input type="text" name="alternate_phone_number" required class="form-control"
                                                value="{{ auth()->user()->alternate_phone_number }}" placeholder="Alternate Contact Number">
                                            @if($errors->has('alternate_phone_number'))
                                            <div class="error">{{ $errors->first('alternate_phone_number') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Company Profile</label>
                                            <textarea id="summernote" required class="form-control"
                                                name="">{{ auth()->user()->company_profile }}</textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" id="company_profile" name="company_profile"
                                        value="{{ auth()->user()->company_profile }}">
                                    <div class="col-12 mb-3">
                                        <div class="create_report_btn mt_30">
                                            <button type="submit" class="btn_1 radius_btn d-block text-center btnsCZ">
                                                {{ __('Update Profile') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script
    src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCRYmAROkEbregKex58kHyj64JnpSXRDWg">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/select2/js/select2.full.min.js') }}">
</script>

<script type="text/javascript"
    src="{{ asset('assets/admin/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }} ">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/multiselect/js/jquery.multi-select.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/pages/advance-elements/select2-custom.js') }}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $('#summernote').summernote();
});
// if ("geolocation" in navigator) {
//     navigator.geolocation.getCurrentPosition(function(position) {
//         var latitude = position.coords.latitude;
//         var longitude = position.coords.longitude;

//         // Make a request to reverse geocoding service
//         $.getJSON('https://nominatim.openstreetmap.org/reverse', {
//             lat: latitude,
//             lon: longitude,
//             format: 'json',
//             zoom: 10
//         }).done(function(data) {
//             var city = data.address.city;
//             if (!city) {
//                 city = data.address.town || data.address.village || data.address.hamlet ||
//                     data.address
//                     .suburb || data.address.state;
//             }
//             $('#location').val(city)
//         }).fail(function() {
//             alert("Failed to retrieve city information.");
//         });
//     });
// } else {
//     alert("Geolocation is not supported by your browser");
// }

$(document).on('focusout', '.note-editable', function() {
    $('#company_profile').val($(this).html());
});

$('#logo-input').change(function() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#logo').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
});

$('#banner-input').change(function() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#banner').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
});

$(document).on('keypress', '#phone', function(key) {
    if (key.charCode < 48 || key.charCode > 57) return false;
});

$(document).ready(function() {
    $("#myForm").validate({
        rules: {
            name: {
                required: true,
            },
            phone: {
                required: true,
            },
            company_name: {
                required: true,
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>
@endsection
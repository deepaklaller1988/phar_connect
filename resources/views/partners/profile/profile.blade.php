@extends('partners.layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">Profile</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('partner.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Update Profile Information </h3>
                            </div>
                        </div>
                    </div>
                    @if(session('success'))
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <form action="{{ route('partner.update',auth()->user()->id ) }}" method="post"
                        enctype='multipart/form-data'>
                        @csrf
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="common_input mb_15">
                                        <label>Company Picture:</label>
                                        <div class="pictureAdmin"><span><input type="file"
                                                    name="logo"><b>+</b></span><img
                                                src="{{ auth()->user()->logo ? asset('storage/' .auth()->user()->logo) : asset('assets/images/consultBanner.jpg')}} "
                                                alt="profile banner" /></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="common_input mb_15">
                                        <label>Company Banner:</label>
                                        <div class="bannerAdmin"><span><input type="file" name="banner"><b>Upload
                                                    Banner</b>
                                                <p>Prefferable Size 1186px x 120px</p>
                                            </span><img
                                                src="{{ auth()->user()->banner ? asset('storage/' .auth()->user()->banner) : asset('assets/images/consultBanner.jpg')}}"
                                                alt="profile banner" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Name:</label>
                                        <input type="text" name="name" value="{{ auth()->user()->name }}" required>
                                        {{$errors->first('name')}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Email:</label>
                                        <input disabled type="text" name="email" value="{{ auth()->user()->email }}"
                                            placeholder="Email Address">
                                        {{$errors->first('email')}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Phone Number : </label>
                                    <div class="common_input mb_15">
                                        <input type="text" name="phone" value="{{ auth()->user()->phone }}"
                                            placeholder="Mobile No">
                                        {{$errors->first('phone')}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Password:</label>
                                        <input disabled type="password" name="password"
                                            value="{{ auth()->user()->password }}" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Company Website</label>
                                        <input type="text" name="company_website"
                                            value="{{ auth()->user()->company_website }}" placeholder="Email">
                                        {{$errors->first('company_website')}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Location</label>
                                        <input type="text" id="location" name="location"
                                            value="{{ auth()->user()->location }}" placeholder="Location">
                                        {{$errors->first('location')}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Key Services:</label>
                                        <textarea name="key_services"
                                            class="form-control">{{ auth()->user()->key_services }}</textarea>
                                        <small>Preference:- Drugs, Anabolics, Menabolics.</small>
                                        {{$errors->first('key_services')}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Certifications : </label>
                                        <textarea name="certifications"
                                            class="form-control">{{ auth()->user()->certifications }}</textarea>
                                        <small>Preference:- ASMO, Robotics.</small>
                                        {{$errors->first('certifications')}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="common_input mb_15">
                                        <label>Company Profile</label>
                                        <textarea id="summernote" name="">{{ auth()->user()->company_profile }}</textarea>
                                    </div>
                                </div>
                                <input type="hidden" id="company_profile" name="company_profile" value="{{ auth()->user()->company_profile }}">
                                <div class="col-12">
                                    <div class="create_report_btn mt_30">
                                        <button type="submit" class="btn_1 radius_btn d-block text-center">
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

<script>

$(document).ready(function() {
  $('#summernote').summernote();
});
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

$(document).on('focusout','.note-editable',function(){
    $('#company_profile').val($(this).html());
});
</script>
@endsection
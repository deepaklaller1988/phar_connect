@extends('partners.layouts.master')

@section('content')
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
                    <div class="white_card_body">
                        <div class="row">
                            <div class="col-12">
                                <div class="common_input mb_15">
                                    <label>Company Picture:</label>
                                    <div class="pictureAdmin"><span><input type="file"><b>+</b></span><img src="../assets/images/consultBanner.jpg" alt="profile banner"/></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="common_input mb_15">
                                    <label>Company Banner:</label>
                                    <div class="bannerAdmin"><span><input type="file"><b>Upload Banner</b><p>Prefferable Size 1186px x 120px</p></span><img src="../assets/images/consultBanner.jpg" alt="profile banner"/></div>
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
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="common_input mb_15">
                                    <label>Email:</label>
                                    <input disabled type="text" name="email" value="{{ auth()->user()->email }}" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Phone Number : </label>
                                <div class="common_input mb_15">
                                    <input type="text" name="phone" value="{{ auth()->user()->phone }}" placeholder="Mobile No">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="common_input mb_15">
                                    <label>Password:</label>
                                    <input disabled type="password" name="password" value="{{ auth()->user()->password }}" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="common_input mb_15">
                                    <label>Company Website</label>
                                    <input type="text" name="company_website" value="{{ auth()->user()->company_website }}" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="common_input mb_15">
                                    <label>Location</label>
                                    <input type="text" name="location" value="{{ auth()->user()->location }}" placeholder="Location">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="common_input mb_15">
                                    <label>Key Services:</label>
                                    <textarea name="company_profile" class="form-control">{{ auth()->user()->key_services }}</textarea>
                                    <small>Preference:- Drugs, Anabolics, Menabolics.</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="common_input mb_15">
                                    <label>Certifications : </label>
                                    <textarea name="company_profile" class="form-control">{{ auth()->user()->certifications }}</textarea>
                                    <small>Preference:- ASMO, Robotics.</small>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="common_input mb_15">
                                    <label>Company Profile</label>
                                    <textarea name="company_profile" class="form-control">{{ auth()->user()->company_profile }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="create_report_btn mt_30">
                                    <a href="#" class="btn_1 radius_btn d-block text-center">Update Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
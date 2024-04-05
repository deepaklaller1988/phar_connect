@extends('partners.layouts.master')

@section('content')
<div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                            <div class="page_title_left d-flex align-items-center">
                                <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                                <ol class="breadcrumb page_bradcam mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">Analytic</li>
                                </ol>
                            </div>
                            <div class="page_title_right">
                                <div class="page_date_button d-flex align-items-center">
                                    <img src="img/icon/calender_icon.svg" alt>
                                    August 1, 2020 - August 31, 2020
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-xl-8 ">
                        <div class="white_card mb_30 card_height_100">
                            <div class="white_card_header">
                                <div class="row align-items-center justify-content-between flex-wrap">
                                    <div class="col-lg-4">
                                        <div class="main-title">
                                            <h3 class="m-0">Analytics</h3>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-4 text-end d-flex justify-content-end">
                                        <select class="nice_Select2 max-width-220">
                                            <option value="1">Show by month</option>
                                            <option value="1">Show by year</option>
                                            <option value="1">Show by day</option>
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div id="management_bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 ">
                        <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single_crm">
                                        <div class="crm_head d-flex align-items-center justify-content-between">
                                            <div class="thumb">
                                                <img src="{{asset('assets/partner/img/crm/businessman.svg') }}" alt>
                                            </div>
                                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                        </div>
                                        <div class="crm_body">
                                            <h4>2455</h4>
                                            <p>User Registrations</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_crm ">
                                        <div
                                            class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                            <div class="thumb">
                                                <img src="{{asset('assets/partner/img/crm/customer.svg') }}" alt>
                                            </div>
                                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                        </div>
                                        <div class="crm_body">
                                            <h4>2455</h4>
                                            <p>User Registrations</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_crm">
                                        <div
                                            class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                                            <div class="thumb">
                                                <img src="{{asset('assets/partner/img/crm/infographic.svg') }}" alt>
                                            </div>
                                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                        </div>
                                        <div class="crm_body">
                                            <h4>2455</h4>
                                            <p>User Registrations</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_crm">
                                        <div
                                            class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                            <div class="thumb">
                                                <img src="{{asset('assets/partner/img/crm/sqr.svg') }}" alt>
                                            </div>
                                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                        </div>
                                        <div class="crm_body">
                                            <h4>2455</h4>
                                            <p>User Registrations</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="crm_reports_bnner">
                                <div class="row justify-content-end ">
                                    <div class="col-lg-6">
                                        <h4>Create CRM Reports</h4>
                                        <p>Outlines keep you and honest
                                            indulging honest.</p>
                                        <a href="#">Read More <i class="fas fa-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="row align-items-center">
                                    <div class="col-lg-4">
                                        <div class="main-title">
                                            <h3 class="m-0">Posts</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body ">
                                <div class="row min_height_oveflow">
                                    <div class="col-lg-4 mb_30">
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Admin
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb_30">
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Admin
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb_30">
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Admin
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
                                        </div>
                                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                                            <div class="user_pils_thumb d-flex align-items-center">
                                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                        src="img/customers/1.png" alt></div>
                                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                            </div>
                                            <div class="user_info">
                                                Customer
                                            </div>
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                            </div>
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
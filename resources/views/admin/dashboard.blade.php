@extends('admin.layouts.master')

@section('content')

<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="row">
                            <div class="col-12">
                                <div class="quick_activity_wrap">
                                    <div class="single_quick_activity d-flex">
                                        <div class="icon">
                                            <img src="img/icon/man.svg" alt>
                                        </div>
                                        <div class="count_content">
                                            <h3><span class="counter">520</span> </h3>
                                            <p>Partners</p>
                                        </div>
                                    </div>
                                    <div class="single_quick_activity d-flex">
                                        <div class="icon">
                                            <img src="img/icon/cap.svg" alt>
                                        </div>
                                        <div class="count_content">
                                            <h3><span class="counter">696</span> </h3>
                                            <p>Users</p>
                                        </div>
                                    </div>
                                    <div class="single_quick_activity d-flex">
                                        <div class="icon">
                                            <img src="img/icon/wheel.svg" alt>
                                        </div>
                                        <div class="count_content">
                                            <h3><span class="counter">351</span> </h3>
                                            <p>Active Users</p>
                                        </div>
                                    </div>
                                    <div class="single_quick_activity d-flex">
                                        <div class="icon">
                                            <img src="img/icon/pharma.svg" alt>
                                        </div>
                                        <div class="count_content">
                                            <h3><span class="counter">211</span> </h3>
                                            <p>expired Users</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-12">
                <div class="white_box mb_30 ">
                    <div class="box_header border_bottom_1px  ">
                        <div class="main-title">
                            <h3 class="mb_25">Revenue Summary</h3>
                        </div>
                    </div>
                    <div class="income_servay">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="count_content">
                                    <h3>$ <span class="counter">305</span> </h3>
                                    <p>Today's Income</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count_content">
                                    <h3>$ <span class="counter">1005</span> </h3>
                                    <p>This Week's Income</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count_content">
                                    <h3>$ <span class="counter">5505</span> </h3>
                                    <p>This Month's Income</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count_content">
                                    <h3>$ <span class="counter">155615</span> </h3>
                                    <p>This Year's Income</p>
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
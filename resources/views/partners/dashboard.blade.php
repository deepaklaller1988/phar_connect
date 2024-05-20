@extends('partners.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Partner Dashboard</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="feather icon-home"></i></a>
                        </li>
                        <li class=""><a href="#!">Dashboard</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <di v class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    @if(auth()->user()->status == 1)
                    <div class="row">

                        <div class="col-xl-6 col-md-6">
                            <div class="card prod-p-card card-theme-dark">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Posts</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $posts }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-bill-alt f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Active Posts</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $active }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-database  f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card prod-p-card card-theme-dark-minus">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Archive Posts</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $archive }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card prod-p-card card-theme-dark-tint">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Users</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $count }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tags  f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">

                        <div class="col-xl-12 col-md-12">
                            <div class="card">
                                <div class="card-body waitingAprroval">
                                    <p>
                                        <b>Waiting for approval</b>
                                        At Cipla, we constantly work towards ensuring access to high quality and affordable medicines to support patients in need. Which is why, we have been trusted by health care professionals and patients across geographies for the last 8 decades.
                                </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
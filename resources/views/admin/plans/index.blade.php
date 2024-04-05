@extends('admin.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-pie-chart bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Plans</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Plans</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        @foreach($plans as $plan)
                        <div class="col-md-12 col-lg-4 peity-chart">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ $plan->title }}</h5>
                                    @if($plan->status == 1)
                                    <div class="label-main">
                                        <label class="form-label label label-success">Active
                                            Success</label>
                                    </div>
                                    @else
                                    <div class="label-main">
                                        <label class="form-label label label-danger">Inactive
                                            Success</label>
                                    </div>
                                    @endif
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                            <li><a href="{{ route('admin.plan.edit',$plan->id) }}"><i class="feather icon-edit-1"></i></a></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                            <li><i class="feather icon-note reload-card"></i></li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <ul class="basic-list list-icons">
                                        <li>
                                            <i
                                                class="icofont icofont-speech-comments text-primary p-absolute text-center d-block f-30"></i>
                                            <h6>Amount : {{ $plan->amount}}</h6>

                                            <p>{{ $plan->description }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
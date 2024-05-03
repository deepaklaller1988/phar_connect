@extends('admin.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-pie-chart bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Slider</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Slider</a>
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
                    <div class="card">
                        <div class="card-header">
                            <h5>Plans</h5>
                            <a href="{{ route('admin.pages.slider.add') }}" clas="btn btn-success waves-effect waves-light">Add
                                Slider</a>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                @foreach($sliders as $key => $slider)
                                <div class="col-md-12 col-lg-12 peity-chart priceSetting">
                                    <div class="card">
                                        <div class="card-header">

                                            <div class="editDeletePlans">
                                                <ul>
                                                    <li><a href="{{ route('admin.pages.slider.edit', $slider->id)}}"><i class="feather icon-edit-1"></i></a></li>
                                                    <li>
                                                        <a href="{{ route('admin.pages.slider.delete', $slider->id)}}"><i
                                                                class="feather icon-trash close-card"></i></a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <img src="{{ asset('storage/'.$slider->image) }}" alt="img" width="100%" height="300px">
                                            <br>
                                            <span>{!! $slider->description !!}</span>
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
    </div>
</div>

@endsection
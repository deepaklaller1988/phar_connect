@extends('admin.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Settings</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="!#">Settings</a>
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
                            <h5>Settings</h5>
                        </div>
                        <div class="card-block">
                            <form method="post" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label">Website Logo : </label>
                                    <div class="col-sm-10">
                                        <input type="file" name="logo" class="form-control" id="inputImage">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10" id="logoPreview">
                                        <img src="{{ $settings->logo ? asset('storage/'.$settings->logo) : asset('assets/images/logo.jpg') }}"
                                            id="logo" alt="logo" width="300px" height="100px">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label">Email : </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" value="{{ $settings->email }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label">Phone : </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone" value="{{ $settings->phone }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label">Facebook : </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="facebook" value="{{ $settings->facebook }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label">Twitter : </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="twitter" value="{{ $settings->twitter }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label">Linkedin : </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="linkedin" value="{{ $settings->linkedin }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label">Youtube : </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="youtube" value="{{ $settings->youtube }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label">Instagram : </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="instagram" value="{{ $settings->instagram }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#logoPreview').html('<img src="' + e.target.result +
                        '" class="img-fluid" width="300px">');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#inputImage').change(function() {
            readURL(this);
        });
    });
    </script>
    @endsection
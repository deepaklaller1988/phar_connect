@extends('admin.layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Edit Partner Information</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.partners' ) }}">Parners</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Edit partner info</a>
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
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header">
                                    <h5>Fill Partner Details</h5>
                                </div>
                                <div class="card-block">
                                    <form id="main" enctype='multipart/form-data' method="post" action="{{ route('admin.partner.store') }}">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="" value="{{ old('name') }}">
                                                @if($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Company Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="company_name" id="company_name"
                                                    placeholder="" value="{{ old('company_name') }}">
                                                @if($errors->has('company_name'))
                                                <div class="error">{{ $errors->first('company_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Email : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="email" id="email"
                                                    value="{{ old('email') }}">
                                                @if($errors->has('email'))
                                                <div class="error">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Password : </label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password" id="password"
                                                    value="{{ old('password') }}">
                                                @if($errors->has('password'))
                                                <div class="error">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Phone Number : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="phone" id="phone"
                                                    value="{{ old('phone') }}">
                                                @if($errors->has('phone'))
                                                <div class="error">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Company Website :
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="company_website"
                                                    id="company_website" value="{{ old('company_website') }}">
                                                @if($errors->has('company_website'))
                                                <div class="error">{{ $errors->first('company_website') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Country : </label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="country_id">
                                                    <option value="">Select Country</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('country_id'))
                                                <div class="error">{{ $errors->first('country_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Key Services : </label>
                                            <div class="col-sm-10">
                                                <textarea name="key_services"
                                                    class="form-control">{{ old('key_services') }}</textarea>
                                                @if($errors->has('key_services'))
                                                <div class="error">{{ $errors->first('key_services') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Certifications : </label>
                                            <div class="col-sm-10">
                                                <textarea name="certifications"
                                                    class="form-control">{{ old('certifications') }}</textarea>
                                                @if($errors->has('certification'))
                                                <div class="error">{{ $errors->first('certification') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Company Profile : </label>
                                            <div class="col-sm-10">
                                                <textarea id="summernote"
                                                    name="">{{ old('company_profile') }}</textarea>
                                                @if($errors->has('company_profile'))
                                                <div class="error">{{ $errors->first('company_profile') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <input type="hidden" id="company_profile" name="company_profile"
                                            value="{{ old('company_profile') }}">

                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Status : </label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="status">
                                                    <option value="">Choose an option</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Is Featured : </label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="is_featured">
                                                    <option value="">Choose an option</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Logo : </label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="logo">
                                            </div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Banner : </label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="banner">
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
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
    $(document).on('focusout', '.note-editable', function() {
        $('#company_profile').val($(this).html());
    });
    </script>
    @endsection
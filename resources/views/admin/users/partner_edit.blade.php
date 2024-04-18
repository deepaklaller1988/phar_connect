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
                                    <form id="main" enctype='multipart/form-data' method="post" action="{{ route('admin.partner.update',$partner->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="" value="{{ $partner->name }}">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Email : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="email" id="email"
                                                    value="{{ $partner->email }}">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Phone Number : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="phone" id="phone"
                                                    value="{{ $partner->phone }}">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Company Website :
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="company_website"
                                                    id="company_website" value="{{ $partner->company_website }}">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Location : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="location" id="location"
                                                    value="{{ $partner->location }}">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Key Services : </label>
                                            <div class="col-sm-10">
                                                <textarea name="key_services"
                                                    class="form-control">{{ $partner->key_services }}</textarea>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Certifications : </label>
                                            <div class="col-sm-10">
                                                <textarea name="certifications"
                                                    class="form-control">{{ $partner->certifications }}</textarea>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Company Profile : </label>
                                            <div class="col-sm-10">
                                                <textarea id="summernote"
                                                    name="">{{ $partner->company_profile }}</textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" id="company_profile" name="company_profile"
                                            value="{{ $partner->company_profile }}">

                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Status : </label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="status">
                                                    <option value="">Choose an option</option>
                                                    <option value="1" {{ $partner->status == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0"  {{ $partner->status == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Is Featured : </label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="is_featured">
                                                    <option value="">Choose an option</option>
                                                    <option value="1" {{ $partner->is_featured == 1 ? 'selected' : '' }}>Yes</option>
                                                    <option value="0"  {{ $partner->is_featured == 0 ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Logo : </label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="logo"> 
                                            </div>
                                            @if($partner->logo != null)
                                            <div class="col-sm-5">
                                                <img src="{{ asset('storage/'.$partner->logo )}}" width="150px" height="150px"> 
                                            </div>
                                            @endif
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label"> Banner : </label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="banner"> 
                                            </div>
                                            @if($partner->banner != null)
                                            <div class="col-sm-5">
                                                <img src="{{ asset('storage/'.$partner->banner )}}" width="400px" height="150px"> 
                                            </div>
                                            @endif
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
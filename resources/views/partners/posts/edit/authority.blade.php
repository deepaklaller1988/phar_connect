@extends('partners.layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">
<div class="pcoded-content">
    <div class="page-header card"> 
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Edit Posts</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('partner.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class=""><a href="#!">Edit Posts</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Post Details</h5>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('partner.post.update', $post->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="white_card_body">
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Zone</label>
                                                <select name="zone" id="zone" class="form-control selectFixCZ">
                                                    <option value="">Select Zone</option>
                                                    @foreach($data['zones'] as $zone)
                                                    <option value="{{ $zone->id }}" {{ $zone->id == $post->zone ? 'selected' : ''}}>{{ $zone->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span id="zoneerror"></span>
                                                @if($errors->has('zone'))
                                                <div class="error">{{ $errors->first('zone') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Title:</label>
                                                <input type="text" name="company_name" id="company_name"
                                                    class="form-control" value="{{ $post->title }}">
                                                <span id="cnerror"></span>
                                                @if($errors->has('company_name'))
                                                <div class="error">{{ $errors->first('company_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>URL:</label>
                                                <input type="text" name="company_website" id="company_website"
                                                    class="form-control" value="{{ $post->company_website }}">
                                                <span id="cwerror"></span>
                                                @if($errors->has('company_website'))
                                                <div class="error">{{ $errors->first('company_website') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <input type="hidden" name="category_id" id="parent_id"
                                            value="{{ $post->parent_id}}">
                                        <input type="hidden" name="parent_id" value="{{ $post->category_id}}">
                                        <input type="hidden" name="email" value="{{ $post->email }}">
                                        <input type="hidden" name="phone" value="{{ $post->contact_info }}">
                                        <div class="col-12 mb-3">
                                            <div class="create_report_btn mt_30">
                                                <button type="submit"
                                                    class="btn_1 radius_btn d-block text-center btnsCZ">
                                                    {{ __('Save') }}
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
    </div>
</div>


@endsection
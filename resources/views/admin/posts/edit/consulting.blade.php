@extends('admin.layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<style>
#post-details input,
#post-details select,
#post-details textarea {
    pointer-events: none;
}
</style>
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
                            <form id="main" enctype="multipart/form-data" method="post"
                                action="{{ route('admin.post.update',$post->id ) }}">
                                @csrf
                                @method('put')
                                <div class="white_card_body">
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Action:</label>
                                                <select class="form-select" name="action">
                                                    <option value="">Select Action</option>
                                                    <option value="1" {{ $post->status == 1 ? 'selected' : ''}}>Approve
                                                    </option>
                                                    <option value="2" {{ $post->status == 2 ? 'selected' : ''}}>Reject
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="create_report_btn mt_30">
                                            <button type="submit" class="btn_1 radius_btn d-block text-center btnsCZ">
                                                {{ __('Save') }}
                                            </button>
                                        </div>
                                    </div>
                            </form>
                            <hr>
                            <div class="white_card_body" id="post-details">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Company Name :</label>
                                            <input type="text" name="company_name" id="company_name"
                                                class="form-control" placeholder="Company Name..." required
                                                value="{{ $post->title }}">
                                            <span id="cnerror"></span>
                                            @if($errors->has('company_name'))
                                            <div class="error">{{ $errors->first('company_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Company Website :</label>
                                            <input type="text" name="company_website" id="company_website"
                                                class="form-control" placeholder="Company Website..." required
                                                value="{{ $post->company_website }}">
                                            <span id="cwerror"></span>
                                            @if($errors->has('company_website'))
                                            <div class="error">{{ $errors->first('company_website') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Contact Name :</label>
                                            <input type="text" name="contact_name" id="contact_name"
                                                class="form-control" placeholder="Contact Name..." required
                                                value="{{ $post->contact_name }}">
                                            <span id="conname"></span>
                                            @if($errors->has('contact_name'))
                                            <div class="error">{{ $errors->first('contact_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Email:</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                value="{{ $post->email }}" placeholder="Email Address">
                                            <span id="emailerror"></span>
                                            @if($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label>Phone Number : </label>
                                        <div class="common_input mb_15">
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ $post->contact_info }}" id="phone" placeholder="Mobile No">
                                            <span id="pherror"></span>
                                            @if($errors->has('phone'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label>Country : </label>
                                        <div class="common_input mb_15">
                                            <select class="form-select js-example-placeholder-multiple col-sm-12"
                                                id="multiselect" name="country[]" multiple="multiple">
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}" selected>
                                                    {{ $country->country_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="parent_id" value="{{ $post->parent_id}}">
                                    <div class="col-lg-6 mb-3">
                                        <label>Category : </label>
                                        <div class="common_input mb_15">
                                            <select id="sub_category_select" class="form-control selectFixCZ" disabled>
                                                <option selected>
                                                    {{ $post->parent_category->title }}</option>

                                            </select>
                                        </div>
                                    </div>
                                    @if(isset($post->category))
                                    <div class="col-lg-6 mb-3 ">
                                        <div class="common_input mb_15">
                                            <label>Sub Category : </label>
                                            <select id="sub_sub_category_select" name="category_id"
                                                class="form-control selectFixCZ">
                                                <option selected>{{$post->category->title }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Key Services:</label>
                                            <textarea name="key_services" id="key_services"
                                                class="form-control textareaCZ">{{ $post->key_services }}</textarea>
                                            <small>Preference:- Drugs, Anabolics, Menabolics.</small>
                                            <span id="keyserviceerror"></span>
                                            @if($errors->has('key_services'))
                                            <div class="error">{{ $errors->first('key_services') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Languages:</label>
                                            <textarea name="languages" id="languages"
                                                class="form-control textareaCZ">{{ $post->languages }}</textarea>
                                            <small>Preference:- English, Hindi, French.</small>
                                            <span id="langerror"></span>
                                            @if($errors->has('languages'))
                                            <div class="error">{{ $errors->first('languages') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Hourly Rate (in $):</label>
                                            <input type="text" name="hourly_rate" id="hourly_rate" class="form-control"
                                                value="{{ $post->hourly_rate }}" placeholder="Hourly Rate">
                                            <span id="hrate"></span>
                                            @if($errors->has('hourly_rate'))
                                            <div class="error">{{ $errors->first('hourly_rate') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3 ">
                                        <div class="common_input mb_15">
                                            <label>Profile Summary </label>
                                            <textarea id="summernote"
                                                class="form-control">{{ $post->profile_summary }}</textarea>
                                            <span id="summaryerror"></span>
                                            @if($errors->has('document'))
                                            <div class="error">{{ $errors->first('document') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="hidden" name="profile_summary" id="profile_summary"
                                        value="{{ $post->profile_summary }}">

                                    @if($post->images)
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Image:</label>
                                            <img id="image-preview" src="{{ asset('storage/'.$post->images)}}"
                                                width="150px" height="150px" />
                                        </div>
                                    </div>
                                    @endif
                                    @if($post->document)
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Document:</label>
                                            <a href="{{ asset('storage/'.$post->document)}}" target="_blank"
                                                class="btn btn-success">View</a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/select2/js/select2.full.min.js') }}">
</script>

<script type="text/javascript"
    src="{{ asset('assets/admin/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }} ">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/multiselect/js/jquery.multi-select.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/pages/advance-elements/select2-custom.js') }}"></script>
<script>
$(document).ready(function() {
    $('#summernote').summernote();
});
</script>


@endsection
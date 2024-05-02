@extends('partners.layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
                                                <label>Position Title :</label>
                                                <input type="text" name="company_name" id="company_name"
                                                    class="form-control" placeholder="Position Title..." required
                                                    value="{{ $post->title }}">
                                                <span id="cnerror"></span>
                                                @if($errors->has('company_name'))
                                                <div class="error">{{ $errors->first('company_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Company Website:</label>
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
                                                    value="{{ $post->contact_info }}" id="phone"
                                                    placeholder="Mobile No">
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
                                                    @foreach($data['countries'] as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ in_array($country->id, explode(',', $post->country)) ? 'selected' : '' }}>
                                                        {{ $country->country_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="cerror"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label>Category : </label>
                                            <div class="common_input mb_15">
                                                <select id="sub_category_select" disabled
                                                    class="form-control selectFixCZ">
                                                    <option value="">Select Category</option>
                                                    @foreach($data['categories'] as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $post->parent_id ? 'selected' : ''}}>
                                                        {{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                                <span id="caterror"></span>
                                                @if($errors->has('category'))
                                                <div class="error">{{ $errors->first('category') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        @if(isset($data['subcategories']))
                                        <div class="col-lg-6 mb-3 ">
                                            <div class="common_input mb_15">
                                                <label>Sub Category : </label>
                                                <select id="sub_category_select" name="category_id"
                                                    class="form-control selectFixCZ">
                                                    @foreach($data['subcategories'] as $scategory)
                                                    <option value="{{ $scategory->id }}"
                                                        {{ $scategory->id == $post->category_id ? 'selected' : ''}}>
                                                        {{ $scategory->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Location:</label>
                                                <input type="text" name="location" id="location" class="form-control"
                                                    value="{{ $post->location }}" placeholder="Enter Location">
                                                <span id="locerror"></span>
                                                @if($errors->has('location'))
                                                <div class="error">{{ $errors->first('location') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Position Type:</label>
                                                <select class="form-select" id="position_type" name="position_type">
                                                    <option value="">Select Position Type</option>
                                                    <option value="1" {{ $post->position_type == 1 ? 'selected' : ''}}>
                                                        Full Time</option>
                                                    <option value="2" {{ $post->position_type == 2 ? 'selected' : ''}}>
                                                        Part Time</option>
                                                    <option value="3" {{ $post->position_type == 3 ? 'selected' : ''}}>
                                                        Contract</option>
                                                    <option value="4" {{ $post->position_type == 4 ? 'selected' : ''}}>
                                                        Internship</option>
                                                </select>
                                                <span id="pterror"></span>
                                                @if($errors->has('position_type'))
                                                <div class="error">{{ $errors->first('position_type') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Experience Level:</label>
                                                <select class="form-select" id="experience_level"
                                                    name="experience_level">
                                                    <option value="">Select Experience Level</option>
                                                    <option value="1"
                                                        {{ $post->experience_level == 1 ? 'selected' : ''}}>No
                                                        Experience</option>
                                                    <option value="2"
                                                        {{ $post->experience_level == 2 ? 'selected' : ''}}>Entry Level
                                                    </option>
                                                    <option value="3"
                                                        {{ $post->experience_level == 3 ? 'selected' : ''}}>Mid Level
                                                    </option>
                                                    <option value="4"
                                                        {{ $post->experience_level == 4 ? 'selected' : ''}}>Senior Level
                                                    </option>
                                                </select>
                                                <span id="elerror"></span>
                                                @if($errors->has('experience_level'))
                                                <div class="error">{{ $errors->first('experience_level') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Education Level:</label>
                                                <select class="form-select" id="education_level" name="education_level">
                                                    <option value="">Select Education Level</option>
                                                    <option value="1"
                                                        {{ $post->education_level == 1 ? 'selected' : ''}}>High School
                                                        or Equivalent</option>
                                                    <option value="2"
                                                        {{ $post->education_level == 2 ? 'selected' : ''}}>Associate
                                                        Degree</option>
                                                    <option value="3"
                                                        {{ $post->education_level == 3 ? 'selected' : ''}}>Bachelor
                                                        Degree</option>
                                                    <option value="4"
                                                        {{ $post->education_level == 4 ? 'selected' : ''}}>Master Degree
                                                        / MBA</option>
                                                    <option value="5"
                                                        {{ $post->education_level == 5 ? 'selected' : ''}}>Doctorate
                                                        Degree/PHD/MD</option>
                                                    <option value="6"
                                                        {{ $post->education_level == 6 ? 'selected' : ''}}>Other
                                                    </option>
                                                </select>
                                                <span id="ederror"></span>
                                                @if($errors->has('experience_level'))
                                                <div class="error">{{ $errors->first('experience_level') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <input type="hidden" name="parent_id" value="{{ $post->parent_id }}">
                                        <input type="hidden" name="category_id" id="parent_id"
                                            value="{{ $post->category_id }}">
                                        <div class="col-lg-12 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Job Description:</label>
                                                <textarea id="job_description">{{ $post->description }}</textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="description" id="description"
                                            value="{{ $post->description }}">
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
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/select2/js/select2.full.min.js') }}">
</script>

<script type="text/javascript"
    src="{{ asset('assets/admin/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }} ">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/multiselect/js/jquery.multi-select.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/pages/advance-elements/select2-custom.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $(document).on('change', '#sub_category_select', function() {
        var category_id = $(this).val();
        $('#parent_id').val(category_id);
    });

    $('#job_description').summernote();
    $(document).on('focusout', '.note-editable', function() {
        $('#description').val($(this).html());
    });
});
</script>

@endsection
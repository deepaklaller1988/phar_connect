@extends('admin.layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">
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
                                            <label>Event Name :</label>
                                            <input type="text" name="event_name" id="event_name" class="form-control"
                                                placeholder="Event Name..." required value="{{ $post->event_name }}">
                                            <span id="everror"></span>
                                            @if($errors->has('event_name'))
                                            <div class="error">{{ $errors->first('event_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Link for Event (Website) :</label>
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
                                                value="{{ $post->contact_info }}">
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
                                                <option selected>
                                                    {{ $country->country_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span id="cerror"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>Start Date:</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control"
                                                value="{{ $post->start_date }}" placeholder="Event Start Date">
                                            <span id="estarterror"></span>
                                            @if($errors->has('start_date'))
                                            <div class="error">{{ $errors->first('start_date') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="common_input mb_15">
                                            <label>End Date:</label>
                                            <input type="date" name="end_date" value="{{ $post->end_date }}"
                                                id="end_date" class="form-control" value=""
                                                placeholder="Event End Date">
                                            <span id="eenderror"></span>
                                            @if($errors->has('end_date'))
                                            <div class="error">{{ $errors->first('end_date') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label>Category : </label>
                                        <div class="common_input mb_15">
                                            <select id="sub_category_select" disabled class="form-control selectFixCZ">
                                                <option value="">{{ $post->parent_category->title }} </option>
                                            </select>

                                        </div>
                                    </div>
                                    @if(isset($post->category))
                                    <div class="col-lg-6 mb-3 ">
                                        <div class="common_input mb_15">
                                            <label>Sub Category : </label>
                                            <select id="sub_category_select" name="category_id"
                                                class="form-control selectFixCZ">
                                                <option selected>{{$post->category->title}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    <input type="hidden" name="parent_id" value="{{ $post->parent_id}}">
                                    <input type="hidden" name="category_id" id="parent_id"
                                        value="{{ $post->category_id }}">
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


@endsection
@extends('partners.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Complete Profile</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="feather icon-home"></i></a>
                        </li>
                        <li class=""><a href="#!">Complete Profile</a> </li>
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
                        <div class="card-block">
                            <h5 class="card-title">Partner Information</h5>
                            <div class="flexSet">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="company_website">{{ __('Full Name') }}</label>
                                        <input id="company_website" value="{{$data['partnerInformation']['name']}}"
                                            readonly type="text" class="form-control ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="company_website">{{ __('Email') }}</label>
                                        <input id="company_website" value="{{$data['partnerInformation']['email']}}"
                                            readonly type="text" class="form-control ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="company_website">{{ __('Phone') }}</label>
                                        <input id="company_website" value="{{$data['partnerInformation']['phone']}}"
                                            readonly type="text" class="form-control ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="company_website">{{ __('Company Name') }}</label>
                                        <input id="company_website"
                                            value="{{$data['partnerInformation']['company_name']}}" readonly type="text"
                                            class="form-control ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="company_website">{{ __('Alternate Contact Name') }}</label>
                                        <input id="company_website"
                                            value="{{$data['partnerInformation']['alternate_contact_name']}}" readonly
                                            type="text" class="form-control ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="company_website">{{ __('Alternate Email Address') }}</label>
                                        <input id="company_website"
                                            value="{{$data['partnerInformation']['alternate_email_address']}}" readonly
                                            type="text" class="form-control ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-block">
                            <form method="POST" action="{{ route('partner.complete-info',auth()->user()->id ) }}"
                                enctype="multipart/form-data">
                                <div class="flexSet">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15 d-flex align-items-center">
                                                <label class="text-nowrap mr-1">Select Group :
                                                </label>
                                                <select id="select_main_category" class="form-control selectFixCZ"
                                                    name="category_ids[]">
                                                    <option value="" disabled selected>Select Group : </option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="common_input mb_15 d-flex align-items-center">
                                                <label class="text-nowrap mr-1">Plans :
                                                </label>
                                                <select id="select_plan" class="form-control selectFixCZ"
                                                    name="plan_id">
                                                    <option value="" disabled selected>Select Plans </option>
                                                    @foreach($data['planTitle'] as $plan)
                                                    <option value="{{ $plan->id }}"
                                                        data-country-limit="{{ $plan->number_of_country }}"
                                                        data-category-limit="{{ $plan->number_of_category }}">
                                                        {{ $plan->title }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="d-none" id="plan_error" role="alert">
                                                    <strong class="text-danger">Please Select Plan</strong>
                                                </span>
                                                @error('plan_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="custom-form"></div>
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
        $('#select_main_category').change(function() {
            var category_id = $(this).val();
            if (category_id !== '') {
                $.ajax({
                    url: "{{ route('partner.register.addblade') }}",
                    method: 'POST',
                    data: {
                        category_id: category_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.html) {
                            $('#custom-form').html(data.html);
                            $('.default-form').remove();
                        } else {
                            $('#subcategory_div').hide();
                        }
                    }
                });
            } else {
                $('#subcategory_div').hide();
            }
        });
    });
    </script>
    @endsection
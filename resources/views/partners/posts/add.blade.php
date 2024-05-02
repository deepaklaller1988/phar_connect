@extends('partners.layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Add Posts</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('partner.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class=""><a href="#!">Add Posts</a> </li>
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
                            <h5>Add Post Details</h5>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="common_input mb_15 d-flex">
                                        <label>Select Category : </label>
                                        <select id="select_main_cayegory" class="form-control selectFixCZ">
                                            <option value="">Select Category : </option>
                                            @foreach($data['categories'] as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="custom-form"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $(document).on('change', '#select_main_cayegory', function() {
        $('#custom-form').html('');
        var category_id = $(this).val();
        $.ajax({
            url: "{{ route('partner.post.loadblade') }}" + '?id=' + category_id,
            method: 'GET',
            success: function(response) {
                $('#custom-form').html(response.html);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    $(document).on('change', '#sub_category_select', function() {
        var category_id = $(this).val();
        $('#parent_id').val(category_id);
        $('#sub_sub_category_div').css('display', 'none');
        $('#sub_sub_category_select').html('');
        $.ajax({
            url: "{{ route('partner.subcategories') }}?parent_id=" + category_id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#sub_sub_category_select').html(
                    '<option value="">Choose an Option</option>');
                $.each(response, function(index, item) {

                    $('#sub_sub_category_div').css('display', '');
                    $('#sub_sub_category_select').append('<option value="' + item
                        .id + '">' + item.title + '</option>');
                });
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });

    $(document).on('change', '#sub_sub_category_select', function() {
        var category_id = $(this).val();
        $('#parent_id').val(category_id);
        $('#child_category_div').css('display', 'none');
        $('#child_category_select').html('');
        $.ajax({
            url: "{{ route('partner.subcategories') }}?parent_id=" + category_id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#child_category_select').html(
                    '<option value="">Choose an Option</option>');
                $.each(response, function(index, item) {

                    $('#child_category_div').css('display', '');
                    $('#child_category_select').append('<option value="' + item
                        .id + '">' + item.title + '</option>');
                });
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });

    $(document).on('change', '#child_category_select', function() {
        var category_id = $(this).val();
        $('#parent_id').val(category_id);
    });
    $(document).on('submit', '#post-form', function(e) {

        e.preventDefault();
        if ($('#company_name').val() == '') {
            $('#cnerror').text('Please enter name');
            return false;
        }
        if ($('#company_website').val() == '') {
            $('#cwerror').text('Please enter company website');
            return false;
        }
        if ($('#parent_id').val() != 4) {
            if ($('#contact_name').val() == '') {
                $('#conname').text('Please enter Contact name');
                return false;
            }
            if ($('#email')) {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if ($('#email').val() == '' || !emailRegex.test($('#email').val())) {
                    $('#emailerror').text('Please enter valid email address');
                    return false;
                }
            }
            if ($('#phone').val() == '') {
                $('#pherror').text('Please enter valid phone number');
                return false;
            }
            if ($('#key_services').val() == '') {
                $('#keyserviceerror').text('Please enter key services');
                return false;
            }
            if ($('#image').val() == '') {
                $('#imageerror').text('Please choose an image');
                return false;
            }
            if ($('#document').val() == '') {
                $('#docerror').text('Please choose an appropriate document');
                return false;
            }
            if ($('#languages').val() == '') {
                $('#langerror').text('Please enter languages');
                return false;
            }
            if ($('#hourly_rate').val() == '') {
                $('#hrate').text('Please Hourly Rate');
                return false;
            }
            if ($('#profile_summary').val() == '') {
                $('#summaryerror').text('Please enter your profile summary');
                return false;
            }
            if ($('#event_name').val() == '') {
                $('#everror').text('Please enter Event Name');
                return false;
            }
            if ($('#multiselect').val() == '') {
                $('#cerror').text('Please select County');
                return false;
            }
            if ($('#start_date').val() == '') {
                $('#estarterror').text('Please enter Event start date');
                return false;
            }
            if ($('#end_date').val() == '') {
                $('#eenderror').text('Please enter Event start date');
                return false;
            }
            if ($('#sub_category_select').val() == '') {
                $('#caterror').text('Please Select Category');
                return false;
            }
            if ($('#location').val() == '') {
                $('#locerror').text('Please Enter Location');
                return false;
            }
            if ($('#position_type').val() == '') {
                $('#pterror').text('Please Select Position Type');
                return false;
            }
            if ($('#education_level').val() == '') {
                $('#ederror').text('Please Select Education Level');
                return false;
            }
            if ($('#experience_level').val() == '') {
                $('#elerror').text('Please Select Experience Level');
                return false;
            }
        }
        if ($('#zone').val() == '') {
            $('#zoneerror').text('Please Select zone');
            console.log('zoerror');
            return false;
        }
        // var formData = new FormData(this);
        // if ($('#image').val()) {
        //     formData.append('image', $('#image')[0].files[0]);
        //     formData.append('document', $('#document')[0].files[0]);
        // }

        // var formData = $(this).serialize();
        var formData = new FormData(this);
        if ($('#image').length && $('#document').length) {
            // Check if files are selected before appending them
            if ($('#image')[0].files.length > 0) {
                formData.append('image', $('#image')[0].files[0]);
            }
            if ($('#document')[0].files.length > 0) {
                formData.append('document', $('#document')[0].files[0]);
            }
        }

        $.ajax({
            url: "{{ route('partner.post.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            success: function(response) {
                if (response.status == true) {
                    Swal.fire({
                        title: "Awesome",
                        text: "Your post has been added successfully",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                        showConfirmButton: true,
                        allowOutsideClick: false,
                    }).then(function(result) {
                        if (result['isConfirmed']) {
                            window.location.href = "{{ route('partner.posts') }}";
                        }
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                // Handle error
            }
        });

    });

    $(document).on('focusout', '.note-editable', function() {
        $('#profile_summary').val($(this).html());
    });
});
</script>

@endsection
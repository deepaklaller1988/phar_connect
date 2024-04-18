@extends('partners.layouts.master')

@section('content')
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
    $(document).on('submit','#post-form',function(e) {

        e.preventDefault();
        if ($('#company_name').val() == '') {
            $('#cnerror').text('please enter company name');
            return false;
        }
        if ($('#company_website').val() == '') {
            $('#cwerror').text('please enter company website');
            return false;
        }
        if ($('#contact_name').val() == '') {
            $('#conname').text('please enter Contact name');
            return false;
        }
        if ($('#email').val() == '') {
            $('#emailerror').text('please enter company website');
            return false;
        }
        if ($('#hone').val() == '') {
            $('#pherror').text('please enter valid phone number');
            return false;
        }
        if ($('#key_services').val() == '') {
            $('#keyserviceerror').text('please enter key services');
            return false;
        }
        var formData = $(this).serialize();
        $.ajax({
            url: "{{ route('partner.post.store') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                console.log(response);
                // Handle success response
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                // Handle error
            }
        });

    });
});
</script>

@endsection
@extends('admin.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Add New Category</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">Categories</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.category.add') }}">Add Category</a>
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
                            @if(session('error'))
                            <div class="card">
                                <div class="card-header">
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h5>Fill Category Details</h5>
                                </div>
                                <div class="card-block">
                                    <form id="main" enctype='multipart/form-data' method="post"
                                        action="{{ route('admin.category.store') }}">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Category Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Enter Category Name">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Parent Category : </label>
                                            <div class="col-sm-10">
                                                <select class="form-control czSelectSet" id="category_select">
                                                    <option value="">Choose Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row" id="sub_category_div czSelectSet" style="display: none">
                                            <label class="form-label col-sm-2 col-form-label">Sub Category : </label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="sub_category_select">
                                                    <option>Choose Sub Category</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row" id="sub_sub_category_div" style="display: none">
                                            <label class="form-label col-sm-2 col-form-label">child Category : </label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="sub_sub_category_select">
                                                    <option> Choose an option</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="parent_id" id="parent_id">
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Category Image : </label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="category_image">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Status : </label>
                                            <div class="col-sm-10">
                                                <select class="form-control czSelectSet" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
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
        $(document).on('change', '#category_select', function() {
            $('#sub_sub_category_div').css('display', 'none');
            $('#sub_sub_category_select').html('');
            $('#sub_category_div').css('display', 'none');
            $('#sub_category_select').html('');
            var category_id = $(this).val();
            $('#parent_id').val(category_id);
            $.ajax({
                url: "{{ route('admin.subcategories') }}?parent_id=" + category_id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#sub_category_select').html('<option value="">Choose Sub Category</option>');
                    $.each(response, function(index, item) {

                        $('#sub_category_div').css('display', '');

                        $('#sub_category_select').append('<option value="' + item
                            .id + '">' + item.title + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });


        $(document).on('change', '#sub_category_select', function() {
            var category_id = $(this).val();
            $('#parent_id').val(category_id);
            $('#sub_sub_category_div').css('display', 'none');
            $('#sub_sub_category_select').html('');
            $.ajax({
                url: "{{ route('admin.subcategories') }}?parent_id=" + category_id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#sub_sub_category_select').html('<option value="">Choose an Option</option>');
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
        });
    });
    </script>
    @endsection
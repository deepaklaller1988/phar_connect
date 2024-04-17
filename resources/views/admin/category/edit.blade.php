@extends('admin.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Edit Category</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories' ) }}">Categories</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.category.add') }}">Edit Category</a>
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
                                    <h5>Fill Category Details</h5>
                                </div>
                                <div class="card-block">
                                    <form id="main" enctype='multipart/form-data' method="post"
                                        action="{{ route('admin.category.update',$data['category']->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Category Name : </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Enter Category Name"
                                                    value="{{$data['category']->title}}">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Parent Category : </label>
                                            <div class="col-sm-10">
                                                <select class="form-control czSelectSet" id="category_select">
                                                <option>chooose an option</option>
                                                    @foreach($data['categories'] as $category)
                                                    <option value="{{ $category->id }}" @if($data['category']->parent_id
                                                        == $category->id) selected @endif >{{ $category->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row" id="sub_category_div" style="display: none">
                                            <label class="form-label col-sm-2 col-form-label">Sub Category : </label>
                                            <div class="col-sm-10">
                                                <select class="form-control czSelectSet" id="sub_category_select">
                                                    <option>chooose an option</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row" id="sub_sub_category_div" style="display: none">
                                            <label class="form-label col-sm-2 col-form-label">child Category : </label>
                                            <div class="col-sm-10">
                                                <select class="form-control czSelectSet" id="sub_sub_category_select">
                                                    <option>chooose an option</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="parent_id" id="parent_id"
                                            value="{{ $data['category']->id }}">
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Category Image : </label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="category_image">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="czGroupImages">
                                        @if($data['category']->image)
                                        <span><img width="150px" height="150px"
                                            src="{{ asset('storage/'.$data['category']->image) }}"> <b>+</b>
</span>
                                        @endif
</div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Status : </label>
                                            <div class="col-sm-10">
                                                <select class="form-control czSelectSet" name="status">
                                                    <option value="1" @if($data['category']->status == 1 ) selected
                                                        @endif>Active</option>
                                                    <option value="2" @if($data['category']->status == 2 ) selected
                                                        @endif>Inactive</option>
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
        var selected_category_id = $('#parent_id').val();
        alert(selected_category_id);
        $.ajax({
            url: "{{ route('admin.cat') }}?id=" + selected_category_id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $.each(response, function(index, obj) {
                    $('#sub_sub_category_div').css('display', '');
                    var option = $('<option></option>');
                    option.attr('value', obj.id);
                    option.text(obj.title);
                    if (index === 0) { 
                        option.attr('selected', 'selected');
                    }
                    $('#sub_sub_category_select').append(option);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    //     setTimeout(function () {
    //     var selected_sub_category_id = $('#sub_sub_category_select').val();
    //     $.ajax({
    //         url: "{{ route('admin.cat') }}?id=" + selected_sub_category_id,
    //         type: 'GET',
    //         dataType: 'json',
    //         success: function(response) {
    //             $.each(response, function(index, obj) {
    //                 $('#sub_category_div').css('display', '');
    //                 var option = $('<option></option>');
    //                 option.attr('value', obj.id);
    //                 option.text(obj.title);
    //                 if (index === 0) { 
    //                     option.attr('selected', 'selected');
    //                 }
    //                 $('#sub_category_select').append(option);
    //             });
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // },1000);
    })

    $(document).ready(function() {
        $(document).on('change', '#category_select', function() {
            var category_id = $(this).val();
            $('#sub_sub_category_div').css('display', 'none');
            $('#sub_sub_category_select').html('');
            $('#sub_category_div').css('display', 'none');
            $('#sub_category_select').html('');
            $('#parent_id').val(category_id);
            $.ajax({
                url: "{{ route('admin.subcategories') }}?parent_id=" + category_id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
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
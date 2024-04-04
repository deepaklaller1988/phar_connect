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
                                                <select class="form-control" name="parent_id">
                                                    <option value="">Choose Category</option>
                                                    @foreach($data['categories'] as $category)
                                                    <option value="{{ $category->id }}" @if($data['category']->parent_id
                                                        == $category->id) selected @endif >{{ $category->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Category Image : </label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="category_image">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        @if($data['category']->image)
                                        <img width="150px" height="150px"
                                            src="{{ asset('storage/'.$data['category']->image) }}">
                                        @endif
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Status : </label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="status">
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
    @endsection
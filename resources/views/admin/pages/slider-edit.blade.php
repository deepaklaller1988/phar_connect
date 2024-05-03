@extends('admin.layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-file-plus bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Edit Homepage Slider</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Homepage Slider</a>
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
                    @if(session('success'))
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Homepage Slider Details</h5>
                                </div>
                                <form method="post" enctype="multipart/form-data" action="{{ route('admin.pages.slider.update',$slider->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-block">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="slider_image">
                                    </div class="form-group">
                                        <label>Description</label>
                                        <textarea id="summernote">{{ $slider->description }}</textarea>
                                    </div>
                                    <input type="hidden" name="content" id="content" value="{{ $slider->description }}">
                                    <div class="mb-3 row">
                                        <label class="form-label col-sm-2"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                        </div>
                                    </div>
                                    <div class="imagePreview">
                                        <img src="{{ asset('storage/'.$slider->image)}}" id="imagePreview"  width="100%" height="300px">
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
    $('#summernote').summernote();
});
$(document).on('focusout', '.note-editable', function() {
    $('#content').val($(this).html());
});
</script>
@endsection
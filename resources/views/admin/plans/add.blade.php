@extends('admin.layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Add Plan</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.plans' ) }}">Plans</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!">Add Plan</a>
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
                                    <h5>Add Plan</h5>
                                </div>
                                <div class="card-block">
                                    <form method="post" action="{{ route('admin.plan.create') }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Amount</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="amount" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="status">
                                                    <option value="1">Active
                                                    </option>
                                                    <option value="2">
                                                        Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="summernote">

                                                        </textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="description" id="description">
                                        <div class="row mb-3">
                                            <input type="submit" name="submit" value="Save" class="btn btn-success">
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
</div>
<script>
$(document).ready(function() {
    $('#summernote').summernote();
});
$(document).on('focusout', '.note-editable', function() {
    $('#description').val($(this).html());
});
</script>
@endsection
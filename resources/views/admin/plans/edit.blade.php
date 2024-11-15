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
                        <h5>{{ $plan->id ? 'Edit' : 'Add' }} Plan</h5>
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
                            <a href="#!">{{ $plan->id ? 'Edit' : 'Add' }} Plan</a>
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
                                    <h5>Edit Plan</h5>
                                </div>
                                <div class="card-block">
                                    <form method="POST" action="{{ route('admin.plan.update', $plan->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Group</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="category_id">
                                                    @foreach($categories as $category)
                                                        <option {{ $plan->category_id == $category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title" value="{{ $plan->title ? $plan->title : '' }}" class="form-control">
                                                @if($errors->has('title'))
                                                <div class="error">{{ $errors->first('title') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Amount (in $)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="amount" id="amount" value="{{ $plan->amount ? $plan->amount : '' }}" class="form-control">
                                                <span id="amount-error"></span>
                                                @if($errors->has('amount'))
                                                <div class="error">{{ $errors->first('amount') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Days (in days)</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="days" id="days" value="{{ $plan->days ? $plan->days : '' }}" class="form-control">
                                                <span id="days-error"></span>
                                                @if($errors->has('days'))
                                                <div class="error">{{ $errors->first('days') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Number of Country</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="number_of_country" id="number_of_country" value="{{ $plan->number_of_country }}"
                                                    class="form-control">
                                                <span class="text-danger" id="number_of_country-error"></span>
                                                @if($errors->has('number_of_country'))
                                                <div class="error">{{ $errors->first('number_of_country') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Number of Category</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="number_of_category" id="number_of_category" value="{{ $plan->number_of_category }}"
                                                    class="form-control">
                                                <span class="text-danger" id="number_of_category-error"></span>
                                                @if($errors->has('number_of_category'))
                                                <div class="error">{{ $errors->first('number_of_category') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="status">
                                                    <option value = "1" {{ $plan->status == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="2" {{ $plan->status == 2 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-label col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="summernote">
                                                {{ $plan->description ? $plan->description : '' }}  
                                                        </textarea>
                                                        @if($errors->has('description'))
                                                <div class="error">{{ $errors->first('description') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <input type="hidden" name="description" id="description" value="{{ $plan->description ? $plan->description : '' }} ">
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
$('#amount').on('input', function() {
    var num = $(this).val();
    if (isNaN(num)) {
        $('#amount-error').text('Please enter a valid Amount');
        $(this).val('');
    }
});
$('#days').on('input', function() {
    var num = $(this).val();
    if (isNaN(num)) {
        $('#days-error').text('Please enter a valid days');
        $(this).val('');
    }
});
</script>
@endsection
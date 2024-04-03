@extends('admin.layouts.master')

@section('content')

<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Categories</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="javascript:void(0)" id="createNewCategory" class="btn_1">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table class="table table-bordered data-table" data-url="{{route('admin.categories')}}">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="categoryForm" name="categoryForm" class="form-horizontal">
                    <input type="hidden" name="id" id="category_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="category" placeholder="Enter Name"
                                value="" maxlength="50" required="">
                        </div>
                        <span class="text-danger d-none" id="inputerror">This field is required</span>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10 mt-3">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create"
                            data-url="{{route('admin.category.store')}}">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
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
                                <a href="javascript:void(0)" id="createNewSubCategory" data-caturl="{{ route('admin.allcategories') }}" class="btn_1">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table class="table table-bordered subcategory-table" data-url="{{route('admin.subcategories')}}">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Category</th>
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
<div class="modal fade" id="SubcategoryModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="subcategoryForm" name="subcategoryForm" class="form-horizontal">
                    <input type="hidden" name="id" id="subcategory_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name:</label>
                        <div class="col-sm-12 mt-1">
                            <input type="text" class="form-control" id="name" name="subcategory" placeholder="Enter Name"
                                value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Category:</label>
                        <div class="col-sm-12 mt-1">
                            <select name="category" id="admincategory" required class="form-control">
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="name" class="col-sm-2 control-label">Description:</label>
                        <div class="col-sm-12 mt-1">
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10 mt-3">
                        <button type="submit" class="btn btn-primary" id="subCatsaveBtn" value="create"
                            data-url="{{route('admin.subcategory.store')}}">Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
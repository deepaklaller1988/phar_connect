@extends('admin.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Categories</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">categories</a>
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
                    <div class="card">
                        <div class="card-header">
                            <h5>All Categories</h5>
                            <a href="{{ route('admin.category.add') }}"
                                clas="btn btn-success waves-effect waves-light">Add Category</a>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="dt-http" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Parent</th>
                                            <th>Images</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(function() {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var table = $('#dt-http').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.categories') }}",
            columns: [
                { 
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    orderable: false, 
                    searchable: false 
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'parent_id',
                    name: 'parent_id'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $(document).on('click', '#deleteCategory', function () {
        var url = $(this).data('url');
        Swal.fire({
            title: "Warning!",
            text: "Are you sure want to delete Category !",
            icon: "warning"
          }).then(function(){         
            $.ajax({
                type: "DELETE",
                url: url,
                success: function (data) {
                    Swal.fire({
                        title: "Great!",
                        text: "Category Deleted Successfully",
                        icon: "success"
                      }).then(function(){ 
                        table.draw();
                        })
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
    })
    </script>

    @endsection
@extends('admin.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Posts</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.posts') }}">Posts</a>
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
                    <div class="card" id="successMessage">
                        <div class="card-header">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="card" id="successMessage">
                        <div class="card-header">
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h5>All Posts</h5>
                            <select class="form-select" id="category_select" style="width:30%">
                                <option value="">All</option>
                                @foreach($category as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="dt-http" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>Partner Name</th>
                                            <th>Parent Category</th>
                                            <th>Status</th>
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
            // data: function(d) {
            //     // Send category_id parameter if category filter is applied
            //     d.category_id = $('#category_select').val();
            // }
            // ajax: "{{ route('admin.posts') }}",
            ajax: {
                url: "{{ route('admin.posts') }}",
                type: 'GET',
                data: function(d) {
                    d.category_id = $('#category_select').val();
                }
            },
            columns: [{
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
                    data: 'partner',
                    name: 'partner'
                },
                {
                    data: 'parent_category',
                    name: 'parent_category'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $('#category_select').change(function() {
            table.ajax.reload();
        });
    })

    // $(document).on('change','#category_select',function(){
    //     var category_id = $(this).val();
    //     $('#dt-http').DataTable().destroy();
    //     // $('#dt-http').find('tbody').html('');
    //     var table = $('#dt-http').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: {
    //         url: "{{ route('admin.posts.category') }}"+category_id,
    //     },
    //     columns: [

    //         {
    //             data: 'title',
    //             name: 'title'
    //         },

    //     ]
    // });
    // })
    </script>

    @endsection
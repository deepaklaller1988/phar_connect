@extends('partners.layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">Posts</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('partner.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
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
            <div class="col-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Posts </h3>
                                <a href="{{ route('partner.post.add') }}" class="btn btn-success">Add Post</a>
                            </div>
                        </div>
                    </div>
                    <table id="dt-http" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
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
            ajax: "{{ route('partner.posts') }}",
            columns: [
                { 
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
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
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
               
                
            ]
        });
        $(document).on('click', '#deletePost', function () {
        var url = $(this).data('url');
        Swal.fire({
            title: "Warning!",
            text: "Are you sure want to delete Post !",
            icon: "warning"
          }).then(function(){         
            $.ajax({
                type: "DELETE",
                url: url,
                success: function (data) {
                    Swal.fire({
                        title: "Great!",
                        text: "Post Deleted Successfully",
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
    });
</script>
@endsection
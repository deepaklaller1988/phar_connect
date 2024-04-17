@extends('admin.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-pie-chart bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Plans</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Plans</a>
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
                            <h5>Plans</h5>
                            <a href="{{ route('admin.plan.add') }}" clas="btn btn-success waves-effect waves-light">Add
                                Plan</a>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                @foreach($plans as $plan)
                                <div class="col-md-12 col-lg-4 peity-chart">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>
                                                {{ $plan->title }}
                                                <div class="planAct">
                                                    @if($plan->status == 1)
                                                    <div class="label-main">
                                                        <label class="form-label label label-success">Active</label>
                                                    </div>
                                                    @else
                                                    <div class="label-main">
                                                        <label class="form-label label label-danger">Inactive</label>
                                                    </div>
                                                    @endif
                                                </div>
                                            </h5>
                                            <div class="editDeletePlans">
                                                <ul>
                                                    <li><a href="{{ route('admin.plan.edit',$plan->id) }}"><i
                                                                class="feather icon-edit-1"></i></a></li>
                                                    <li>
                                                        <a id="planDelete" data-id="{{ $plan->id }}"><i
                                                                class="feather icon-trash close-card"></i></a>
                                                    </li>
                                                </ul>

                                            </div>

                                            <!-- <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li class="first-opt"><i
                                                        class="feather icon-chevron-left open-card-option"></i></li>
                                                <li><a href="{{ route('admin.plan.edit',$plan->id) }}"><i
                                                            class="feather icon-edit-1"></i></a></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                                <li><i class="feather icon-note reload-card"></i></li>
                                                <li id="planDelete" data-id="{{ $plan->id }}"><i
                                                        class="feather icon-trash close-card"></i></li>
                                                <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                            </ul>
                                        </div> -->
                                        </div>
                                        <div class="card-block">
                                            <ul class="basic-list list-icons">
                                                <li>
                                                    <i
                                                        class="icofont icofont-speech-comments text-primary p-absolute text-center d-block f-30"></i>
                                                    <h6>Amount : {{ $plan->amount}}</h6>

                                                    <p>{!! $plan->description !!}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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

    $(document).on('click', '#planDelete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal.fire({
                title: "Are you sure?",
                text: "Once confirmed, the plan will be deleted",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showConfirmButton: true,
                allowOutsideClick: false,
                showCloseButton: true,
            })
            .then((result) => {
                if (result['isConfirmed']) {
                    $.ajax({
                        url: "{{ url('admin/plan/delete')}}" + '/' + id,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            Swal.fire({
                                title: "Great!",
                                text: "Plan Deleted Successfully",
                                icon: "success"
                            }).then(function() {
                                window.location.reload();
                            })
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                } else {
                    // alert("23455");
                }
            });
    });
})
</script>
@endsection
@extends('admin.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-pie-chart bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Slider</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Slider</a>
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
                            <a href="{{ route('admin.pages.slider.add') }}" clas="btn btn-success waves-effect waves-light">Add
                                Slider</a>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                @foreach($sliders as $key => $slider)
                                <div class="col-md-12 col-lg-12 peity-chart priceSetting">
                                    <div class="card">
                                        <div class="card-header"> 

                                            <div class="editDeletePlans">
                                                <ul>
                                                    <li><a href="{{ route('admin.pages.slider.edit', $slider->id)}}"><i class="feather icon-edit-1"></i></a></li>
                                                    <li>
                                                        <a id="sliderDelete" data-id="{{ $slider->id }}"><i
                                                                class="feather icon-trash close-card"></i></a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <img src="{{ asset('storage/'.$slider->image) }}" alt="img" width="100%" height="300px">
                                            <br>
                                            <span>{!! $slider->description !!}</span>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '#sliderDelete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal.fire({
                title: "Are you sure?",
                text: "Once confirmed, the Slider will be deleted",
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
                        url: "{{ url('admin/pages/slider/delete')}}" + '/' + id,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            Swal.fire({
                                title: "Great!",
                                text: "Slider Deleted Successfully",
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
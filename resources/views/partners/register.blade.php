@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">


<div class="container loginRegister partnerSection">
    <div class="wrapper">
    <div class="partnerSectionHead">
        <section>
            <h4>Partner With Us!</h4>
            <p>PharmConect builds solutions at the intersection of innovation and flexibility. Partner with our global team.</p>
        </section>
    </div>
    <div class="partnerSectionHub">
    
    <div class="row justify-content-center partnerLeftCollumn">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header headerBG-register">{{ __('Partner With Us!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        <div class="flexSet">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="common_input mb_15 d-flex align-items-center">
                                        <label class="text-nowrap mr-1">Select Category :
                                        </label>
                                        <select id="select_main_category" class="form-control selectFixCZ"
                                            name="category_ids[]">
                                            <option value="" disabled selected>Select Category : </option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="custom-form"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="partnerRightCollumn">
        <h5>PharmConnect has the bespoke solutions to your business’s complex challenges.</h5>
        <p>We partner with pharmaceutical, biotechnology, and medical device clients to inspire the future of science to deliver the technologies, medicines, and therapies to improve patient health and safety.

Contact us to learn how our experienced team can help ensure regulatory and development success throughout the product lifecycle.</p>
</div>
    </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('assets/admin/pages/advance-elements/select2-custom.js') }}"></script>
<!-- <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script> -->

<script>
$(document).ready(function() {
    $('#select_main_category').change(function() {
        var category_id = $(this).val();
        if (category_id !== '') {
            $.ajax({
                url: "{{ route('partner.register.addblade') }}",
                method: 'POST',
                data: {
                    category_id: category_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.html) {
                        $('#custom-form').html(data.html);
                        $('.default-form').remove();
                    } else {
                        $('#subcategory_div').hide();
                    }
                }
            });
        } else {
            $('#subcategory_div').hide();
        }
    });
});
$(window).on('load', function() {
    $.ajax({
        url: "{{ route('partner.register.addblade') }}",
        method: 'POST',
        data: {
            category_id: 1,
            _token: '{{ csrf_token() }}'
        },
        success: function(data) {
            if (data.html) {
                $('#custom-form').html(data.html);
                $('#select_main_category').val(1).attr('selected', 'selected');
            }
        }
    });
});
</script>
@endsection
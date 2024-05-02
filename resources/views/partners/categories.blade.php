@extends('partners.layouts.master')

@section('content')
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Choose Categories</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="feather icon-home"></i></a>
                        </li>
                        <li class=""><a href="#!">Choose Categories</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <di v class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    @php
                    if(Auth::check()){
                    if(auth()->user()->plan_id <> NULL && auth()->user()->category_ids == NULL){
                        $style = "style=display:block;";
                        }else{
                        $style = "";
                        }
                        }else{
                        $style = '';
                        }
                        @endphp
                        <div class="selectYourCategory" {{ $style }}>
                            <div class="selectSetCategory">
                                <div class="selectedCategoryHead">
                                    <h6>WELCOME {{ Auth::check() ? Auth::user()->name : ''  }}</h6>
                                    <p>Choose a category you want to display on your feed.</p>
                                    <!-- <span>Selcted <b>5</b></span> -->
                                </div>
                                <ul>
                                    @foreach($allcategories['maincategories'] as $key => $mcategory)
                                    <li>
                                        <div class="catgeroyAccordion">
                                            <input type="checkbox" name="mycategory[]" value="{{ $mcategory->id }}" />
                                            <section>
                                                <span>
                                                    <img src="{{asset('/assets/images/categoriesIcon/1.png') }}"
                                                        alt="categoriy" />
                                                </span>
                                                <h6>{{ $mcategory->title  }}</h6>
                                            </section>
                                            <div class="allListBelow">
                                                <ul>
                                                    @foreach($allcategories[$key]['childcategories'] as $skey =>
                                                    $childcat)
                                                    <li><span><input type="checkbox" name="mycategory[]"
                                                                value="{{ $childcat->id }}" /><b></b></span>
                                                        {{ $childcat->title }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="submItCategory">
                                    <button id="choosed-category">Submit</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
$(document).on('click', '#choosed-category', function(e) {
    var val = [];
    $(':checkbox:checked').each(function(i) {
        val[i] = $(this).val();
    });
    e.preventDefault();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        url: '{{ route("partner.selected-categories") }}',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        dataType: "json",
        data: {
            data: val
        },
        success: function(response) {
            $('.selectYourCategory').css('display', 'none');
            window.location = '{{ route("partner.dashboard") }}';
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle errors appropriately
        }
    });
})
</script>
@endsection
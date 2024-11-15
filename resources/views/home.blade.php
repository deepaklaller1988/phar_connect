@extends('layouts.app')

@section('content')

<div class="midContainer">
    <div class="bannerSet">
        <section class="regular slider">
            @foreach($data['sliders'] as $slider)
            <div>
                <img src="{{ asset('storage/'.$slider->image)}}" alt="slider">
                <div class="bannerInner">
                    <div class="wrapper">
                        <section>
                            <div class="textPanel">
                                {!! $slider->description !!}
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
        <div class="searchOptions">
            <div class="wrapper">
                <form action="" id="myform" method="post">
                    @csrf
                    <div class="searchOptionsInner">
                        <div class="searchSet">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input type="text" id="category_search" placeholder="Search Category Here..."
                                autocomplete="off" />
                            <input type="hidden" name="category" value="" id="hidden_selected-category">
                        </div>
                        <div id="category_search_result" style="display: none;">

                        </div>
                        <div class="searchSet countrySet">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <input type="text" id="country_search" placeholder="Search Country Here..."
                                autocomplete="off" />
                            <input type="hidden" name="country" value="" id="hidden_selected-country">
                        </div>
                        <div id="country_search_result" style="display: none;">

                        </div>
                        <button>ENTER</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="pharmCategory categoriesAll">
        <div class="wrapper">
            <div class="headerTitle">
                <h3>CATEGORIES</h3>
                <p>See full sub categories inside</p>
            </div>
            <div class="pharmCategoryInner">
                <section class="center slider">
                    @foreach($data['categories'] as $category)
                    <div>
                        <a href="{{ url('category',$category->slug) }}">
                            <span><img src="{{ url('storage/'.$category->image) }}" alt="categoriy" /></span>
                            <h4>{{ $category->title}}</h4>
                            <b>Learn More</b>
                        </a>
                    </div>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
    <div class="calltoAction">
        <div class="wrapper">
            <div class="callActionInner">
                <div class="callLeft">
                    <h3>Share your services, events and
                        jobs with a global community . </h3>
                    <a href="{{ route('partner.register') }}">BECOME A PARTNER</a>
                </div>
                <div class="callLeft">
                    <img src="{{asset('/assets/images/media.png') }}" alt="call to action" />
                </div>
            </div>
        </div>
    </div>
    <div class="pharmCategory pharmPartnersLogo">
        <div class="wrapper">
            @if($data['featured_partners'])
            <div class="headerTitle">
                <h3>FEATURED</h3>
                <p>Explore features of pharma</p>
            </div>
            @endif
            <div class="pharmCategoryInner">
                @if($data['featured_partners'])
                <div class="innerDifferentSection">
                    <h4>Partners/Services</h4>
                    <section class="center slider">
                        @foreach($data['featured_partners'] as $featured_partner)
                        @if($featured_partner->logo == '')
                        <div>
                            <h6>{{ $featured_partner->company_name }}</h6>
                        </div>
                        @else
                        <div>
                            <img src="{{asset('storage/'.$featured_partner->logo) }}" alt="logo" />
                        </div>
                        @endif
                        @endforeach
                    </section>
                </div>
                @endif
                <div class="innerDifferentSection">
                    <h4>Meet the Experts</h4>
                    <section class="center slider">
                        <div>
                            <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                        </div>
                    </section>
                </div>
                <div class="innerDifferentSection">
                    <h4>Upcoming Events</h4>
                    <section class="center slider">
                        <div>
                            <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                        </div>
                        <div>
                            <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
function partnerFunction() {
    var element = document.getElementById("partnerOption");
    element.classList.toggle("openPartnerOption");
}
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 150) {
        $("header").addClass("fixHeader");
    } else {
        $("header").removeClass("fixHeader");
    }
});
</script>

<script type="text/javascript">

$(document).ready(function() {
    $(document).on('click', '#myform button', function() {
        var csearch = $('#category_search').val();
        var cnsearch = $('#country_search').val();
        if ((csearch == '') && (cnsearch == '')) {
            return false;
        }
    });
    $(document).on('keyup', '#category_search', function() {
        var query = $(this).val();
        var myLength = $(this).val().length;
        if (myLength > 2) {
            $.ajax({
                url: "{{ route('search') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {

                    $('#category_search_result').empty();
                    $('#category_search_result').css('display', 'block');
                    $html =
                        '<select id="selected-category" class="form-select" size="8"aria-label="Default select example">';
                    $html += '<option value="">Select Category</option>';
                    $.each(data, function(index, item) {
                        $html += '<option data-slug="' + item.slug + '" value="' +
                            item.id + '">' + item.title + '</option>';
                    });
                    $html += '</select>';
                    $('#category_search_result').append($html);
                }
            });
        } else {
            $('#category_search_result').css('display', 'none');
        }
    })

    $(document).on('keyup', '#country_search', function() {
        var query = $(this).val();
        var myLength = $(this).val().length;
        if (myLength > 2) {
            $.ajax({
                url: "{{ route('country-search') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {

                    $('#country_search_result').empty();
                    $('#country_search_result').css('display', 'block');
                    $html =
                        '<select id="selected-country" size="8" class="form-select" aria-label="Default select example">';
                    $html += '<option value="">Select Country</option>';
                    $.each(data, function(index, item) {
                        $html += '<option data-slug="' + item.abbreviation +
                            '" value="' + item.id + '">' + item.country_name +
                            '</option>';
                    });
                    $html += '</select>';
                    $('#country_search_result').append($html);
                }
            });
        } else {
            $('#country_search_result').css('display', 'none');
        }
    })

    $(document).on('change', '#selected-country', function() {
        var base_url = window.location.pathname;;
        var country_id = $(this).val();
        var country = $(this).find(':selected').text();
        var slug = $(this).find(':selected').data('slug');
        var formaction = $("#myform").attr('action');
        if (formaction) {
            $("#myform").attr('action', formaction + '/' + slug);
        } else {
            $("#myform").attr('action', base_url + 'search-posts/' + slug);
        }
        $('#country_search').val(country);
        $('#country_search_result').empty();
        $('#country_search_result').css('display', 'none');
        $('#hidden_selected-country').val(country_id);
    });

    $(document).on('change', '#selected-category', function() {
        var base_url = window.location.pathname;
        var category_id = $(this).val();
        var category = $(this).find(':selected').text();
        var slug = $(this).find(':selected').data('slug');
        var url = $("#myform").attr('action');
        $("#myform").attr('action', base_url + 'search-posts/' + slug);
        $('#category_search').val(category);
        $('#category_search_result').empty();
        $('#category_search_result').css('display', 'none');
        $('#hidden_selected-category').val(category_id);
    });
});

$(document).on('click', '#cancel-cat-popup', function() {
    $('.selectYourCategory').css('display', 'none');
})

$('#myform').on('submit', function(event) {
    if ($(this).attr('action') === '') {
        return false;
    }
});
</script>
@endpush
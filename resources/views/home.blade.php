@extends('layouts.app')

@section('content')
<div class="midContainer">
<div class="selectMembership">


<!-- partial -->
</div>
@php
if(Auth::check()){
  if(auth()->user()->plan_id  <> NULL && auth()->user()->category_ids == NULL){
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
      <h6>WELCOME {{ Auth::user()->name }}</h6>
      <p>Choose a category you want to display on your feed.</p>
      <span>Selcted <b>5</b></span>
</div>
      <ul>
      @foreach($allcategories['maincategories'] as $key => $mcategory)
        <li>
          <div class="catgeroyAccordion">
            <input type="checkbox"/>
            <section>
              <span>
                <img src="{{asset('/assets/images/categoriesIcon/1.png') }}" alt="categoriy" />
              </span>
              <h6>{{ $mcategory->title  }}</h6>
            </section>
            <div class="allListBelow">
              <ul>
              @foreach($allcategories[$key]['childcategories'] as $skey => $childcat)
                <li><span><input type="checkbox"/><b></b></span> {{ $childcat->title }}</li>
              @endforeach
            </ul>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
      <div class="submItCategory">
      <button>Submit</button>
</div>
    </div>
  </div>
      <div class="bannerSet">
        <section class="regular slider">
          <div>
            <img src="{{asset('/assets/images/slider/1.jpg')}}" alt="slider">
            <div class="bannerInner">
              <div class="wrapper">
                <section>
                  <div class="textPanel">
                    <h1>YOUR GATEWAY</h1>
                    <p>to Connecting Pharma & Biotech Excellence. You are
                      focused on the big biological question and are poised
                      to dramatically change millions of lives for the better.</p>
                  </div>
                </section>
              </div>
            </div>
          </div>
          <div>
            <img src="{{asset('/assets/images/slider/2.jpg')}}" alt="slider">
            <div class="bannerInner">
              <div class="wrapper">
                <section>
                  <div class="textPanel">
                    <h1>YOUR GATEWAY</h1>
                    <p>to Connecting Pharma & Biotech Excellence. You are
                      focused on the big biological question and are poised
                      to dramatically change millions of lives for the better.</p>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </section>
        <div class="searchOptions">
          <div class="wrapper">
            <form action="" id="myform" method="post">
              @csrf
              <div class="searchOptionsInner">
                <div class="searchSet">
                  <i class="fa fa-search" aria-hidden="true"></i>
                  <input type="text" id="category_search" placeholder="Search Category Here..." />
                  <input type="hidden" name="category" value="" id="hidden_selected-category">
                </div>
                <div id="category_search_result" style="display: none;">
                 
                </div>
                <div class="searchSet countrySet">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <input type="text" id="country_search" placeholder="Search Country Here..." />
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
          <div class="headerTitle">
            <h3>FEATURED</h3>
            <p>Explore features of pharma</p>
          </div>
          <div class="pharmCategoryInner">
            <div class="innerDifferentSection">
              <h4>Partners/Services</h4>
              <section class="center slider">
                @foreach($data['featured_partners'] as $featured_partner)
                @if($featured_partner->logo == '')
                <div>
                <h6>{{ $featured_partner->name }}</h6>
                </div>
                @else
                <div>
                  <img src="{{asset('storage/'.$featured_partner->logo) }}" alt="logo" />
                </div>
                @endif
                @endforeach
              </section>
            </div>
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
    } 
    else {
        $("header").removeClass("fixHeader");
    }
});

  </script>

<script type="text/javascript">
    $(document).on('ready', function () {
      $(".regular").slick({
        dots: true,
        prevArrow: false,
        nextArrow: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
      });
      $(".center").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 5000,
      });
    });

    $(document).ready(function () {
      $(document).on('keyup', '#category_search', function () {
        var query = $(this).val();
        var myLength = $(this).val().length;
        if(myLength > 3){
          $.ajax({
                url: "{{ route('search') }}",
                type: "GET",
                data: {'query': query},
                success: function(data){
                  
                    $('#category_search_result').empty();
                    $('#category_search_result').css('display', 'block');
                    $html = '<select id="selected-category" class="form-select" size="8"aria-label="Default select example">';
                    $html += '<option value="">Select Category</option>';
                    $.each(data, function(index, item){
                          $html += '<option data-slug="' + item.slug + '" value="' + item.id + '">' + item.title + '</option>';
                    });
                    $html += '</select>';
                    $('#category_search_result').append($html);
                }
            });
        }else{
          $('#category_search_result').empty();
        }
      })

      $(document).on('keyup', '#country_search', function () {
        var query = $(this).val();
        var myLength = $(this).val().length;
        if(myLength > 2){
          $.ajax({
                url: "{{ route('country-search') }}",
                type: "GET",
                data: {'query': query},
                success: function(data){
                  
                    $('#country_search_result').empty();
                    $('#country_search_result').css('display', 'block');
                    $html = '<select id="selected-country" size="8" class="form-select" aria-label="Default select example">';
                    $html += '<option value="">Select Country</option>';
                    $.each(data, function(index, item){
                          $html += '<option data-slug="' + item.abbreviation + '" value="' + item.id + '">' + item.country_name + '</option>';
                    });
                    $html += '</select>';
                    $('#country_search_result').append($html);
                }
            });
        }else{
          $('#country_search_result').empty();
        }
      })

      $(document).on('change', '#selected-country', function () {
        var country_id = $(this).val();
        var country = $(this).find(':selected').text();
        var slug = $(this).find(':selected').data('slug');
        var formaction = $("#myform").attr('action');
        if(formaction){
            $("#myform").attr('action', formaction+'/'+slug);
        }else{
          $("#myform").attr('action', '/search-posts/'+slug);
        }
        
        $('#country_search').val(country);
        $('#country_search_result').empty();
        $('#country_search_result').css('display', 'none');
        $('#hidden_selected-country').val(country_id);
      });

      $(document).on('change', '#selected-category', function () {
        var category_id = $(this).val();
        var category = $(this).find(':selected').text();
        var slug = $(this).find(':selected').data('slug');
        var url = $("#myform").attr('action');
        $("#myform").attr('action', '/search-posts/'+slug);
        $('#category_search').val(category);
        $('#category_search_result').empty();
        $('#category_search_result').css('display', 'none');
        $('#hidden_selected-category').val(category_id);
      });
    });
  </script>
@endpush
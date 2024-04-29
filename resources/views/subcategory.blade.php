@extends('layouts.app')
@section('content')

<div class="midContainer">
    <div class="categoryTabs">
        <div class="wrapper">
            <div class="categoryTabsInner">
                @foreach($allcategories['maincategories'] as $key => $mcategory)
                <a href="{{ route('category',$mcategory->slug)}}"
                    class="{{ $mcategory->id == $prnt ? 'activeCategory' : ''}}">{{ $mcategory->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="filtersCategory-Hub">
        <div class="wrapper">
            <div class="filtersCategory-Inner">
                <div class="leftSidebar">
                    <h4>Filters {{ $cat }} </h4>
                    <section>
                        <div class="search-criteria">
                            <span>
                                <h5>Search By Country</h5>
                                <select name="" id="country_search" placeholder="Country name here...">
                                    <option>Choose Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}" data-slug="{{ $country->abbreviation }}">{{ $country->country_name }}</option>
                                    @endforeach
                                 </select>
                            </span>
                            <span>
                                <h5>Search By Category</h5>
                                <div>
                                    <input id="category_search" placeholder="Category name here..." type="text">
                                    <button><img src="{{ asset('assets/images/search.png') }}" alt="search" /></button>
                                </div>
                                <div id="category_search_result" style="display: none;">

                                </div>
                            </span>
                        </div>
                        <div class="searchCategories" id="sidebar">
                            <ul>
                                @foreach($categories['maincategories'] as $mkey => $mcategory)
                                <li class="">
                                @if(count($categories[$mkey]['subcategories']) > 0)
                                    <span>
                                        {{ $mcategory->title }}
                                    </span>
                                    @else
                                    <a class="myCategory" href="{{ route('subcategory',$mcategory->slug) }}">
                                        {{ $mcategory->title }}
                                    </a>
                                    @endif
                                    @if(count($categories[$mkey]['subcategories']) > 0)
                                    <div class="searchSubCategory">
                                        @foreach($categories[$mkey]['subcategories'] as $skey => $scategory)
                                        <div>
                                            <a
                                                href="{{ route('subcategory',$scategory->slug) }}">{{ $scategory->title }}</a>
                                            <ul>
                                                @foreach($categories[$mkey][$skey]['childcategory'] as $ckey =>
                                                $ccategory)
                                                <li><a
                                                        href="{{ route('categorydetails',$ccategory->slug) }}">{{ $ccategory->title }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="rightCategories">
                    <p>Manufacturers / Drug Substance / Advanced / Cell and Gene Therapy</p>
                    <section>
                        <ul>
                            @foreach($data['categories'] as $category )
                            <li>
                                <a href="{{ route('subcategory',$category->slug) }}">
                                    <span>
                                        <img src="{{ url('storage/'.$category->image) }}" alt="ategories" />
                                    </span>
                                    <b>{{ $category->title }}</b>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </section>
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
<script>
$(document).on('click', '#sidebar li', function() {
    $(this).toggleClass('activeSidebarCategory');
});

$(document).on('keyup', '#category_search', function () {
        var query = $(this).val();
        var cat_id = {{ $prnt }};
        var myLength = $(this).val().length;
        if(myLength > 2){
          $.ajax({
                url: "{{ route('search') }}",
                type: "GET",
                data: {'query': query,'cate_id':cat_id},
                success: function(data){
                    $('#category_search_result').empty();      
                    $('#category_search_result').show();
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
      });

      $(document).on('change', '#selected-category', function() {
        var slug = $(this).find(':selected').data('slug');
        $('#category_search_result').hide();
        window.location.href = "{{ url('search-posts') }}"+'/'+slug;
      })

      $(document).on('change', '#country_search', function() {
        var slug = $(this).find(':selected').data('slug');
        window.location.href = "{{ url('search-posts') }}"+"/"+slug;
      })
</script>
@endsection
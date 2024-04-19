@extends('layouts.app')
@section('content')

<div class="midContainer">
    <div class="categoryTabs">
        <div class="wrapper">
            <div class="categoryTabsInner">
                <a href="" class="activeCategory">Business Offerings</a>
                <a href="">Consulting Services</a>
                <a href="">Events/Conferences</a>
                <a href="">Health Authority Sites</a>
                <a href="">Jobs</a>
            </div>
        </div>
    </div>
    <div class="filtersCategory-Hub">
        <div class="wrapper">
            <div class="filtersCategory-Inner">
                <div class="leftSidebar">
                    <h4>Filters Business Offerings</h4>
                    <section>
                        <div class="search-criteria">
                            <span>
                                <h5>Search By Category</h5>
                                <select placeholder="Country name here...">
                                    <option>America</option>
                                </select>
                            </span>
                            <span>
                                <h5>Search By Category</h5>
                                <div>
                                    <input placeholder="Category name here..." type="text">
                                    <button><img src="{{ asset('assets/images/search.png') }}" alt="search" /></button>
                                </div>
                            </span>
                        </div>
                        <div class="searchCategories" id="sidebar">
                            <ul>
                                @foreach($categories['maincategories'] as $mkey => $mcategory)
                                <li class="">
                                    <span>
                                        {{ $mcategory->title }}
                                    </span>
                                    @if(count($categories[$mkey]['subcategories']) > 0)
                                    <div class="searchSubCategory">
                                        @foreach($categories[$mkey]['subcategories'] as $skey => $scategory)
                                        <div>
                                            <a href="{{ route('subcategory',$scategory->id) }}">{{ $scategory->title }}</a>
                                            <ul>
                                                @foreach($categories[$mkey][$skey]['childcategory'] as $ckey => $ccategory)
                                                <li><a href="{{ route('categorydetails',['id' => $scategory->id]) }}">{{ $ccategory->title }}</a></li>
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
                                <a href="{{ route('categorydetails',['id'=>$category->id]) }}">
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
    $(document).on('click','#sidebar li', function(){
        $(this).toggleClass('activeSidebarCategory');
    });
</script>
@endsection
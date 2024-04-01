 @extends('layouts.app')
 @section('content')

        <div class="midContainer">
            <div class="categoryTabs">
                <div class="wrapper">
                    <div class="categoryTabsInner">
                        <a href="" class="activeCategory">Business Offerings</a>
                        <a href="">Consulting Services</a>
                        <a href="">Events/Conferences</a>
                        <a href="">Health Authority Sites</a
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
                                            <button><img src="assetsassets./images/search.png" alt="search" /></button>
                                        </div>
                                    </span>
                                </div>
                                <div class="searchCategories">
                                    <ul>
                                        <li class="activeSidebarCategory">
                                            <span>
                                                Manufacturers
                                            </span>
                                            <div class="searchSubCategory">
                                                <div>
                                                    <a href="">Drug Substance</a>
                                                    <ul>
                                                        <li><a href="">Advanced/Cell and Gene Therapy</a></li>
                                                        <li><a href="">Biologics/Large Molecules</a></li>
                                                        <li><a href="">Chemical Entities</a></li>
                                                        <li><a href="">Novel Modalities</a></li>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <a href="">Drug Product</a>
                                                </div>
                                                <div>
                                                    <a href="">Fill Finish</a>
                                                </div>
                                                <div>
                                                    <a href="">Drug Product</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span>
                                                Manufacturers
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                Manufacturers
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                Manufacturers
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                Manufacturers
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="rightCategories">
                            <p>Manufacturers / Drug Substance / Advanced/Cell and Gene Therapy</p>
                            <section>
                                <ul>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
                                    <li><a href=""><span><img src="assets/images/allcategories/1.jpg"
                                                    alt="ategories" /></span><b>Cell and Gene Therapy</b></a></li>
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
 @endsection
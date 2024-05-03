@extends('layouts.app')
@section('content')
<style>
.item-category {
    display: none;
}
</style>

<div class="midContainer">
    <div class="bannerSet bannerSetcategory">
        <div class="wrapper">

            <h4>Welcome to {{ isset( auth()->user()->name)  ? auth()->user()->name : ' Guest'}}, where expertise meet
                opportunity.</h4>
            <p>Our goal is to revolutionize how services and industries integral to all aspects of drug development and
                commercialization
                connect and collaborate with Biotechnology and Pharmaceutical companies.</p>
            <p>Our platform facilitates seamless connections, powering a revolution in drug development and
                commercialization
                by providing
                a single global platform connecting diverse array of service providers and experts.</p>
            <p>Join us as we shape the future of drug development and commercialization, one connection at a time.</p>
        </div>
    </div>
    <div class="pharmCategory categoriesAll catgorySetsAll">
        <div class="wrapper">
            <div class="pharmCategoryInner">
                <section class="categorySet">
                    @php $count = 0; @endphp
                    @foreach($data['categories'] as $category)
                    @php $count++; @endphp
                    <div class=" @if($count > 9) item-category @endif">
                        <a href="{{ url('subcategory',$category->slug) }}">
                            <span><img src="{{ url('storage/'.$category->image) }}" alt="categoriy" /></span>
                            <h4>{{ $category->title}}</h4>
                            <b>Learn More</b>
                        </a>
                    </div>
                    @endforeach
                    @if(count($data['categories']) > 9)
                    <div id="all_categories">  
                        <a href="javacript:void(0)" class="allcategoryShow">
                            <b>View All</b>
                        </a>
                    </div>
                    @endif
                </section>
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
        </section>
    </div>
</div>
</div>

</div>
<script>
$(document).ready(function() {
    $(".allcategoryShow").click(function() {
        $(".item-category").show();
        $("#all_categories").hide();
    });
})
</script>

@endsection
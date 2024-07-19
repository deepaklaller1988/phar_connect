@extends('layouts.app')

@section('content')

<section class="plans__container">
    <div class="plans">
        <div class="plansHero">
            <h1 class="plansHero__title">Simple, transparent pricing</h1>
            <p class="plansHero__subtitle">No contracts. No suprise fees.</p>
        </div>
        <div class="planItem__container">
            @foreach($plans as $plan)
            <!--free plan starts -->
            <div class="planItem planItem--free">

                <div class="card">
                    <div class="card__header">
                        <div class="card__icon symbol symbol--rounded"></div>
                        <h2>{{ $plan->title}}</h2>
                    </div>
                    <div class="card__desc"></div>
                </div>

                <div class="price"><b>$</b>{{ $plan->amount}}<span>/ month</span></div>
                <div class=""><b>Number of Country:</b>{{$plan->number_of_country}}</div>

                <div class="featureList">
                {!! $plan->description !!}
                </div>

                <button class="button" id="payment" data-id="{{ $plan->id }}">Get Started</button>
            </div>
            @endforeach
            <!--free plan ends -->

        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $(document).on('click', '#payment', function(){
            var id = $(this).data('id');
            window.location.href = "{{ url('paypal/payment/') }}" + "/" + id;
        })
    });
</script>
@endsection
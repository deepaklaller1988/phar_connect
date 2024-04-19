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
          <div class="card__desc">{{ $plan->description}}</div>
        </div>

        <div class="price">{{ $plan->amount}}<span>/ month</span></div>

        <ul class="featureList">
          <li>2 links</li>
          <li>Own analytics platform</li>
          <li class="disabled">Chat support</li>
          <li class="disabled">Mobile application</li>
          <li class="disabled">Unlimited users</li>
        </ul>

        <button class="button">Get Started</button>
      </div>
      @endforeach
      <!--free plan ends -->

    </div>
  </div>
</section>

@endsection
@extends('layouts.app')

@section('content')
<div class="container loginRegister partnerSection">

    <div class="partnerSectionHead">
        <div class="wrapper">
            <section>
                <h4>Partner With Us!</h4>
                <p>PharmConect builds solutions at the intersection of innovation and flexibility. Partner with our
                    global team.</p>
            </section>
        </div>
    </div>
    <div class="wrapper">
        <div class="partnerSectionHub">
            <div class="row justify-content-center  partnerLeftCollumn">
                <div class="col-md-8">
                    <div class="card">
                        <!-- <div class="card-header headerBG-register">{{ __('Register') }}</div> -->

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                <div class="flexSet">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Name') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="number" type="number"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{ old('phone') }}" required autocomplete="phone">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <input type="hidden" name="type" value="0">
                                </div>
                                <div class="row mb-0 width100Set">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="partnerRightCollumn">
                <h5>PharmConnect has the bespoke solutions to your business’s complex challenges.</h5>
                <p>We partner with pharmaceutical, biotechnology, and medical device clients to inspire the future of
                    science to deliver the technologies, medicines, and therapies to improve patient health and safety.

                    Contact us to learn how our experienced team can help ensure regulatory and development success
                    throughout the product lifecycle.</p>
            </div>
        </div>
    </div>
</div>
@endsection
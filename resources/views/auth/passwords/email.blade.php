@extends('layouts.app')

@section('content')
<div class="container loginRegister partnerSection">
    <div class="partnerSectionHead">
        <div class="wrapper">
            <section>
                <h4>Forgot Password!</h4>
                <p>PharmConect builds solutions at the intersection of innovation and flexibility. Partner with our
                    global team.</p>
            </section>
        </div>
    </div>
    <div class="wrapper">
        <div class="partnerSectionHub">
            <div class="row justify-content-center partnerLeftCollumn">
                <div class="col-md-8">
                    <div class="card">
                        <!-- <div class="card-header headerBG-register">{{ __('Reset Password') }}</div> -->

                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form  class="loginFields"  method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0 width100Set">
                                    <div class="col-md-8 width100 offset-md-4">
                                        <button type="submit" class="btn btn-primary sendLink">
                                            {{ __('Send Password Reset Link') }}
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
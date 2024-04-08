@extends('layouts.app')

@section('content')
<div class="container loginRegister">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header headerBG-register">{{ __('Partner With Us!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        <div class="flexSet"
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Contact Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Company Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control " name="phone" value="{{ old('phone') }}" >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="company_website" class="col-md-4 col-form-label text-md-end">{{ __('Company Website') }}</label>

                            <div class="col-md-6">
                                <input id="company_website" type="text" class="form-control @error('company_website') is-invalid @enderror" name="company_website" value="{{ old('company_website') }}" required autocomplete="company_website" autofocus>

                                @error('company_website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">Location (If Applicable)</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" autocomplete="location" autofocus>

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="key_services" class="col-md-4 col-form-label text-md-end">Key Services</label>

                            <div class="col-md-6">
                                <input id="key_services" type="text" class="form-control" name="key_services" value="{{ old('key_services') }}" autocomplete="key_services" autofocus>

                                @error('key_services')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div></div>
                        <div class="row mb-3  width100Set">
                            <label for="certifications" class="col-md-4 col-form-label text-md-end">Certifications</label>

                            <div class="col-md-6 attachmentsSet">
                                <input id="certifications" type="text" class="form-control" name="certifications" value="{{ old('certifications') }}" autocomplete="certifications" >
<p><img src="{{asset('/assets/images/adobe.png')}}" alt="img"> Adobe.pdf</p>
                                <section><input type="file"/> Upload</section>
                                @error('certifications')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="type" value="2">
                        <div class="row mb-3 width100Set">
                            <label for="company_profile" class="col-md-4 col-form-label text-md-end">{{ __('Company Profile') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="company_profile" maxlength="300" placeholder="add company description around 300 word"></textarea>
                                @error('company_profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0  width100Set">
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
</div>  
@endsection

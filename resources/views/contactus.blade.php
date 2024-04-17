@extends('layouts.app')

@section('content')
<div class="staticContent">
    <div class="wrapper">
        <div class="staticPages">
            <div class="contactForm">
                <div class="card-header headerBG-register">Contact Us</div>
                @if(session('error'))
                <div class="card">
                    <div class="card-header">
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    </div>
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="contactFormInner">
                    <form action="{{ route('store.contact-us') }}" method="POST">
                        @csrf
                        <section>
                            <label>Name<span class="text-danger">*</span></label>
                            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" />
                            @error('full_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </section>
                        <section>
                            <label>Email<span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" />
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </section>
                        <section>
                            <label>Mobile No<span class="text-danger">*</span></label>
                            <input type="number" id="phone" name="phone" value="{{ old('phone') }}" />
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </section>
                        <section>
                            <label>Desciption<span class="text-danger">*</span></label>
                            <textarea id="messages" name="messages" rows="5"
                                placeholder="Minimum 100 letters"></textarea>
                            @error('messages')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </section>
                        <section>
                            <input type="submit" value="submit" />
                        </section>
                    </form>
                    <div class="contactAdress">
                        <h6>Contact Infomation</h6>
                        <section>
                            {!! $contactus[0]->contact_info !!}
                            </setion>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- <div class="container loginRegister">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header headerBG-register">{{ __('Partner With Us!') }}</div> -->

<div class="card-body-one">
    <form method="POST" action="{{ route('register') }}">
        <div class="flexSet">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}<span
                        class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="last-name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                <div class="col-md-6">
                    <input id="last-name" type="text" class="form-control" name="last_name"
                        value="{{ old('lats_name') }}" autocomplete="last-name" autofocus>
                </div>
            </div>
            <div class="row mb-3 width100Set">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}<span
                        class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}<span
                        class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="company-name" class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}<span
                        class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="company-name" type="text"
                        class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                        value="{{ old('company_name') }}" required autocomplete="company-name" autofocus>

                    @error('company_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="event-name" class="col-md-4 col-form-label text-md-end">{{ __('Event Name') }}<span
                        class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="event-name" type="text" class="form-control @error('event_name') is-invalid @enderror"
                        name="event_name" value="{{ old('event_name') }}" required autocomplete="event-name" autofocus>

                    @error('event_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="start-date" class="col-md-4 col-form-label text-md-end">{{ __('Start Date') }}</label>

                <div class="col-md-6">
                    <input id="start-date" type="date" class="form-control" name="start_date"
                        value="{{ old('start_date') }}" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="end-date" class="col-md-4 col-form-label text-md-end">{{ __('End Date') }}</label>

                <div class="col-md-6">
                    <input id="end-date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}"
                        autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="agenda" class="col-md-4 col-form-label text-md-end">{{ __('Agenda') }}</label>

                <div class="col-md-6">
                    <input id="agenda" type="text" class="form-control" name="agenda" value="{{ old('agenda') }}"
                        autocomplete="agenda" id="agenda" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}<span
                        class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input type="text" id="phone" class="form-control " name="phone" value="{{ old('phone') }}"
                        pattern="[789][0-9]{9}" required>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="company_website"
                    class="col-md-4 col-form-label text-md-end">{{ __('Company Website') }}<span
                        class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="company_website" type="text"
                        class="form-control @error('company_website') is-invalid @enderror" name="company_website"
                        value="{{ old('company_website') }}" required autocomplete="company_website"
                        id="company_website" autofocus>

                    @error('company_website')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="linkedin-pfofile"
                    class="col-md-4 col-form-label text-md-end">{{ __('Linkedin Profile') }}</label>

                <div class="col-md-6">
                    <input id="linkedin-pfofile" type="text" class="form-control" name="linkedin_profile"
                        value="{{ old('linkedin_profile') }}" autocomplete="linkedin-pfofile" id="linkedin-pfofile"
                        autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="twiter-profile"
                    class="col-md-4 col-form-label text-md-end">{{ __('Twiter Profile') }}</label>

                <div class="col-md-6">
                    <input id="twiter-profile" type="text" class="form-control" name="twiter_profile"
                        value="{{ old('twiter_profile') }}" autocomplete="twiter-profile" id="twiter-profile" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Location') }}<span
                        class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror"
                        name="location" value="{{ old('location') }}" required autocomplete="location" id="location"
                        autofocus>
                    @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}<span
                    class="text-danger">*</span></label>
                <div class="common_input mb_15">
                    <div class="col-md-6">
                        <select class="form-select col-sm-12 selectpicker select2" id="multiselect" name="country_id[]"
                            multiple="multiple" required>
                            @foreach ($data['countries'] as $country)
                            <option value="{{$country->id}}">{{$country->country_name}}
                            </option>
                            @endforeach
                        </select>
                        @error('country_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <input type="hidden" name="category_ids[]" id="parent_id" value="{{ $data['parent_id']}}">
            <div class="row mb-3 subCategories" id="subcategory_div">
                <label for="sub_category" class="col-md-4 col-form-label text-md-end">{{ __('Sub Category') }}<span
                        class="text-danger">*</span></label>
                <div class="col-md-6">
                    @foreach($data['subcategories'] as $subcategory)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="subcategory_{{ $subcategory['id'] }}"
                            name="category_ids[]" value="{{ $subcategory['id'] }}">
                        <label class="form-check-label"
                            for="subcategory_{{ $subcategory['id'] }}">{{ $subcategory['title'] }}</label>
                    </div>
                    @endforeach
                    @error('category_ids')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <input type="hidden" name="type" value="2">
        <div class="row mb-3 width100Set">
            <label for="company_profile" class="col-md-4 col-form-label text-md-end">{{ __('Company Profile') }}<span
                    class="text-danger">*</span></label>
            <div class="col-md-6">
                <textarea class="form-control" required name="company_profile" maxlength="300"
                    placeholder="add company description around 300 word"
                    id="company_profile">{{ old('company_profile') }}</textarea>
                @error('company_profile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3 width100Set">
            <label for="representatives"
                class="col-md-4 col-form-label text-md-end">{{ __('Representative(s)') }}</label>
            <div class="col-md-6">
                <textarea class="form-control" name="representatives" maxlength="300" placeholder=""
                    id="representatives">{{ old('representative') }}</textarea>
                @error('representatives')
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
<!-- </div>
        </div>
    </div>
</div> -->
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<script>
$(document).ready(function() {
    $(document).on('focusout', '#email', function() {
        var email = $(this).val();
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(email)) {
            $('#email').after(
                '<span class="invalid-feedback" role="alert"><strong>Please enter a valid email address</strong></span>'
            );
        }
        setTimeout(function() {
            $('.invalid-feedback').remove();
        }, 2000);
    });

    $(document).on('focusout', '#password', function() {
        var password = $(this).val();
        if (password.length < 8) {
            $('#password').after(
                '<span class="invalid-feedback" role="alert"><strong>Password length must be greater than 8 </strong></span>'
            );
        }
        setTimeout(function() {
            $('.invalid-feedback').remove();
        }, 2000);
    });

    $(document).on('focusout', '#password-confirm', function() {
        var password = $(this).val();
        var password_confirm = $('#password').val();
        if (password != password_confirm) {
            $('#password-confirm').after(
                '<span class="invalid-feedback" role="alert"><strong>Confirmed password does not match </strong></span>'
            );
        }
        setTimeout(function() {
            $('.invalid-feedback').remove();
        }, 2000);
    });

    $(document).on('focusout', '#phone', function() {
        var phoneNumber = $(this).val();
        var regex = /^\d{10}$/;
        if (!regex.test(phoneNumber)) {
            $('#phone').after(
                '<span class="invalid-feedback" role="alert"><strong>Enter a valid phone number </strong></span>'
            );
        }
        setTimeout(function() {
            $('.invalid-feedback').remove();
        }, 2000);
    });
    var errorAppended = false;
    $('#phone').keypress(function(event) {

        var charCode = (event.which) ? event.which : event.keyCode;
        if (charCode >= 48 && charCode <= 57 || charCode === 8 || charCode === 46) {

        } else {
            $('#phone').after(
                '<span class="invalid-feedback" role="alert"><strong>Numbers allowed only</strong></span>'
            );
            errorAppended = false;
        }

        setTimeout(function() {
            $('.invalid-feedback').remove();
        }, 1000);
    });
});
</script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script> -->
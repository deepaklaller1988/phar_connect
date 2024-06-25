@section('content')
<div class="card-body-one">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="industry">{{ __('Industry') }}<span class="text-danger">*</span></label>
            <input id="industry" type="text" class="form-control @error('industry') is-invalid @enderror"
                name="industry" value="{{ old('industry') }}" autocomplete="industry" autofocus>
            <span class="text-danger d-none" id="industry_error">Please Enter Industry</span>
            @error('industry')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="position-type">{{ __('Position Type') }}<span class="text-danger">*</span></label>
            <select class="form-select" id="position_type" name="position_type" required>
                <option value="">Select Position Type</option>
                @foreach($data['positions'] as $position_type)
                <option value="{{ $position_type->id }}">{{ $position_type->title }}</option>
                @endforeach
            </select>
            <span class="text-danger d-none" id="position_type_error">Please Select Position Type</span>
            @error('position_type')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="name">{{ __('Position Title') }}<span class="text-danger">*</span></label>
            <input id="name" type="text" class="form-control @error('position_title') is-invalid @enderror"
                name="position_title" value="{{ old('company_name') }}" required autofocus>
            <span class="text-danger d-none" id="position_title_error">Please Enter Position Title</span>
            @error('position_title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="education-level">{{ __('Education Level') }}<span class="text-danger">*</span></label>
            <select class="form-select" id="education_level" name="education_level" required>
                <option value="">Select Education Level</option>
                @foreach($data['educations'] as $education_level)
                <option value="{{ $education_level->id }}">{{ $education_level->title }}</option>
                @endforeach
            </select>
            <span class="text-danger d-none" id="education_level_error">Please Select Education Level</span>
            @error('education_level')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="experience-level">{{ __('Experience Level') }}<span class="text-danger">*</span></label>
            <select class="form-select" id="experience_level" name="experience_level" required>
                <option value="">Select Experience Level</option>
                @foreach($data['experiences'] as $experience_level)
                <option value="{{ $experience_level->id }}">{{ $experience_level->title }}</option>
                @endforeach
            </select>
            <span class="text-danger d-none" id="experience_level_error">Please Select Experience Level</span>
            @error('experience_level')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="company_website">{{ __('Company Website') }}<span class="text-danger">*</span></label>
            <input id="company_website" type="text" class="form-control @error('company_website') is-invalid @enderror"
                name="company_website" value="{{ old('company_website') }}" required autocomplete="company_website"
                id="company_website" autofocus>
            <span class="text-danger d-none" id="company_website_error">Please Enter a valid URL</span>
            @error('company_website')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="linkedin-pfofile">{{ __('Linkedin Profile') }}</label>
            <input id="linkedin-pfofile" type="text" class="form-control" name="linkedin_profile"
                value="{{ old('linkedin_profile') }}" autocomplete="linkedin-pfofile" id="linkedin-pfofile" autofocus>
        </div>
        <div class="col-md-6">
            <label for="twiter-profile">{{ __('Twiter Profile') }}</label>
            <input id="twiter-profile" type="text" class="form-control" name="twiter_profile"
                value="{{ old('twiter_profile') }}" autocomplete="twiter-profile" id="twiter-profile" autofocus>
        </div>
        <div class="col-md-6">
            <label for="location">{{ __('Location') }}<span class="text-danger">*</span></label>
            <input id="location" type="text" class="form-control @error('location') is-invalid @enderror"
                name="location" value="{{ old('location') }}" autocomplete="location" id="location" autofocus>
            <span class="text-danger d-none" id="location_error">Please Enter Location</span>
            @error('location')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <input type="hidden" name="category_ids[]" id="parent_id" value="{{ $data['parent_id']}}">
        <div class="col-md-6">
            <label for="company_profile" required>{{ __('Company Profile') }}<span class="text-danger">*</span></label>
            <textarea class="form-control" name="company_profile" maxlength="300"
                placeholder="add company description around 300 word"
                id="company_profile">{{ old('company_profile') }}</textarea>
            @error('company_profile')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="representatives">{{ __('Representatives') }}<span class="text-danger">*</span></label>
            <textarea class="form-control" name="representatives" maxlength="300" placeholder=""
                id="representatives">{{ old('representatives') }}</textarea>
            @error('representatives')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div id="subcategory_div">
            <div class="col-md-6">
                <label for="sub_category">{{ __('Category') }}<span class="text-danger">*</span>&nbsp; <span
                        class="text-danger d-none" id="cat_error">Please Select categories</span></label>
                @foreach($data['subcategories'] as $key=> $subcategory)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('category_ids') is-invalid @enderror"
                        id="subcategory_{{ $subcategory['id'] }}" name="category_ids[]"
                        value="{{ $subcategory['id'] }}">
                    <label class="form-check-label"
                        for="subcategory_{{ $subcategory['id'] }}">{{ $subcategory['title'] }}</label>
                    <div id="sub-cat-step-{{ $subcategory['id'] }}" style="display:none">
                        @if(!empty($data[$key]['childcategory']))
                        @foreach($data[$key]['childcategory'] as $skey => $childcategory)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input @error('category_ids') is-invalid @enderror"
                                id="subcategory_{{ $childcategory['id'] }}" name="category_ids[]"
                                value="{{ $childcategory['id'] }}">
                            <label class="form-check-label"
                                for="subcategory_{{ $childcategory['id'] }}">{{ $childcategory['title'] }}</label>
                            <div id="sub-cat-step-{{ $childcategory['id'] }}" style="display:none">
                                @if(!empty($data[$key][$skey]['grandchildcategory']))
                                @foreach($data[$key][$skey]['grandchildcategory'] as $ckey => $grandchildcategory)
                                <div class="form-check">
                                    <input type="checkbox"
                                        class="form-check-input @error('category_ids') is-invalid @enderror"
                                        id="subcategory_{{ $grandchildcategory['id'] }}" name="category_ids[]"
                                        value="{{ $grandchildcategory['id'] }}">
                                    <label class="form-check-label"
                                        for="subcategory_{{ $grandchildcategory['id'] }}">{{ $grandchildcategory['title'] }}</label>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
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
    <div class="row mb-0  width100Set">
        <div class="col-md-8 offset-md-4">
            <button type="submit" id="btn-sb" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</div>
<script>
$(document).on('click', '#btn-sb', function() {
    url = $('#company_website').val();
    var urlPattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-])\/?$/;
    if (!urlPattern.test(url)) {
        $('#company_website_error').removeClass('d-none');
        return false;
    }

    if ($('input[name="category_ids[]"]').is(':checked')) {
        return true;
    } else {
        $('#cat_error').removeClass('d-none');
        return false;
    }


    if ($('#location').val() == '') {
        $('#location_error').removeClass('d-none');
        return false;
    }

    if ($('#industry').val() == '') {
        $('#industry_error').removeClass('d-none');
        return false;
    }

    if ($('#position_type').val() == '') {
        $('#position_type_error').removeClass('d-none');
        return false;
    }

    if ($('position_title').val() == '') {
        $('#position_title_error').removeClass('d-none');
        return false;
    }
    if ($('#experience_level').val() == '') {
        $('#experience_level_error').removeClass('d-none');
        return false;
    }
});
</script>
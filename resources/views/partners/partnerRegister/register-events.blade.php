@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<div class="card-body-one">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="event-name">{{ __('Event Name') }}<span class="text-danger">*</span></label>
            <input id="event-name" type="text" class="form-control @error('event_name') is-invalid @enderror"
                name="event_name" value="{{ old('event_name') }}" autocomplete="event-name" >
            <span class="text-danger d-none" id="event-error">Please Enter Event Name</span>
            @error('event_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="start-date">{{ __('Start Date') }}</label>
            <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}"
                >
            <span class="text-danger d-none" id="start-error">Please Enter Start Date</span>
        </div>
        <div class="col-md-6">
            <label for="end-date">{{ __('End Date') }}</label>
            <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}"
                >
            <span class="text-danger d-none" id="end-error">Please Enter End Date</span>
        </div>
        <div class="col-md-6">
            <label for="agenda">{{ __('Agenda') }}</label>
            <input id="agenda" type="text" class="form-control" name="agenda" value="{{ old('agenda') }}"
                autocomplete="agenda" id="agenda" >
            <span class="text-danger d-none" id="agenda-error">Please Enter Agenda</span>
        </div>
        <div class="col-md-6">
            <label for="company_website">{{ __('Company Website') }}<span class="text-danger">*</span></label>
            <input id="company_website" type="text" class="form-control @error('company_website') is-invalid @enderror"
                name="company_website" value="{{ old('company_website') }}" required autocomplete="company_website"
                id="company_website" >
            <span class="text-danger d-none" id="company-error">Please Enter a valid URL</span>
            @error('company_website')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="linkedin-pfofile">{{ __('Linkedin Profile') }}</label>
            <input id="linkedin-pfofile" type="text" class="form-control" name="linkedin_profile"
                value="{{ old('linkedin_profile') }}" autocomplete="linkedin-pfofile" id="linkedin-pfofile" >
        </div>
        <div class="col-md-6">
            <label for="twiter-profile">{{ __('Twiter Profile') }}</label>
            <input id="twiter-profile" type="text" class="form-control" name="twiter_profile"
                value="{{ old('twiter_profile') }}" autocomplete="twiter-profile" id="twiter-profile" >
        </div>
        <div class="col-md-6">
            <label for="location">{{ __('Location') }}<span class="text-danger">*</span></label>
            <input id="location" type="text" class="form-control @error('location') is-invalid @enderror"
                name="location" value="{{ old('location') }}" required autocomplete="location" id="location" >
            <span class="d-none" id="location-error">Please Enter Location</span>
            @error('location')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="company_profile">{{ __('Company Profile') }}<span class="text-danger">*</span></label>
            <textarea class="form-control" required name="company_profile" maxlength="300"
                placeholder="add company description around 300 word"
                id="company_profile">{{ old('company_profile') }}</textarea>
            @error('company_profile')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="representatives">{{ __('Representative(s)') }}</label>
            <textarea class="form-control" name="representatives" maxlength="300" placeholder=""
                id="representatives">{{ old('representative') }}</textarea>
            @error('representatives')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <input type="hidden" name="category_ids[]" id="parent_id" value="{{ $data['parent_id']}}">
        <div id="subcategory_div">
        <div class="col-md-6">
            <label for="sub_category">{{ __('Category') }}<span class="text-danger">*</span>&nbsp; <span class="text-danger d-none" id="cat_error">Please Select categories</span></label>
            @foreach($data['subcategories'] as $key=> $subcategory)
            <div class="form-check">
                <input type="checkbox" class="form-check-input @error('category_ids') is-invalid @enderror"
                    id="subcategory_{{ $subcategory['id'] }}" name="category_ids[]" value="{{ $subcategory['id'] }}">
                <label class="form-check-label"
                    for="subcategory_{{ $subcategory['id'] }}">{{ $subcategory['title'] }}</label>
            </div>
            <div id="sub-cat-step-{{ $subcategory['id'] }}" style="display:none">
                @if(!empty($data[$key]['childcategory']))
                @foreach($data[$key]['childcategory'] as $skey => $childcategory)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('category_ids') is-invalid @enderror"
                        id="childcategory_{{ $childcategory['id'] }}" name="category_ids[]"
                        value="{{ $childcategory['id'] }}">
                    <label class="form-check-label"
                        for="subcategory_{{ $childcategory['id'] }}">{{ $childcategory['title'] }}</label>
                </div>
                <div id="sub-cat-step-{{ $childcategory['id'] }}" style="display:none">
                    @if(!empty($data[$key][$skey]['grandchildcategory']))
                    @foreach($data[$key][$skey]['grandchildcategory'] as $ckey => $grandchildcategory)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input @error('category_ids') is-invalid @enderror"
                            id="grandchildcategory_{{ $grandchildcategory['id'] }}" name="category_ids[]"
                            value="{{ $grandchildcategory['id'] }}">
                        <label class="form-check-label"
                            for="subcategory_{{ $grandchildcategory['id'] }}">{{ $grandchildcategory['title'] }}</label>
                    </div>
                    @endforeach
                    @endif
                </div>
                @endforeach
                @endif
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
            <button type="submit"   id="btn-sb" class="btn btn-primary">
                {{ __('Complete Profile') }}
            </button>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
// $("#start_date").flatpickr();
// $('#end_date').flatpickr();


$(document).on('click','#btn-sb',function(){
    url = $('#company_website').val();
    var urlPattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-])\/?$/;
    if (!urlPattern.test(url)) {
        $('#company-error').removeClass('d-none');
        return false;
    } 

    if($('#event-name').val() == ''){
        $('#event-error').removeClass('d-none');
        return false;
    }
    if($('input[name="category_ids[]"]').is(':checked')){
        return true;
    }else{
        $('#cat_error').removeClass('d-none');
        return false;
    }

    if($('#start_date').val() == ''){
        $('#start-error').removeClass('d-none');
        return false;
    }

    if($('#end_date').val() == ''){ 
        $('#end-error').removeClass('d-none'); 
        return false;    
    }

    if($('#agenda').val() == ''){
        $('#agenda-error').removeClass('d-none');
        return false;
    }

    if($('#location').val() == ''){
        $('#location-error').removeClass('d-none');
        return false;
    }
    
});
</script>
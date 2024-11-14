@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">
<div class="flexSet">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="company_website">{{ __('Company Website') }}<span class="text-danger">*</span></label>
            <input id="company_website" type="text" class="form-control @error('company_website') is-invalid @enderror"
                name="company_website" value="{{ old('company_website') }}" required autocomplete="company_website"
                id="company_website" autofocus>
            <span class="d-none" id="company_website_error" role="alert">
                <strong class="text-danger">Please Enter a valid URL</strong>
            </span>
            @error('company_website')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="regions">{{ __('Regions') }}<span class="text-danger" id="messages">*</span></label>
            <select class="form-select js-example-placeholder-multiple col-sm-12" id="multiselect_regions"
                name="regions[]" required multiple="multiple">
                @foreach ($data['autorityregions'] as $autorityregion)
                <option value="{{$autorityregion->id}}">{{$autorityregion->name}}
                </option>
                @endforeach
            </select>
            <span class="d-none" id="authority_error" role="alert">
                <strong class="text-danger">Please Select Region</strong>
            </span>
            @error('region')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="country">{{ __('Country') }}<span class="text-danger" id="messages">*</span></label>
            <select class="form-select js-example-placeholder-multiple col-sm-12" id="multiselect_country"
                name="country_id[]" required multiple="multiple">
                @foreach ($data['countries'] as $country)
                <option value="{{$country->id}}">{{$country->country_name}}
                </option>
                @endforeach
            </select>
            <span class="d-none" id="country_error" role="alert">
                <strong class="text-danger">Please Select Country</strong>
            </span>
            @error('country_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="company_profile">{{ __('Company Profile') }}<span class="text-danger">*</span></label>
            <textarea class="form-control category_ids" required name="company_profile" maxlength="300"
                placeholder="add company description around 300 word"
                id="company_profile">{{ old('company_profile') }}</textarea>
            @error('company_profile')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="company_address">{{ __('Company Address') }}</label>
            <textarea class="form-control" name="company_address" maxlength="300" placeholder=""
                id="company_address">{{ old('company_address') }}</textarea>
        </div>
    </div>
    <div id="subcategory_div">
        <div class="col-md-6">
            <label for="sub_category">{{ __('Category') }}<span class="text-danger">*</span>&nbsp; <span
                    class="text-danger d-none" id="cat_error">Please Select categories</span></label>
            @foreach($data['subcategories'] as $key=> $subcategory)
            <div class="form-check">
                <section>
                    <input type="checkbox" class="form-check-input @error('category_ids') is-invalid @enderror"
                        id="subcategory_{{ $subcategory['id'] }}" name="category_idss[]"
                        value="{{ $subcategory['id'] }}">
                    <label class="form-check-label"
                        for="subcategory_{{ $subcategory['id'] }}">{{ $subcategory['title'] }}</label>
                </section>
                <div class="sub-category" id="sub-cat-step-{{ $subcategory['id'] }}" style="display:none">
                    @if(!empty($data[$key]['childcategory']))
                    @foreach($data[$key]['childcategory'] as $skey => $childcategory)
                    <div class="form-check">
                        <section> <input type="checkbox"
                                class="form-check-input @error('category_ids') is-invalid @enderror"
                                id="subcategory_{{ $childcategory['id'] }}" name="category_idss[]"
                                value="{{ $childcategory['id'] }}">
                            <label class="form-check-label"
                                for="subcategory_{{ $childcategory['id'] }}">{{ $childcategory['title'] }}</label>
                        </section>
                        <div class="subsub-category" id="sub-cat-step-{{ $childcategory['id'] }}" style="display:none">
                            @if(!empty($data[$key][$skey]['grandchildcategory']))
                            @foreach($data[$key][$skey]['grandchildcategory'] as $ckey => $grandchildcategory)
                            <div class="form-check">
                                <input type="checkbox"
                                    class="form-check-input @error('category_ids') is-invalid @enderror"
                                    id="subcategory_{{ $grandchildcategory['id'] }}" name="category_idss[]"
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
            @error('category_idss')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row mb-0  width100Set">
        <div class="col-md-8 offset-md-4">
            <!-- <button type="submit" id="btn-sb" class="btn btn-primary">
                {{ __('Register') }}
            </button> -->
            <input type="submit" name="submit" id="btn-sb" class="btn btn-primary" value="Complete Profile">
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/select2/js/select2.full.min.js') }}">
</script>

<script type="text/javascript"
    src="{{ asset('assets/admin/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }} ">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/multiselect/js/jquery.multi-select.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/pages/advance-elements/select2-custom.js') }}"></script>


<script>
$('.form-check-input ').change(function() {
    var checkboxValue = $(this).val();
    if ($(this).is(':checked')) {
        $('#sub-cat-step-' + checkboxValue).show();
    } else {
        $('#sub-cat-step-' + checkboxValue).css('display', 'none');
        $('.subsub-category').css('display');
        $('#sub-cat-step-' + checkboxValue).find('input[type=checkbox]:checked').prop('checked', false);
    }
});

$(document).on('click', '#btn-sb', function() {
    url = $('#company_website').val();
    // var urlPattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-])\/?$/;
    // if (!urlPattern.test(url)) {
    //     $('#company_website_error').removeClass('d-none');
    //     return false;
    // }

    if ($('#multiselect_country').val() == '') {
        $('#country_error').removeClass('d-none');
        return false;
    }
    if ($('#select_plan').val() == '') {
            $('#plan_error').removeClass('d-none');
            return false;
        }
    if ($('input[name="category_idss[]"]').is(':checked')) {
        return true;
    } else {
        $('#cat_error').removeClass('d-none');
        return false;
    }
});
</script>
<!-- <script>
    $(document).ready(function() {
    $('#subcategory_div input:checkbox').change(function() {
        var checkboxValue = $(this).val();
        if (checkboxValue) {
            var childCount = $('#sub-cat-step-' + checkboxValue).children().length;
            if (childCount !== 0) {
                $(this).prop('checked', false);
            }
            updateCheckboxState();
        }
    });

    function updateCheckboxState() {
        var maxSelections = 1000; 
        var selectedCount = $('#subcategory_div input:checkbox:checked').length;
        if (selectedCount >= maxSelections) {
            $('#subcategory_div input:checkbox').not(':checked').prop('disabled', true);
        } else {
            $('#subcategory_div input:checkbox').prop('disabled', false);
        }
    }
   
});
</script> -->
<!-- <script>
$(document).ready(function() {
    $('#subcategory_div input:checkbox').change(function() {
        var checkboxValue = $(this).val();
        if (checkboxValue) {
            var childCount = $('#sub-cat-step-' + checkboxValue).children().length;
            if (childCount !== 0) {
                $(this).prop('checked', false);
            }
            updateCheckboxState();
        }
    });

    function updateCheckboxState() {
        var selectedCount = $('#subcategory_div input:checkbox:checked').length;
        $('#subcategory_div input:checkbox').prop('disabled', false);
    }
});
</script> -->

<script>
$(document).ready(function() {
    // Update plan_country when a plan is selected
    $('#select_plan').on('change', function() {
        var selectedOption = $(this).find('option:selected');
        plan_country = selectedOption.data('country-limit') || 0;
        updateCountrySelection();
    });
    $(document).on('change', '#multiselect_country', function() {
        updateCountrySelection();
    });

    function updateCountrySelection() {
        var selectedCount = $('#multiselect_country option:selected').length;

        if (selectedCount >= plan_country) {
            $('#messages').text("You have selected " + plan_country + " Country According to Plan.");
            $('#multiselect_country option').not(':selected').attr('disabled', 'disabled');
        } else {
            $('#messages').text('');
            $('#multiselect_country option').removeAttr('disabled');
        }
    }
});
</script>
<script>
$(document).ready(function() {
    // Handle changes to the checkboxes
    $('#subcategory_div input:checkbox').change(function() {
        var checkboxValue = $(this).val();
        if (checkboxValue) {
            var childCount = $('#sub-cat-step-' + checkboxValue).children().length;
            if (childCount !== 0) {
                $(this).prop('checked', false);
            }
            updateCheckboxState();
        }
    });
    $('#select_plan').change(function() {
        updateCheckboxState();
    });

    // Function to update the state of checkboxes based on selected plan
    function updateCheckboxState() {
        var selectedOption = $('#select_plan option:selected');
        var maxSelections = selectedOption.data('category-limit') || 0;
        var selectedCount = $('#subcategory_div input:checkbox:checked').length;

        if (maxSelections > 0) {
            if (selectedCount >= maxSelections) {
                $('#subcategory_div input:checkbox').not(':checked').prop('disabled', true);
            } else {
                $('#subcategory_div input:checkbox').prop('disabled', false);
            }
        } else {
            $('#subcategory_div input:checkbox').prop('disabled', false);
        }
    }

    $(document).on('change','#select_plan',function(){
        $('.form-check').find('input[type=checkbox]:checked').prop('checked',false);
    });

});
</script>
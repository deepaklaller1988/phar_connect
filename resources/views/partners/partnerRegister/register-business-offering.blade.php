@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">
<hr>

<div class="flexSet">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="certifications">{{ __('Certifications') }}</label>
            <select id="certifications" class="form-select js-example-placeholder-multiple col-sm-12"
                name="certifications[]" multiple required autocomplete="Certifications" autofocus>
                <option value="ISO 9001">ISO 9001</option>
                <option value="GMP">GMP</option>
                <option value="CE">CE</option>
                <option value="ISO 13485">ISO 13485</option>
            </select>
            @error('certifications')
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
            <label for="representatives">{{ __('Representative(s)') }}</label>
            <textarea class="form-control" name="representatives" maxlength="300" placeholder=""
                id="representatives">{{ old('representatives') }}</textarea>
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
                    id="subcategory_{{ $subcategory['id'] }}" name="category_idss[]" value="{{ $subcategory['id'] }}">
                <label class="form-check-label"
                    for="subcategory_{{ $subcategory['id'] }}">{{ $subcategory['title'] }}</label>
                </section>
                <div class="sub-category" id="sub-cat-step-{{ $subcategory['id'] }}" style="display:none">
                    @if(!empty($data[$key]['childcategory']))
                    @foreach($data[$key]['childcategory'] as $skey => $childcategory)
                    <div class="form-check">
                       <section> <input type="checkbox" class="form-check-input @error('category_ids') is-invalid @enderror"
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
            <button type="submit" id="btn-sb" class="btn btn-primary">
                {{ __('Register') }}
            </button>
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
    }else{
        $('#sub-cat-step-' + checkboxValue).css('display', 'none');
        $('.subsub-category').css('display');
        $('#sub-cat-step-' + checkboxValue).find('input[type=checkbox]:checked').prop('checked', false);
    }
});

$(document).on('click', '#btn-sb', function() {
    url = $('#company_website').val();
    var urlPattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-])\/?$/;
    if (!urlPattern.test(url)) {
        $('#company_website_error').removeClass('d-none');
        return false;
    }

    if ($('#multiselect_country').val() == '') {
        $('#country_error').removeClass('d-none');
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
    var plan_country = "{{ $data['plans']['number_of_category']}}";
    $(document).on('change','#subcategory_div',function(){
        if($('#subcategory_div option:selected').length >= plan_country)
        {

            $('#subcategory_div option').attr('disabled','disabled');
        }else{
            $('#subcategory_div option').removeAttr('disabled');
        }
    });
</script> -->

<!-- <script>
    var plan_country = "{{ $data['plans']['number_of_country'] }}";
    $(document).on('change', '#multiselect_country', function() {
        var selectedCount = $('#multiselect_country option:selected').length;
        
        if (selectedCount >= plan_country) {
            $('#messages').text("You have selected "+plan_country+" Country According to Plan.");
        } 
        if (selectedCount >= plan_country) {
            $('#multiselect_country option').not(':selected').attr('disabled', 'disabled');
        } else {
            $('#multiselect_country option').removeAttr('disabled');
        }
    });
</script> -->

<!-- <script>
    var plan_category = "{{ $data['plans']['number_of_category'] }}";

    $(document).on('change', '#subcategory_div input:checkbox', function() {
        // Count checked boxes that are not disabled
        // var checkedBoxes = $('#subcategory_div input:checkbox:checked:not(:disabled)').length;

        // // Get current checkbox and its parent sections
        // var currentCheckbox = $(this);
        // var parentSection = currentCheckbox.closest('.form-check').closest('.category, .sub-category, .subsub-category');
        // var ancestorSections = parentSection.prevAll('section').find('input:checkbox');

        // // Disable parent category if a subcategory is selected
        // if (currentCheckbox.is(':checked')) {
        //     ancestorSections.prop('disabled', true);
        // } else {
        //     // Enable parent category if no other subcategories are selected
        //     var shouldEnable = true;
        //     parentSection.find('input:checkbox').each(function() {
        //         if ($(this).is(':checked')) {
        //             shouldEnable = false;
        //         }
        //     });
        //     if (shouldEnable) {
        //         ancestorSections.prop('disabled', false);
        //     }
        // }
      

          var nchild = '#sub-cat-step-' + $(this).val(); 
          var checkboxes = $('#subcategory_ input[type="checkbox"]');
          console.log(checkboxes);
            if($(nchild).length) {
                checkboxes.attr('disabled', 'disabled');
            } else {
                checkboxes.removeAttr('disabled');
            }

    

            // var nchild = '#sub-cat-step-' + $(this).val(); 
            // var sections = $(this).attr('id');
            // var checked = $(nchild).is(':checked'); 
            // console.log(checked);
            //         if (checked == false) { 
            //             $('#subcategory_' + sections + ' input[type="checkbox"]').attr('disabled', true);
            //         }
        // console.log(nchild);
        // console.log(nchild.children().length);
      

        // Disable further selection if plan limit is reached
        if (checkedBoxes >= plan_category) {
            $('#subcategory_div input:checkbox:not(:checked)').prop('disabled', true);
        } else {
            $('#subcategory_div input:checkbox:not(:checked)').prop('disabled', false);

            // Ensure parent categories remain disabled if their subcategories are checked
            $('#subcategory_div .category input:checkbox:checked').each(function() {
                $(this).closest('.category').prev('section').find('input:checkbox').prop('disabled', true);
            });
            $('#subcategory_div .sub-category input:checkbox:checked').each(function() {
                $(this).closest('.sub-category').prev('section').find('input:checkbox').prop('disabled', true);
            });
            $('#subcategory_div .subsub-category input:checkbox:checked').each(function() {
                $(this).closest('.subsub-category').prev('section').find('input:checkbox').prop('disabled', true);
            });
        }

        // $('#subcategory_div input:checkbox').each(function() {
        //     if ($(this).is(':disabled')) {
        //         $(this).prop('checked', false);
        //     }
        // });
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
        var maxSelections = "{{ $data['plans']['number_of_category'] }}"; 
        var selectedCount = $('#subcategory_div input:checkbox:checked').length;
        if (selectedCount >= maxSelections) {
            $('#subcategory_div input:checkbox').not(':checked').prop('disabled', true);
        } else {
            $('#subcategory_div input:checkbox').prop('disabled', false);
        }
    }
   
});
</script> -->










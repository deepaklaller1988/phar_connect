<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">

<form id="post-form">
    @csrf
    <div class="white_card_body">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Company Name :</label>
                    <input type="text" name="company_name" id="company_name" class="form-control"
                        placeholder="Company Name..." required value="{{ $data['user']->company_name }}">
                    <span id="cnerror"></span>
                    @if($errors->has('company_name'))
                    <div class="error">{{ $errors->first('company_name') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Company Website :</label>
                    <input type="text" name="company_website" id="company_website" class="form-control"
                        placeholder="Company Website..." required value="{{ $data['user']->company_website }}">
                    <span id="cwerror"></span>
                    @if($errors->has('company_website'))
                    <div class="error">{{ $errors->first('company_website') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Contact Name :</label>
                    <input type="text" name="contact_name" id="contact_name" class="form-control"
                        placeholder="Contact Name..." required value="{{ $data['user']->name }}">
                    <span id="conname"></span>
                    @if($errors->has('contact_name'))
                    <div class="error">{{ $errors->first('contact_name') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Email:</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $data['user']->email }}"
                        placeholder="Email Address">
                    <span id="emailerror"></span>
                    @if($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <label>Phone Number : </label>
                <div class="common_input mb_15">
                    <input type="text" name="phone" class="form-control" value="{{ $data['user']->phone }}" id="phone"
                        placeholder="Mobile No">
                    <span id="pherror"></span>
                    @if($errors->has('phone'))
                    <div class="error">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <label>Country : </label>
                <div class="common_input mb_15">
                    <select class="form-select js-example-placeholder-multiple col-sm-12" id="multiselect" name="country[]" multiple="multiple">
                        @foreach($data['countries'] as $country)
                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if(isset($data['categories']))
            <div class="col-lg-6 mb-3">
                <label>Category : </label>
                <div class="common_input mb_15">
                    <select id="sub_category_select" class="form-control selectFixCZ">
                        <option value="">Select Category</option>
                        @foreach($data['categories'] as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category'))
                    <div class="error">{{ $errors->first('category') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3 " id="sub_sub_category_div" style="display: none">
                <div class="common_input mb_15">
                    <label>Sub Sub Category : </label>
                    <select id="sub_sub_category_select" class="form-control selectFixCZ">

                    </select>
                </div>
            </div>
            <div class="col-lg-6 mb-3 " id="child_category_div" style="display: none">
                <div class="common_input mb_15">
                    <label>Child Category : </label>
                    <select id="child_category_select" class="form-control selectFixCZ">

                    </select>
                </div>
            </div>
            @endif
            <input type="hidden" name="category_id" id="parent_id" value="{{ $data['parent_id']}}">
            <input type="hidden" name="parent_id" value="{{ $data['parent_id']}}">
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Key Services:</label>
                    <textarea name="key_services" id="key_services"
                        class="form-control textareaCZ">{{ old('key_services') }}</textarea>
                    <small>Preference:- Drugs, Anabolics, Menabolics.</small>
                    <span id="keyserviceerror"></span>
                    @if($errors->has('key_services'))
                    <div class="error">{{ $errors->first('key_services') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3 ">
                <div class="common_input mb_15">
                    <label>Image: </label>
                    <input type="file" name="image[]" id="image" class="form-control" multiple>
                    <span id="imageerror"></span>
                    @if($errors->has('image'))
                    <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                </div> 
                <div id="image-preview-container"></div>
            </div>
            <div class="col-lg-6 mb-3 ">
                <div class="common_input mb_15">
                    <label>CV/Resume: </label>
                    <input type="file" name="document" id="document" class="form-control" accept="application/pdf,application/vnd.ms-excel">
                    <span id="docerror"></span>
                    @if($errors->has('document'))
                    <div class="error">{{ $errors->first('document') }}</div>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Languages:</label>
                    <textarea name="languages" id="languages"
                        class="form-control textareaCZ">{{ old('languages') }}</textarea>
                    <small>Preference:- English, Hindi, French.</small>
                    <span id="langerror"></span>
                    @if($errors->has('languages'))
                    <div class="error">{{ $errors->first('languages') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Hourly Rate (in $):</label>
                    <input type="text" name="hourly_rate" id="hourly_rate" class="form-control" value="{{ old('hourly_rate') }}"
                        placeholder="Hourly Rate">
                    <span id="hrate"></span>
                    @if($errors->has('hourly_rate'))
                    <div class="error">{{ $errors->first('emhourly_rateail') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-12 mb-3 ">
                <div class="common_input mb_15">
                    <label>Profile Summary </label>
                    <textarea id="summernote" class="form-control"></textarea>
                    <span id="summaryerror"></span>
                    @if($errors->has('document'))
                    <div class="error">{{ $errors->first('document') }}</div>
                    @endif
                </div>
            </div>
            <input type="hidden" name="profile_summary" id="profile_summary" value="{{ old('profile_summary') }}">
            <div class="col-12 mb-3">
                <div class="create_report_btn mt_30">
                    <button type="submit" class="btn_1 radius_btn d-block text-center btnsCZ">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
            <!-- <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <img src="" id="image-preview" width="150px" height="150px">
                </div>
            </div> -->
           
        </div>
    </div>
</form>
<script>
     $('#summernote').summernote();
    //  $('#image').change(function() {
    //     var input = this;
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //             $('#image-preview').attr('src', e.target.result);
    //         }
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // });
    $('#image').change(function() {
    var input = this;
    var limit = 7;
    var uploadedImagesCount = $('#image-preview-container').children('.image-preview').length;
    
    if (input.files && (input.files.length + uploadedImagesCount) <= limit) {
        $('#image-preview-container').empty(); // Clear previous previews
        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview-container').append('<span><img class="image-preview" src="' + e.target.result + '"><b>+</b></span>');
            }
            reader.readAsDataURL(input.files[i]);
        }
    } else {
        // Show a message or take any other appropriate action when the limit is exceeded
        alert('You can upload maximum ' + limit + ' images.');
        // Clear the file input to reset it
        $('#image').val('');
    }
});
</script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/select2/js/select2.full.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/admin/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }} ">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/pages/advance-elements/select2-custom.js') }}"></script>

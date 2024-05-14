<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bower_components/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/bower_components/multiselect/css/multi-select.css') }}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<form id="post-form" onsubmit="return validateForm()">
    @csrf
    <div class="white_card_body">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Position Title :</label>
                    <input type="text" name="company_name" id="company_name" class="form-control"
                        placeholder="Position Title..." required value="{{ $data['user']->company_name }}">
                    <span id="cnerror"></span>
                    @if($errors->has('company_name'))
                    <div class="error">{{ $errors->first('company_name') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Company Website:</label>
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
                    <select class="form-select js-example-placeholder-multiple col-sm-12" id="multiselect"
                        name="country[]" multiple="multiple">
                        @foreach($data['countries'] as $country)
                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                    <span id="cerror"></span>
                </div>
            </div>
            @if(isset($data['categories']))
            <div class="col-lg-6 mb-3">
                <label>Category : </label>
                <div class="common_input mb_15">
                    <select id="sub_category_select" name="category_id" class="form-control selectFixCZ">
                        <option value="">Select Category</option>
                        @foreach($data['categories'] as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    <span id="caterror"></span>
                    <span id="category_error"></span>
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
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Location:</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}"
                        placeholder="Enter Location">
                    <span id="locerror"></span>
                    @if($errors->has('location'))
                    <div class="error">{{ $errors->first('location') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Position Type:</label>
                    <select class="form-select" id="position_type" name="position_type">
                        <option value="">Select Position Type</option>
                        @foreach($data['positions'] as $position_type)
                        <option value="{{ $position_type->id }}">{{ $position_type->title }}</option>
                        @endforeach
                    </select>
                    <span id="pterror"></span>
                    @if($errors->has('position_type'))
                    <div class="error">{{ $errors->first('position_type') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Experience Level:</label>
                    <select class="form-select" id="experience_level" name="experience_level">
                        <option value="">Select Experience Level</option>
                        @foreach($data['experiences'] as $experience_level)
                        <option value="{{ $experience_level->id }}">{{ $experience_level->title }}</option>
                        @endforeach
                    </select>
                    <span id="elerror"></span>
                    @if($errors->has('experience_level'))
                    <div class="error">{{ $errors->first('experience_level') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="common_input mb_15">
                    <label>Education Level:</label>
                    <select class="form-select" id="education_level" name="education_level">
                        <option value="">Select Education Level</option>
                        @foreach($data['educations'] as $education_level)
                        <option value="{{ $education_level->id }}">{{ $education_level->title }}</option>
                        @endforeach
                    </select>
                    <span id="ederror"></span>
                    @if($errors->has('experience_level'))
                    <div class="error">{{ $errors->first('experience_level') }}</div>
                    @endif
                </div>
            </div>
            <input type="hidden" name="category_id" id="parent_id" value="{{ $data['parent_id']}}">
            <input type="hidden" name="parent_id" value="{{ $data['parent_id']}}">
            <div class="col-lg-12 mb-3">
                <div class="common_input mb_15">
                    <label>Job Description:</label>
                    <textarea id="job_description">{{ old('description') }}</textarea>
                </div>
            </div>
            <input type="hidden" name="description" id="description" value="{{ old('description') }}">
            <div class="col-12 mb-3">
                <div class="create_report_btn mt_30">
                    <button type="submit" class="btn_1 radius_btn d-block text-center btnsCZ">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/select2/js/select2.full.min.js') }}">
</script>

<script type="text/javascript"
    src="{{ asset('assets/admin/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }} ">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/multiselect/js/jquery.multi-select.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/admin/pages/advance-elements/select2-custom.js') }}"></script>
<script>
$(document).ready(function() {
    $('#job_description').summernote();
    $(document).on('focusout', '.note-editable', function() {
        $('#description').val($(this).html());
    });
});
</script>
<script>
function validateForm() {
    var categorySelect = document.getElementById("sub_category_select");
    var categoryError = document.getElementById("category_error");
    if (categorySelect.value == "") {
        categoryError.innerText = "Please select category";
        return false;
    } else {
        categoryError.innerText = ""; // Clear the error message if validation succeeds
        return true;
    }
}
</script>
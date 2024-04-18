@extends('partners.layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<style>
.upload {
    &__box {
        padding: 40px;
    }

    &__inputfile {
        width: .1px;
        height: .1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    &__btn {
        display: inline-block;
        font-weight: 600;
        color: #fff;
        text-align: center;
        min-width: 116px;
        padding: 5px;
        transition: all .3s ease;
        cursor: pointer;
        border: 2px solid;
        background-color: #4045ba;
        border-color: #4045ba;
        border-radius: 10px;
        line-height: 26px;
        font-size: 14px;

        &:hover {
            background-color: unset;
            color: #4045ba;
            transition: all .3s ease;
        }

        &-box {
            margin-bottom: 10px;
        }
    }

    &__img {
        &-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        &-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        &-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;

            &:after {
                content: '\2716';
                font-size: 14px;
                color: white;
            }
        }
    }
}

.img-bg {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position: relative;
    padding-bottom: 100%;
}
</style>
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Add Posts</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="{{ route('partner.dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class=""><a href="#!">Add Posts</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Post Details</h5>
                        </div>
                        <div class="card-block">
                            <form id="main" enctype="multipart/form-data" method="post"
                                action="{{ route('partner.post.store' ) }}">
                                @csrf
                                <div class="white_card_body">
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Title :</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Title.." required value="{{ old('title') }}">
                                                @if($errors->has('title'))
                                                <div class="error">{{ $errors->first('title') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Email:</label>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ $data['user']->email }}" placeholder="Email Address">
                                                @if($errors->has('email'))
                                                <div class="error">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label>Phone Number : </label>
                                            <div class="common_input mb_15">
                                                <input type="text" name="phone" class="form-control"
                                                    value="{{ $data['user']->phone }}" id="phone"
                                                    placeholder="Mobile No">
                                                @if($errors->has('phone'))
                                                <div class="error">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Location : </label>
                                                <input type="text" name="location" id="location" class="form-control"
                                                    value="{{ $data['user']->location }}" placeholder="Location">
                                                @if($errors->has('location'))
                                                <div class="error">{{ $errors->first('location') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Category : </label>
                                                <select id="category_select" class="form-control selectFixCZ">
                                                    <option value="">Select Category</option>
                                                    @foreach($data['categories'] as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('category_id'))
                                                <div class="error">{{ $errors->first('category_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3 " id="sub_category_div" style="display: none">
                                            <div class="common_input mb_15">
                                                <label>Sub Category : </label>
                                                <select id="sub_category_select" class="form-control selectFixCZ">

                                                </select>
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
                                        <input type="hidden" name="category_id" id="parent_id">
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Date upto : </label>
                                                <input type="date" name="time" value="{{ old('time') }}" class="form-control" placeholder="Email">
                                                @if($errors->has('time'))
                                                <div class="error">{{ $errors->first('time') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Images : </label>
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn uploadFileCZ">

                                                            <span>
                                                                <p>Upload images</p><input type="file" name="images[]"
                                                                    multiple="" data-max_length="20"
                                                                    class="upload__inputfile">
                                                            </span>
                                                        </label>
                                                        @if($errors->has('images'))
                                                        <div class="error">{{ $errors->first('images') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="upload__img-wrap uploadFilesAllCZ"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Key Services:</label>
                                                <textarea name="key_services"
                                                    class="form-control textareaCZ">{{ old('key_services') }}</textarea>
                                                <small>Preference:- Drugs, Anabolics, Menabolics.</small>
                                                @if($errors->has('key_services'))
                                                <div class="error">{{ $errors->first('key_services') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="common_input mb_15">
                                                <label>Description</label>
                                                <textarea id="summernote" name="">{{  old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" id="description" name="description">
                                        <div class="col-12 mb-3">
                                            <div class="create_report_btn mt_30">
                                                <button type="submit"
                                                    class="btn_1 radius_btn d-block text-center btnsCZ">
                                                    {{ __('Save') }}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="create_report_btn mt_30">
                                                <button type="submit"
                                                    class="btn_1 radius_btn d-block text-center btnsCZ">
                                                    {{ __('Save') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function() {
    ImgUpload();
});
if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // Make a request to reverse geocoding service
        $.getJSON('https://nominatim.openstreetmap.org/reverse', {
            lat: latitude,
            lon: longitude,
            format: 'json',
            zoom: 10
        }).done(function(data) {
            var city = data.address.city;
            if (!city) {
                city = data.address.town || data.address.village || data.address.hamlet ||
                    data.address
                    .suburb || data.address.state;
            }
            $('#location').val(city)
        }).fail(function() {
            alert("Failed to retrieve city information.");
        });
    });
} else {
    alert("Geolocation is not supported by your browser");
}

function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];

    $('.upload__inputfile').each(function() {
        $(this).on('change', function(e) {
            imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
            var maxLength = $(this).attr('data-max_length');

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function(f, index) {

                if (!f.type.match('image.*')) {
                    return;
                }

                if (imgArray.length > maxLength) {
                    return false
                } else {
                    var len = 0;
                    for (var i = 0; i < imgArray.length; i++) {
                        if (imgArray[i] !== undefined) {
                            len++;
                        }
                    }
                    if (len > maxLength) {
                        return false;
                    } else {
                        imgArray.push(f);

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var html =
                                "<div class='upload__img-box'><span class='closeUploadImages' title='Delete Image'>+</span><div style='background-image: url(" +
                                e.target.result + ")' data-number='" + $(
                                    ".upload__img-close").length + "' data-file='" + f
                                .name +
                                "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                            imgWrap.append(html);
                            iterator++;
                        }
                        reader.readAsDataURL(f);
                    }
                }
            });
        });
    });

    $('body').on('click', ".upload__img-close", function(e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().parent().remove();
    });
}
$(document).ready(function() {
    $('#summernote').summernote();
});
$(document).on('focusout', '.note-editable', function() {
    $('#description').val($(this).html());
});

$(document).on('change', '#category_select', function() {
    $('#sub_sub_category_div').css('display', 'none');
    $('#sub_sub_category_select').html('');
    $('#sub_category_div').css('display', 'none');
    $('#sub_category_select').html('');
    var category_id = $(this).val();
    $('#parent_id').val(category_id);
    $.ajax({
        url: "{{ route('partner.subcategories') }}?parent_id=" + category_id,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#sub_category_select').html('<option value="">Choose Sub Category</option>');
            $.each(response, function(index, item) {

                $('#sub_category_div').css('display', '');

                $('#sub_category_select').append('<option value="' + item
                    .id + '">' + item.title + '</option>');
            });
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
});
$(document).on('change', '#sub_category_select', function() {
    var category_id = $(this).val();
    $('#parent_id').val(category_id);
    $('#sub_sub_category_div').css('display', 'none');
    $('#sub_sub_category_select').html('');
    $.ajax({
        url: "{{ route('partner.subcategories') }}?parent_id=" + category_id,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#sub_sub_category_select').html('<option value="">Choose an Option</option>');
            $.each(response, function(index, item) {

                $('#sub_sub_category_div').css('display', '');
                $('#sub_sub_category_select').append('<option value="' + item
                    .id + '">' + item.title + '</option>');
            });
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
});

$(document).on('change', '#sub_sub_category_select', function() {
    var category_id = $(this).val();
    $('#parent_id').val(category_id);
    $('#child_category_div').css('display', 'none');
    $('#child_category_select').html('');
    $.ajax({
        url: "{{ route('partner.subcategories') }}?parent_id=" + category_id,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#child_category_select').html('<option value="">Choose an Option</option>');
            $.each(response, function(index, item) {

                $('#child_category_div').css('display', '');
                $('#child_category_select').append('<option value="' + item
                    .id + '">' + item.title + '</option>');
            });
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
});

$(document).on('change', '#child_category_select', function() {
    var category_id = $(this).val();
    $('#parent_id').val(category_id);
});
</script>
@endsection
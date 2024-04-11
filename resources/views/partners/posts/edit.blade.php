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
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">Post</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('partner.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Post</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Edit Post</h3>
                            </div>
                        </div>
                    </div>
                    @if(session('success'))
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <form action="{{ route('partner.post.update', $post->id ) }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Title :</label>
                                        <input type="text" name="title" value="{{ $post->title }}" placeholder="Title.."
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Email:</label>
                                        <input type="text" name="email" value="{{ $data['user']->email }}"
                                            placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Phone Number : </label>
                                    <div class="common_input mb_15">
                                        <input type="text" name="phone" value="{{ $data['user']->phone }}"
                                            placeholder="Mobile No">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Location : </label>
                                        <input type="text" name="location" value="{{ $data['user']->location }}"
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Category : </label>
                                        <select name="category" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach($data['categories'] as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $post->category_id ? 'selected' : ''}}>
                                                {{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Time : </label>
                                        <input type="date" name="time" placeholder="Time" value="{{ $post->time }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Images : </label>
                                        <div class="upload__box">
                                            <div class="upload__btn-box">
                                                <label class="upload__btn">
                                                    <p>Upload images</p>
                                                    <input type="file" name="images[]" multiple="" data-max_length="20"
                                                        class="upload__inputfile">
                                                </label>
                                            </div>
                                            <div class="upload__img-wrap"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <label>Key Services:</label>
                                        <textarea name="key_services"
                                            class="form-control">{{ $post->key_services }}</textarea>
                                        <small>Preference:- Drugs, Anabolics, Menabolics.</small>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="common_input mb_15">
                                        <label>Description</label>
                                        <textarea id="summernote" name="">{{ $post->description }}</textarea>
                                    </div>
                                </div>
                                <input type="hidden" id="description" name="description"
                                    value="{{ $post->description }}">
                                <div class="col-12">
                                    @if($post->images)
                                    <div class="img-wrap d-flex justify-content-center">
                                        @foreach(explode(',', $post->images) as $image)
                                        <img src="{{ asset('storage/uploads/posts/'.$image) }}" alt="{{ $image }}" class="img-fluid ml-2" width="300px" height="300px">
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <div class="create_report_btn mt_30">
                                        <button type="submit" class="btn_1 radius_btn d-block text-center">
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

<script>
jQuery(document).ready(function() {
    ImgUpload();
});

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
                                "<div class='upload__img-box'><div style='background-image: url(" +
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
</script>
@endsection
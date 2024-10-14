@extends('admin.partials.index')

@section('head')
{{-- editor --}}
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />

{{-- select2 --}}
<link rel="stylesheet" type="text/css" href="/admin/assets/css/nice-select2.css">

<style>
    .progress-bar {
        width: 100%;
        background-color: #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
        height: 20px;
        margin-top: 10px;
    }

    .progress-bar-fill {
        height: 100%;
        background-color: #280fb5;
        width: 0%;
        transition: width 0.25s;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
    }

    .progress-bar-text {
        font-size: 12px;
        white-space: nowrap;
    }

</style>
@endsection

@section('content')
<div class="mb-5">
    <a href="{{ route('admin.course.show', $subCourse->course_id) }}" class="btn btn-primary">Back to Course</a>
</div>
<div class="mt-4 w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
    <div class="flex justify-between mb-5 items-center">
        <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Detail Sub Course</h6>
        <form action="{{ route('admin.sub-course.destroy', $subCourse->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="button" class="btn btn-outline-danger ms-2 showConfirm"><i class="bi bi-trash"></i></button>
        </form>
    </div>
    <form id="sub-course-form" action="{{ route('admin.sub-course.update', $subCourse->id) }}" method="post" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $subCourse->id }}">
        <input type="hidden" name="course_id" value="{{ $subCourse->course_id }}">
        <h6 class="mb-5 text-lg font-bold">General Information</h6>
        <div class="flex mb-5">
            <iframe src="@storageUrl($subCourse->vidio_path)" class="h-[250px] w-full md:h-[550px]" allowfullscreen></iframe>
        </div>
        <div class="flex flex-col md:flex-row gap-4 items-stretch max-w-[900px] mx-auto">
            <input name="vidio_path" type="text" class="form-input flex-1" placeholder="input path vidio" value="{{ $subCourse->vidio_path }}" />
            <input name="title" type="text" value="{{ $subCourse->title }}" class="form-input flex-1" required />
            <input name="position" type="text" value="{{ $subCourse->position }}" class="form-input flex-1" required/>
            <select class="selectize" name="type" required>
                <option @if($subCourse->type == 'private') selected @endif value="private">Private</option>
                <option @if($subCourse->type == 'public') selected @endif value="public">Public</option>
            </select>
        </div>
        <div class="mb-5 mt-5">
            <textarea id="editor" name="description" type="text" class="form-input ltr:pl-10 rtl:pr-10">
                {{ $subCourse->description }}
            </textarea>
        </div>
        <div class="mt-3 sm:col-span-2 flex">
            <button id="submit-button" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection

@section('body')
<!-- end hightlight js -->
<script src="/admin/assets/js/nice-select2.js"></script>

{{-- editor --}}
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            }
        } )
        .then(editor => {
                        window.editor = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
</script>

{{-- select --}}
<script>
    document.addEventListener("DOMContentLoaded", function(e) {
        // default
        var els = document.querySelectorAll(".selectize");
        els.forEach(function(select) {
            NiceSelect.bind(select);
        });
    });
</script>
@endsection

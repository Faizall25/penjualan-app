@extends('admin.partials.index')

@section('head')
{{-- <link rel="stylesheet" type="text/css" href="/admin/assets/css/quill.snow.css"> --}}
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />

{{-- select2 --}}
<link rel="stylesheet" type="text/css" href="/admin/assets/css/nice-select2.css">
@endsection

@section('content')
<div class="flex flex-col">
    <div class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
        <h6 class="mb-5 text-lg font-bold">Rank Details</h6>
        <form action="{{ route('admin.rank.update', $rank->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $rank->id }}">
            <h6 class="mb-5 text-lg font-bold">General Information</h6>
            <div class="flex flex-col sm:flex-row">
                <div class="mb-5 w-full sm:w-2/12 ltr:sm:mr-4 rtl:sm:ml-4">
                    <img src="{{ $rank->badge_path }}" alt="image" class="mx-auto h-20 w-20 object-cover md:h-32 md:w-32">
                </div>
                <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="flex flex-col">
                        <label for="name">Rank Name</label>
                        <input id="name" type="text" name="name" placeholder="Rank Name" value="{{ $rank->name }}" class="form-input" required>
                    </div>
                    <div>
                        <label for="badge_path">Badge Image</label>
                        <input id="badge_path" name="badge_path" type="text" value="{{ $rank->badge_path }}" placeholder="Badge Path" class="form-input">
                    </div>
                    <div>
                        <label for="points">Points</label>
                        <input id="points" type="number" name="points" placeholder="1234" value="{{ $rank->points }}" class="form-input">
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="mt-5">
                    <textarea id="editor" name="description" type="text" class="form-input ltr:pl-10 rtl:pr-10" required>{!! $rank->description !!}</textarea>
                </div>
            </div>
            <div class="flex">
                <div class="mt-3 sm:col-span-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
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

    // Function to initialize CKEditor
    function initializeEditor() {
        if (document.querySelector('#editor')) {
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    plugins: [Essentials, Bold, Italic, Font, Paragraph],
                    toolbar: {
                        items: [
                            'undo', 'redo', '|', 'bold', 'italic', '|',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                        ]
                    }
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }

    // Function to initialize Select2
    function initializeSelect2() {
        var els = document.querySelectorAll(".selectize");
        els.forEach(function(select) {
            NiceSelect.bind(select);
        });
    }

    document.addEventListener("DOMContentLoaded", function(e) {
        // Initialize Select2 and CKEditor on page load
        initializeSelect2();
        initializeEditor();

        // Reinitialize CKEditor and Select2 when tab changes
        document.querySelectorAll('[data-tab-link]').forEach(function(element) {
            element.addEventListener('click', function() {
                setTimeout(function() {
                    initializeSelect2();
                    initializeEditor();
                }, 0);
            });
        });
    });
</script>
@endsection
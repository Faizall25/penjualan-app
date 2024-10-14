@extends('admin.partials.index')

@section('head')
{{-- <link rel="stylesheet" type="text/css" href="/admin/assets/css/quill.snow.css"> --}}
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />

{{-- select2 --}}
<link rel="stylesheet" type="text/css" href="/admin/assets/css/nice-select2.css">
@endsection

@section('content')
<div x-data="{ tab: 'home' }">
    <ul class="mb-5 overflow-y-auto whitespace-nowrap border-b border-[#ebedf2] font-semibold dark:border-[#191e3a] sm:flex">
        <li class="inline-block">
            <a href="javascript:;" class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary" :class="{ '!border-primary text-primary': tab == 'home' }" @click="tab='home'" data-tab-link>
                <i class="bi bi-house"></i>
                Home
            </a>
        </li>
        <li class="inline-block">
            <a href="javascript:;" class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary" :class="{ '!border-primary text-primary': tab == 'sub-course' }" @click="tab='sub-course'" data-tab-link>
                <i class="bi bi-camera"></i>
                Sub Course
            </a>
        </li>
        <li class="inline-block">
            <a href="javascript:;" class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary" :class="{ '!border-primary text-primary': tab == 'task' }" @click="tab='task'" data-tab-link>
                <i class="bi bi-list-task"></i>
                Task
            </a>
        </li>
    </ul>
    <template x-if="tab === 'home'">
        <div>
            <form action="{{ route('admin.course.update', $course->id) }}" method="post" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $course->id }}">
                <h6 class="mb-5 text-lg font-bold">General Information</h6>
                <div class="flex flex-col sm:flex-row">
                    <div class="mb-5 w-full sm:w-2/12 ltr:sm:mr-4 rtl:sm:ml-4">
                        <img src="@storageUrl($course->thumbnail_path)" alt="image" class="mx-auto h-20 w-20 object-cover md:h-32 md:w-32">
                    </div>
                    <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label for="thumbnail">Thumbnail</label>
                            <input id="thumbnail" name="thumbnail" type="file" placeholder="StarCode Kh" class="form-input">
                        </div>
                        <div>
                            <label for="title">Title</label>
                            <input id="title" type="text" name="title" placeholder="Title" value="{{ $course->title }}" class="form-input">
                        </div>
                        <div>
                            <label for="country">Rank</label>
                            <select class="selectize text-white-dark" name="rank_id" required>
                                @foreach ($ranks as $rank)
                                <option @if ($course->rank_id == $rank->id) selected @endif
                                    value="{{ $rank->id }}">
                                    {{ $rank->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="country">Category</label>
                            <select class="selectize text-white-dark" name="category_id[]" multiple="multiple">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="">Require Course</label>
                            <sel0ect class="selectize" name="require_course_id[]" multiple="multiple">
                                @foreach($courses as $c)
                                <option @if($course->required_courses->where('id', $c->id)->first())
                                    selected
                                    @endif value="{{ $c->id }}">{{ $c->title }}</option>
                                @endforeach
                            </sel0ect>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="mt-5">
                        <textarea id="editor" name="description" type="text" class="form-input ltr:pl-10 rtl:pr-10" required>{!! $course->description !!}</textarea>
                    </div>
                </div>
                <div class="flex">
                    <div class="mt-3 sm:col-span-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </template>
    <template x-if="tab === 'sub-course'">
        <div>
            <div class="mt-4 w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                <div class="flex justify-between mb-5 items-center">
                    <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Sub Course Management</h6>
                    <div class="flex items-center">
                        <!-- add modal -->
                        @include('admin.components.modal.add-sub-course')
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->title }}</td>
                                <td>
                                    {{-- iron, silver, and gold badge --}}
                                    @if ($data->type == 'public')
                                    <span class="badge bg-success">public</span>
                                    @elseif ($data->type == 'private')
                                    <span class="badge bg-danger">private</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $data->position }}
                                </td>
                                <td class="flex">
                                    <a href="{{ route('admin.sub-course.show', $data->id) }}" x-tooltip="View" type="button" class="btn btn-warning rounded-full mr-2"><i class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </template>
    <template x-if="tab === 'task'">
        <div>
            <div class="flex flex-col">
                <form action="{{ route('admin.course.update-task') }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $course->id }}">
                    <div class="mt-5">
                        <textarea id="editor" name="task" type="text" class="form-input ltr:pl-10 rtl:pr-10">{!! $course->task ?? '' !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-full mt-5">Update Task</button>
                </form>
            </div>
        </div>
    </template>
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
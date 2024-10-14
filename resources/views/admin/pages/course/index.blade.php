@extends('admin.partials.index')

@section('head')
{{-- editor --}}
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />

{{-- select2 --}}
<link rel="stylesheet" type="text/css" href="/admin/assets/css/nice-select2.css">

<style>
    .progress-bar {
        width: 100%;
        background-color: #f3f3f3;
        border-radius: 5px;
        overflow: hidden;
        margin-bottom: 10px;
        height: 20px;
    }

    .progress-bar-fill {
        height: 100%;
        background-color: #007bff;
        transition: width 0.1s;
    }
</style>
@endsection

@section('content')
<div class="mt-4 w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
    <div class="flex justify-between mb-5 items-center">
        <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Course Management</h6>
        <div class="flex items-center">
            <form action="{{ route('admin.course.index') }}" method="get" class="w-full sm:w-3/4">
                <div class="relative">
                    <input name="search" type="text" placeholder="Search Anyting ..." class="form-input shadow-[0_0_4px_2px_rgb(31_45_61_/_10%)] bg-white rounded-full h-11 placeholder:tracking-wider" value="{{ request()->input('search') }}" />
                    <button type="submit" class="btn btn-primary absolute ltr:right-1 rtl:left-1 inset-y-0 m-auto rounded-full w-9 h-9 p-0 flex items-center justify-center">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <!-- modal add -->
            @include('admin.components.modal.add-course')
        </div>
    </div>
    <div class="table-responsive">
        <table class="table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Required Course</th>
                    <th>Total Vidio</th>
                    <th>Rank</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->title }}</td>
                    <td>
                        @php
                        $required_courses = '-';

                        if (count($data->required_courses) > 0){
                        $temp = '';
                        foreach ($data->required_courses as $key => $course) {
                        $temp .= $course->title . ' | ';
                        }

                        $required_courses = $temp;
                        }
                        @endphp
                        {{ $required_courses }}
                    </td>
                    <td>{{ $data->subCourses ? count($data->subCourses) : 0 }}</td>
                    <td>
                        {{-- iron, silver, and gold badge --}}
                        @if ($data->rank->name == 'iron')
                        <span class="badge badge-outline-dark">IRON</span>
                        @elseif ($data->rank->name == 'silver')
                        <span class="badge bg-dark">SILVER</span>
                        @elseif ($data->rank->name == 'gold')
                        <span class="badge bg-warning">GOLD</span>
                        @endif
                    </td>
                    <td>
                        @php
                        $categories = [];
                        if ($data->courseCategories != null){
                        foreach ($data->courseCategories as $category) {
                        $categories[] = $category->category->name;
                        }
                        }
                        @endphp
                        {{ implode(' | ', $categories) }}
                    </td>
                    <td class="flex">
                        <a href="{{ route('admin.course.show', $data->id) }}" x-tooltip="View" type="button" class="btn btn-warning rounded-full mr-2"><i class="bi bi-eye"></i></a>
                        <form action="{{ route('admin.course.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button x-tooltip="Delete" type="button" class="btn btn-danger rounded-full mr-2 showConfirm"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-3">
        {{ $datas->links('admin.components.pagination.index') }}
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
        .then( /* ... */ )
        .catch( /* ... */ );
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
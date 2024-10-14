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
        <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Message Management</h6>
        <div class="flex items-center">
            <form action="{{ route('admin.messages.index') }}" method="get" class="w-full sm:w-3/4 flex items-center">
                <div class="relative flex-grow">
                    <input name="search" type="text" placeholder="Search Anything ..." class="form-input shadow-[0_0_4px_2px_rgb(31_45_61_/_10%)] bg-white rounded-full h-11 placeholder:tracking-wider" value="{{ request()->input('search') }}" />
                    <button type="submit" class="btn btn-primary absolute ltr:right-1 rtl:left-1 inset-y-0 m-auto rounded-full w-9 h-9 p-0 flex items-center justify-center">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

                <!-- Dropdown for Status Filter -->
                <div class="relative ml-3">
                    <select name="status" class="form-select shadow-[0_0_4px_2px_rgb(31_45_61_/_10%)] bg-white rounded-full h-11 pl-4 pr-10">
                        <option value="" {{ request()->input('status') == '' ? 'selected' : '' }}>All</option>
                        <option value="unread" {{ request()->input('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                        <option value="read" {{ request()->input('status') == 'read' ? 'selected' : '' }}>Read</option>
                    </select>
                    <i class="bi bi-funnel-fill absolute right-3 top-1/2 transform -translate-y-1/2"></i>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ Str::limit($data->message, 50, '...')  }}</td>
                    <td id="status-{{ $data->id }}">
                        @if ($data->status == 'unread')
                        <span class="badge bg-danger">unread</span>
                        @else
                        <span class="badge bg-success">read</span>
                        @endif
                    </td>
                    <td class="flex">
                        <!-- <a href="#" x-tooltip="View" type="button" class="btn btn-warning rounded-full mr-2"><i class="bi bi-eye"></i></a> -->
                        <!-- Btn View -->
                        <div x-data="modal">
                            <button x-tooltip="View" type="button" class="btn btn-warning rounded-full mr-2" @click="toggle"><i class="bi bi-eye"></i></button>

                            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                                <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                            <h5 class="font-bold text-lg">Message View</h5>
                                        </div>
                                        <div class="p-5">
                                            <div class="relative mb-4">
                                                <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                    <i class="bi bi-person"></i>
                                                </span>
                                                <input type="text" value="{{ $data->name }}" class="form-input ltr:pl-10 rtl:pr-10" readonly />
                                            </div>
                                            <div class="relative mb-4">
                                                <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                    <i class="bi bi-envelope"></i>
                                                </span>
                                                <input type="text" value="{{ $data->email }}" class="form-input ltr:pl-10 rtl:pr-10" readonly />
                                            </div>
                                            <div class="relative mb-4">
                                                <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                    <i class="bi bi-chat-text"></i>
                                                </span>
                                                <textarea class="form-input ltr:pl-10 rtl:pr-10" rows="6" readonly>{{ $data->message }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Btn Reply -->
                        <div x-data="modal">
                            <button x-tooltip="Reply" type="button" class="btn btn-success rounded-full mr-2" @click="toggle"><i class="bi bi-send"></i></button>

                            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                                <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                            <h5 class="font-bold text-lg">Send Message</h5>
                                        </div>
                                        <div class="p-5">
                                            <form action="{{ route('admin.messages.reply') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $data->id }}">

                                                <div class="relative mb-4">
                                                    <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                        <i class="bi bi-person"></i>
                                                    </span>
                                                    <input name="name" type="text" placeholder="{{ $data->name }}" class="form-input ltr:pl-10 rtl:pr-10" />
                                                </div>
                                                <div class="relative mb-4">
                                                    <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                        <i class="bi bi-envelope"></i>
                                                    </span>
                                                    <input name="email" type="text" value="{{ $data->email }}" class="form-input ltr:pl-10 rtl:pr-10" readonly />
                                                </div>
                                                <div class="relative mb-4">
                                                    <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                        <i class="bi bi-key"></i>
                                                    </span>
                                                    <input name="message" type="text" class="form-input ltr:pl-10 rtl:pr-10" />
                                                </div>
                                                <button type="submit" class="btn btn-primary w-full">Send Message</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script>
    // update modal
    const modal_update = document.querySelector("#update-modal");
    modal_update.addEventListener("show.bs.modal", function() {
        const button = event.relatedTarget;

        const id = button.getAttribute("data-bs-id");
        const name = button.getAttribute("data-bs-name");
        const description = button.getAttribute("data-bs-description");

        console.log(id, name, description, lyrics);

        const modal = document.querySelector("#update-modal");
        modal.querySelector("#update-id").value = id;
        modal.querySelector("#update-name").value = name;
        modal.querySelector("#update-description").value = description;
    });
</script>
lector("#update-description").value = description;
});
</script>
elector("#update-description").value = description;
});
</script>

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
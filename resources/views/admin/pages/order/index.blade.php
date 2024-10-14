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
        <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Order Management</h6>
        <div class="flex items-center">
            <form action="{{ route('order.index') }}" method="get" class="w-full sm:w-3/4">
                <div class="relative">
                    <input name="search" type="text" placeholder="Search Anyting ..." class="form-input shadow-[0_0_4px_2px_rgb(31_45_61_/_10%)] bg-white rounded-full h-11 placeholder:tracking-wider" value="{{ request()->input('search') }}" />
                    <button type="submit" class="btn btn-primary absolute ltr:right-1 rtl:left-1 inset-y-0 m-auto rounded-full w-9 h-9 p-0 flex items-center justify-center">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <!-- modal add -->
            @include('admin.components.modal.add-order')
        </div>
    </div>
    <div class="table-responsive">
        <table class="table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date Order</th>
                    <th>Amount</th>
                    <th>Customer</th>
                    <th>Salesman</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->order_date }}</td>
                    <td>{{ $data->amount }}</td>
                    <td>
                        {{ $data->customer->id ?? 'N/A' }} - {{ $data->customer->name ?? 'N/A' }}
                    </td>
                    <td>
                        {{ $data->salesman->id ?? 'N/A' }} - {{ $data->salesman->name ?? 'N/A' }}
                    </td>
                    <td class="flex">
                        <a href="{{ route('order.show', $data->id) }}" x-tooltip="View" type="button" class="btn btn-warning rounded-full mr-2"><i class="bi bi-eye"></i></a>
                        <form action="{{ route('order.destroy', $data->id) }}" method="post">
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
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
                        {{ $data->customer->id ?? 'N/A' }} - {{ $data->customer->customer_name ?? 'N/A' }}
                    </td>
                    <td>
                        {{ $data->salesman ? $data->salesman->id : 'N/A' }} - {{ $data->salesman ? $data->salesman->salesman_name : 'N/A' }}
                    </td>
                    <td class="flex">
                        <!-- <a href="{{ route('order.show', $data->id) }}" x-tooltip="View" type="button" class="btn btn-warning rounded-full mr-2"><i class="bi bi-eye"></i></a> -->
                        <div x-data="modal">
                            <button x-tooltip="View" type="button" class="btn btn-warning rounded-full mr-2" @click="toggle"><i class="bi bi-eye"></i></button>

                            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                                <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                            <h5 class="font-bold text-lg">Edit Order</h5>
                                        </div>
                                        <div class="p-5">
                                            <form action="{{ route('order.update') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <div class="relative mb-4">
                                                    <select class="selectize" name="customer_id" required>
                                                        @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="relative mb-4">
                                                    <select class="selectize" name="salesmans_id" multiple="multiple">
                                                        @foreach($salesmans as $salesman)
                                                        <option value="{{ $salesman->id }}">{{ $salesman->salesman_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="relative mb-4">
                                                    <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                        <i class="bi bi-person"></i>
                                                    </span>
                                                    <input name="order_date" type="date" placeholder="{{ $data->order_date }}" class="form-input ltr:pl-10 rtl:pr-10" />
                                                </div>
                                                <div class="relative mb-4">
                                                    <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                        <i class="bi bi-key"></i>
                                                    </span>
                                                    <input name="amount" type="text" placeholder="{{ $data->amount }}" class="form-input ltr:pl-10 rtl:pr-10" />
                                                </div>
                                                <button type="submit" class="btn btn-primary w-full">Edit
                                                    Order</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
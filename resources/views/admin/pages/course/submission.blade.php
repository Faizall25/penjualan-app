@extends('admin.partials.index')

@section('content')
<div class="mt-4 w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
    <div class="flex justify-between mb-5 items-center">
        <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">Submission Management</h6>
        <div class="flex items-center">
            <form action="{{ route('admin.submissions.index') }}" method="get" class="w-full sm:w-3/4">
                <div class="relative">
                    <input name="search" type="text" placeholder="Search Anyting ..." class="form-input shadow-[0_0_4px_2px_rgb(31_45_61_/_10%)] bg-white rounded-full h-11 placeholder:tracking-wider" value="{{ request()->input('search') }}" />
                    <button type="submit" class="btn btn-primary absolute ltr:right-1 rtl:left-1 inset-y-0 m-auto rounded-full w-9 h-9 p-0 flex items-center justify-center">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Member name</th>
                    <th>Course title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->course->title }}</td>
                    <td>{{ Str::limit($data->content, 50, '...') }}</td>
                    <td class="flex items-center">
                        <a href="{{ $data->content }}" class="btn btn-outline-secondary mr-2" target="_blank"><i class="bi bi-arrow-up-right-square"></i></a>
                        @if($data->status == 'pending')
                            @include('admin.components.modal.approve-submission')
                            @include('admin.components.modal.rejected-submission')
                        @else
                            <p>{{ $data->status }}</p>
                        @endif
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

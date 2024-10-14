@extends('admin.partials.index')

@section('content')
<div class="mt-4 w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
    <div class="flex justify-between mb-5 items-center">
        <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light">User Management</h6>
        <div class="flex items-center">
            <form action="{{ route('admin.user-management.index') }}" method="get" class="w-full sm:w-3/4">
                <div class="relative">
                    <input name="search" type="text" placeholder="Search Anyting ..." class="form-input shadow-[0_0_4px_2px_rgb(31_45_61_/_10%)] bg-white rounded-full h-11 placeholder:tracking-wider" value="{{ request()->input('search') }}" />
                    <button type="submit" class="btn btn-primary absolute ltr:right-1 rtl:left-1 inset-y-0 m-auto rounded-full w-9 h-9 p-0 flex items-center justify-center">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <!-- register -->
            <div x-data="modal">
                <!-- button -->
                <button type="button" class="btn btn-primary ms-2" @click="toggle">Add</button>

                <!-- modal -->
                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                    <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                            <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                <h5 class="font-bold text-lg">Add User</h5>
                            </div>
                            <div class="p-5">
                                <form action="{{ route('admin.user-management.store') }}" method="post">
                                    @csrf
                                    <div class="relative mb-4">
                                        <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input name="name" type="text" placeholder="Name" class="form-input ltr:pl-10 rtl:pr-10" />
                                    </div>
                                    <div class="relative mb-4">
                                        <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input name="email" type="email" placeholder="Email" class="form-input ltr:pl-10 rtl:pr-10" />
                                    </div>
                                    <div class="relative mb-4">
                                        <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                            <i class="bi bi-key"></i>
                                        </span>
                                        <input name="password" type="password" placeholder="Password" class="form-input ltr:pl-10 rtl:pr-10" />
                                    </div>
                                    <button type="submit" class="btn btn-primary w-full">Add User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Code Affiliate</th>
                    <th>Email Verify</th>
                    <th>Membership</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->affiliate->personal_affiliate_code }}</td>
                    <td>
                        @if ($data->email_verified_at)
                        <span class="badge bg-success">Verified</span>
                        @else
                        <span class="badge bg-danger">Unverified</span>
                        @endif
                    </td>
                    <td>
                        {{-- from membership_expired_at --}}
                        @if ($data->membership->membership_expired_at)
                        @if ($data->membership->membership_expired_at->isPast())
                        <span class="badge bg-danger">Expired</span>
                        @else
                        <span class="badge bg-success">Active</span>
                        @endif
                        @else
                        <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td class="flex">
                        <button x-tooltip="View" type="button" class="btn btn-warning rounded-full mr-2"><i class="bi bi-eye"></i></button>
                        {{-- <form action="{{ route('admin.user-management.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button x-tooltip="Delete" type="button" class="btn btn-danger rounded-full mr-2 showConfirm"><i class="bi bi-trash"></i></button>
                        </form> --}}
                        <div x-data="modal">
                            <!-- button -->
                            <button type="button" class="btn btn-outline-primary ms-2" @click="toggle"><i class="bi bi-plus me-2"></i>Membership</button>

                            <!-- modal -->
                            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                                <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                            <h5 class="font-bold text-lg">Add Membership</h5>
                                        </div>
                                        <div class="p-5">
                                            <form action="{{ route('admin.user-management.add-day-membership') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $data->id }}">
                                                <div class="relative mb-4">
                                                    <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                        <i class="bi bi-calendar"></i>
                                                    </span>
                                                    <input name="days" type="number" placeholder="Input days" class="form-input ltr:pl-10 rtl:pr-10" required />
                                                </div>
                                                <button type="submit" class="btn btn-primary w-full">Add Membership</button>
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

@endsection
<div x-data="modal">
    <!-- button -->
    <button type="button" class="btn btn-primary ms-2" @click="toggle">Add</button>

    <!-- modal -->
    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
            <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-xl my-8">
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    <h5 class="font-bold text-lg">Add Order</h5>
                </div>
                <div class="p-5">
                    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="relative mb-4">
                            <select class="selectize" name="customer_id" required>
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative mb-4">
                            <select class="selectize" name="salesman_id[]" multiple="multiple">
                                @foreach($salesmans as $salesman)
                                <option value="{{ $salesman->id }}">{{ $salesman->salesman_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative mb-4">
                            <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                <i class="bi bi-file-earmark"></i>
                            </span>
                            <input name="order_date" type="date" placeholder="Date" class="form-input ltr:pl-10 rtl:pr-10" required />
                        </div>
                        <div class="relative mb-4">
                            <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                <i class="bi bi-card-heading"></i>
                            </span>
                            <input name="amount" type="text" placeholder="$$$" class="form-input ltr:pl-10 rtl:pr-10" required />
                        </div>
                        <button type="submit" class="btn btn-primary w-full">Add Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
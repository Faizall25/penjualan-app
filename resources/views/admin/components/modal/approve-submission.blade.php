<div x-data="modal">
    <!-- button -->
    <button type="button" class="btn btn-success mr-2" @click="toggle"><i class="bi bi-check mr-2"></i>Approve</button>

    <!-- modal -->
    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
            <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-xl my-8">
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    <h5 class="font-bold text-lg">Approve</h5>
                </div>
                <div class="p-5">
                    <form action="{{ route('admin.submission.update-status') }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="status" value="completed">
                        <div class="relative mb-4">
                            <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                <i class="bi bi-chat"></i>
                            </span>
                            <textarea name="reply" type="text" class="form-input ltr:pl-10 rtl:pr-10" required>reply email</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-full">Approve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

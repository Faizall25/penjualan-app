<div x-data="modal()">
    <!-- button -->
    <button type="button" class="btn btn-primary ms-2" @click="toggle">Add new</button>

    <!-- modal -->
    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
            <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-xl my-8">
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    <h5 class="font-bold text-lg">Add Sub Course</h5>
                </div>
                <div class="p-5">
                    <form id="sub-course-form" action="{{ route('admin.sub-course.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input id="hidden-id" type="hidden" name="course_id" value="{{ $course->id }}">
                        <div class="relative mb-4">
                            <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                <i class="bi bi-card-heading"></i>
                            </span>
                            <select name="type" type="text" placeholder="Type" class="form-input ltr:pl-10 rtl:pr-10" required>
                                <option value="private">private</option>
                                <option value="public">public</option>
                            </select>
                        </div>
                        <div class="relative mb-4">
                            <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                <i class="bi bi-card-heading"></i>
                            </span>
                            <input name="title" type="text" placeholder="Title" class="form-input ltr:pl-10 rtl:pr-10" required />
                        </div>
                        <div class="relative mb-4">
                            <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                <i class="bi bi-card-heading"></i>
                            </span>
                            <input name="vidio_path" type="text" placeholder="Vidio Path" class="form-input ltr:pl-10 rtl:pr-10" required />
                        </div>
                        <div class="relative mb-4">
                            <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                <i class="bi bi-card-heading"></i>
                            </span>
                            <input name="position" type="number" placeholder="Position Vidio" class="form-input ltr:pl-10 rtl:pr-10" required />
                        </div>
                        <div class="relative mb-4">
                            <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <textarea id="editor" name="description" type="text" class="form-input ltr:pl-10 rtl:pr-10"></textarea>
                        </div>
                        <button id="submit-button" type="submit" class="btn btn-primary w-full">Add Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

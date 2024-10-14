@extends('user-registered.pages.main')

@section('title', 'Dungeon | Course')

@push('styles')
    <link rel="stylesheet" href="/member/assets/css/single-course.css">
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="single__course">
        <div class="content-fit">
            <div class="row-1">
                {{-- Single course main content --}}
                <div class="bg-white rounded-4 border main_course_area">
                    {{-- Video player --}}
                    <div class="video__player rounded-3">
                        <video id="my-video" controls preload="auto" class="video-js container video" data-setup="{}">
                            <source src="@storageUrl($sub_course->vidio_path)" type="video/mp4" />
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                            </p>
                        </video>
                    </div>

                    {{-- Video player ends --}}

                    {{-- Course detail --}}
                    <div class="course__detail p-4 rounded-4">
                        <div class="course__detail__heading">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>{{ $sub_course->title }}</h2>
                                @php
                                    $sub_course_init = auth()
                                        ->user()
                                        ->isHaveSubCourse($course->id, $sub_course->id, auth()->user()->id);
                                @endphp

                                @if ($sub_course_init != null && $sub_course_init->status == 'completed')
                                    <span class="btn btn-primary">Completed <i class="fa fa-check"></i></span>
                                @else
                                    <a href="{{ route('user.courses.mark-as-complete', ['course_id' => $course->id, 'sub_course_id' => $sub_course->id]) }}"
                                        class="text-white btn btn-primary">Mark as complete</a>
                                @endif
                            </div>
                            <br>
                            <div class="text-black">
                                {!! $sub_course->description !!}
                            </div>
                        </div>
                    </div>
                    {{-- Course detail ends --}}

                    {{-- Comment section --}}
                    <br><br>
                    <div class="comment p-3">
                        <h3 class="mb-2">Comment</h3>
                        {{-- Comment section wrapper --}}
                        <div>
                            {{-- Comment Form --}}
                            <div class="comment__form">
                                <form action="{{ route('user.comment.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="sub_course_id" value="{{ $sub_course->id }}">
                                    <div class="mb-3">
                                        <textarea name="message" class="form-control rounded-4" id="comment" rows="4" placeholder="Add comment..."
                                            style="background: rgb(245, 245, 245)"></textarea>
                                    </div>
                                    <div class="d-flex gap-3 align-items-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-outline-primary">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            {{-- Comment Form ends --}}

                            {{-- Comment list --}}
                            <div class="comment__list">
                                <div class="comment__item">
                                    @foreach ($sub_course->comments as $comment)
                                        {{-- Comment --}}
                                        <div class="comment__item">
                                            {{-- Main single comment --}}
                                            <div class="main__comment mb-3">
                                                {{-- user profile photo --}}
                                                <div class="comment__left">
                                                    <img src="/admin/assets/images/profile-2.jpeg"
                                                        alt="User" class="rounded-circle">
                                                </div>
                                                {{-- user profile photo ends --}}

                                                {{-- Comment content --}}
                                                <div class="comment__right">
                                                    {{-- Comment header --}}
                                                    <div class="comment__item__header">
                                                        <div class="comment__item__header__left">
                                                            <div class="comment__item__header__left__info">
                                                                <h5>{{ $comment->user->name }}</h5>
                                                                <p>{{ $comment->created_at }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Comment header ends --}}

                                                    {{-- Comment content --}}
                                                    <div class="comment__item__content mb-3">
                                                        <p class="comment__paragraph">
                                                            {{ $comment->message }}
                                                        </p>

                                                        <form action="{{ route('user.comment.update') }}" id="edit-comment-form" style="display: none;" method="post">
                                                            @csrf
                                                            @method('PUT')

                                                            {{-- Reply Input field --}}
                                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                            <div class="mb-3">
                                                                <textarea name="message" class="form-control rounded-4 p-2" id="comment" rows="4" placeholder="Edit comment..."
                                                                    style="background: rgb(245, 245, 245)">{{ $comment->message }}
                                                                </textarea>
                                                            </div>
                                                            <div class="d-flex gap-3 align-items-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                            {{-- Reply Input field ends --}}
                                                        </form>
                                                    </div>
                                                    {{-- Comment content ends --}}

                                                    {{-- Comment buttons --}}
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <button class="btn" id="reply-btn">
                                                            <i class="fas fa-reply text-secondary"></i> Reply
                                                        </button>
                                                        @if(auth()->user()->id == $comment->user_id)
                                                            <button class="btn" id="edit-btn">
                                                            <i class="fas fa-edit text-secondary"></i> Edit
                                                            </button>
                                                            <form action="{{ route('user.comment.destroy', $comment->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn" id="delete-btn">
                                                                <i class="fas fa-trash-can text-secondary"></i> Delete
                                                            </button>
                                                          @endif
                                                        </form>
                                                    </div>
                                                    {{-- Comment buttons ends --}}

                                                    {{-- Reply comment input  --}}
                                                    <div class="reply__comment__form my-3">
                                                        <form action="{{ route('user.reply.store') }}" method="post">
                                                            @csrf

                                                            {{-- Reply Input field --}}
                                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                            <div class="mb-3">
                                                                <textarea name="message" class="form-control rounded-4 p-2" id="comment" rows="4" placeholder="Reply comment..."
                                                                    style="background: rgb(245, 245, 245)"></textarea>
                                                            </div>
                                                            <div class="d-flex gap-3 align-items-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                            {{-- Reply Input field ends --}}
                                                        </form>
                                                    </div>
                                                    {{-- Reply comment input ends --}}
                                                </div>
                                                {{-- Comment content ends --}}
                                            </div>
                                            {{-- main single comment ends --}}

                                            {{-- Reply comments --}}
                                            @foreach ($comment->replies as $reply)
                                                <div class="reply__comment__list">
                                                    <div class="comment__item" style="margin-left: 2rem;">
                                                        <div class="main__comment">
                                                            <div class="comment__left">
                                                                <img src="/admin/assets/images/profile-1.jpeg" alt="User"
                                                                    class="rounded-circle">
                                                            </div>
                                                            <div class="comment__right">
                                                                <div class="comment__item__header">
                                                                    <div class="comment__item__header__left">
                                                                        <div class="comment__item__header__left__info">
                                                                            <h5>{{ $reply->user->name }}</h5>
                                                                            <p>{{ $reply->created_at }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="comment__item__content mb-3">
                                                                    <p class="comment__paragraph">
                                                                        {{ $reply->message }}
                                                                    </p>

                                                                    <form action="{{ route('user.reply.update') }}" id="edit-comment-form"
                                                                        style="display: none;" method="post">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        {{-- Reply Input field --}}
                                                                        <input type="hidden" name="reply_id" value="{{ $reply->id }}">
                                                                        <div class="mb-3">
                                                                            <textarea name="message" class="form-control rounded-4 p-2" id="comment" rows="4" placeholder="Edit comment..."
                                                                                style="background: rgb(245, 245, 245)">{{ $reply->message }}
                                                                    </textarea>
                                                                        </div>
                                                                        <div class="d-flex gap-3 align-items-center">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                        {{-- Reply Input field ends --}}
                                                                    </form>
                                                                </div>

                                                                @if(auth()->user()->id == $reply->user_id)
                                                                    <div class="d-flex gap-3 align-items-center">
                                                                        <button class="btn" id="edit-btn">
                                                                            <i class="fas fa-edit text-secondary"></i> Edit
                                                                        </button>
                                                                        <form action="{{ route('user.reply.destroy', $reply->id) }}" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn" id="delete-btn">
                                                                                <i class="fas fa-trash-can text-secondary"></i> Delete
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- Reply comments ends --}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- Comment list ends --}}
                        </div>
                        {{-- Comment section wrapper ends --}}
                    </div>
                    {{-- Comment section ends --}}
                </div>
                {{-- Single course main content ends --}}

                {{-- Sticky sidebar that contains Playlist --}}
                <aside class="course__playlist">
                    <div class="border playlist">
                        <div class="circle"></div>
                        <div class="row">
                            <h3>
                                Playlist
                            </h3>
                            <p>Scroll down to see more</p>
                        </div>
                        <div class="scrollable">
                            <ul>
                                @foreach ($course->subCourses as $sub_course)
                                    @php
                                        $sub_course_status = auth()
                                            ->user()
                                            ->isHaveSubCourse($course->id, $sub_course->id, auth()->user()->id);
                                    @endphp
                                    <a class="playlist__item {{ $sub_course->id == request()->input('sub_course_id') ? 'active' : '' }}"
                                        href="{{ route('user.courses.detail.show', ['course_id' => $course->id, 'sub_course_id' => $sub_course->id]) }}">
                                        <div class="playlist__item__content">
                                            <div class="playlist__item__icon">
                                                <i class="fas a fa-play"></i>
                                            </div>
                                            <div class="playlist__item__title">
                                                {{ $sub_course->title }}
                                                @if ($sub_course_status != null && $sub_course_status->status == 'completed')
                                                    <i class="fas fa-check text-primary"></i>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="playlist__item__duration">
                                            -
                                        </div>
                                    </a>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <br>

                    {{-- Submission area | user bisa submit jika statusnya ELIGIBLE --}}
                    @php
                        $status = true;
                        foreach ($course->subCourses as $key => $value) {
                            $sub_course_check = auth()
                            ->user()
                            ->isHaveSubCourse($course->id, $value->id, auth()->user()->id);

                            if ($sub_course_check == null || $sub_course_check->status != 'completed') {
                                $status = false;
                            }
                        }
                    @endphp
                    @if($status)
                        {{-- Example of ELIGIBLE user --}}
                        <div class="border submission__area mb-3">
                            <div class="circle"></div>
                            <div class="row">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h4>
                                        Final Project
                                    </h4>
                                    {{--
                                    Text menjadi hijau jika statusnya ELIGIBLE
                                --}}
                                @if ($submissions->where('status', 'pending')->first())
                                    <div class="course__status text-warning p-2 fw-bold">On Review</div>
                                @elseif ($submissions->where('status', 'rejected')->first())
                                    <div class="course__status text-danger p-2 fw-bold">Rejected</div>
                                @elseif ($submissions->where('status', 'completed')->first())
                                    <div class="course__status text-primary p-2 fw-bold">Eligible</div>
                                @endif
                                </div>
                                {{--
                                Teks para user yang statusnya INELIGIBLE
                            --}}
                                <p class="mb-3">
                                    Submit your work here. Make sure to submit your work after finishing the course.
                                </p>
                                @if(!$submissions->where('status', 'pending')->first() && !$submissions->where('status', 'completed')->first())
                                    <div class="mb-3">
                                        {{--
                                        Button & input field bisa diakses jika statusnya ELIGIBLE
                                    --}}
                                        <form action="{{ route('user.submission.store') }}" method="post">
                                            @csrf
                                            <div class="d-flex gap-2">
                                                <div class="input-group flex-fill">
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                    <span class="input-group-text" id="basic-addon3">@</span>
                                                    <input type="url" name="content" id="submission-link"
                                                        class="form-control"
                                                        placeholder="e.g. https://github.com/uuqkun/dgn-js-submission">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif

                                <div class="">
                                    <h5 class="mb-2">
                                        Submission Status
                                    </h5>
                                    @if ($submissions->where('status', 'pending')->first())
                                        <p>
                                            Your submission is currently being <span
                                                class="text-info fw-semibold text-uppercase">reviewed</span> by the admin.
                                        </p>
                                    @elseif ($submissions->where('status', 'rejected')->first())
                                        <p>
                                            Your submission has been <span
                                                class="text-danger fw-semibold text-uppercase">rejected</span> by the admin.
                                        </p>
                                    @elseif ($submissions->where('status', 'completed')->first())
                                        <p>
                                            Your submission has been <span
                                                class="text-primary fw-semibold text-uppercase">accepted</span> by the admin.
                                        </p>
                                    @else
                                        <p>
                                            You haven't submitted your work yet.
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </aside>
                {{-- Sticky sidebar ends --}}
            </div>
        </div>
    </div>

    {{-- Video-js configuration --}}
    <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var video = document.getElementById('my-video');

            // Disable right-click context menu
            video.addEventListener('contextmenu', function(e) {
                e.preventDefault();
            });
        });
    </script>
    {{-- Video JS config ends --}}

    {{-- Playlist Config  --}}
    <script>
        // Sticky sidebar
        const playlist = document.querySelector('.single__course .course__playlist');

        window.addEventListener('scroll', () => {
            if (window.innerWidth > 992) {
                playlist.classList.add('sticky-top');
            } else {
                playlist.classList.remove('sticky-top');
            }
        });

        window.addEventListener('resize', () => {
            console.log(window.innerWidth);
            if (window.innerWidth > 992) {
                playlist.classList.add('sticky-top');
            } else {
                playlist.classList.remove('sticky-top');
            }
        });

        // Playlist active item
        const playlist__item = playlist.querySelectorAll('.playlist__item');

        playlist__item.forEach((item) => {

            item.addEventListener('click', () => {
                // Remove active class from all playlist items
                playlist__item.forEach(item => {
                    item.classList.remove('active');
                });

                // Then, add active class to the clicked item
                item.classList.add('active');
            });
        })
    </script>
    {{-- Playlist Config ends --}}

    {{-- Comment handler script --}}
    <script>
        const commentForm = document.querySelectorAll('.reply__comment__form');

        window.addEventListener('DOMContentLoaded', () => {
            commentForm.forEach((form) => {
                form.style.display = 'none';
            });
        });

        // Reply button handler
        const replyBtn = document.querySelectorAll('#reply-btn');

        replyBtn.forEach((btn) => {
            btn.addEventListener('click', () => {
                const replyForm = btn.parentElement.nextElementSibling;
                const display = replyForm.style.display === `none` ? `block` : `none`;
                replyForm.style.display = display;
            });
        });

        // Edit button handler
        const editBtn = document.querySelectorAll('#edit-btn');

        editBtn.forEach((btn) => {
            btn.addEventListener('click', () => {
                const commentItem = btn.parentElement.parentElement.parentElement;
                const commentContent = commentItem.querySelector('.comment__item__content');
                const editForm = commentContent.querySelector('#edit-comment-form');
                const p = commentContent.querySelector('.comment__paragraph');

                const display = editForm.style.display === `none` ? `block` : `none`;

                editForm.style.display = display;
                p.style.display = display === 'block' ? 'none' : 'block';
            });
        });

        // Delete button handler
        const deleteBtn = document.querySelectorAll('#delete-btn');
    </script>
    {{-- Comment handler script --}}
@endsection

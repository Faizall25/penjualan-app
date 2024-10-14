@extends('user-registered.pages.main')

@section('title', 'Dungeon | Courses')

@push('styles')
    <link rel="stylesheet" href="/member/assets/css/course-overview.css">
@endpush

@section('content')
    <div class="course__overview content-fit">
        <div class="overview__wrapper">
            <main class="shadow-card rounded-4 overflow-hidden" style="height: 100%">
                <div class="">
                    {{-- Thumbnail --}}
                    <div class="thumbnail">
                        <img src="@storageUrl($course->thumbnail_path)" alt="course thumbnail" class="object-fit-cover">
                    </div>
                    {{-- course header --}}
                </div>
                <div class="overview__content">
                    <div class="wrapper">
                        @php
                            $course_init = auth()->user()->isHaveCourse($course->id, auth()->user()->id);
                        @endphp
                        @if($course_init)
                            @if($course_init->status == 'completed')
                                <a href="{{ route('user.courses.detail.show', ['course_id' => $course->id]) }}"
                                    class="text-primary btn btn-light">Rewatch Course</a>
                            @else
                                <a href="{{ route('user.courses.detail.show', ['course_id' => $course->id]) }}"
                                    class="text-primary btn btn-light">Continue</a>
                            @endif
                        @else
                            <a href="{{ route('user.courses.detail.show', ['course_id' => $course->id]) }}"
                                class="text-white btn btn-primary">Start Course</a>
                        @endif
                    </div>
                </div>
            </main>
            <br>
            <section class="shadow-card rounded-4 bg-white">
                <div class="mb-2 p-4">
                    <h2>{{ $course->title }}</h2>
                    <br>
                    {!! $course->description !!}
                </div>
                {{-- Course detail --}}
                <div class="course__detail p-4 rounded-4">
                    <div class="course__detail__content">
                        <div class="left">
                            <span class="detail">
                                <i class="fas fa-volume-up"></i>
                                <p>
                                    Dungeon Doakbi
                                </p>
                            </span>
                            <span class="detail">
                                <i class="fas fa-clock"></i>
                                <p>
                                    - hours
                                </p>
                            </span>
                            <span class="detail">
                                <i class="fas fa-bookmark"></i>
                                <p>
                                    {{ count($course->subCourses) }} Vidio
                                </p>
                            </span>
                            <span class="detail">
                                <i class="fas fa-user"></i>
                                <p>
                                    {{ count($course->user_courses) }} Survivor
                                </p>
                            </span>
                        </div>
                        <div class="right accordion">
                            <button class="accordion-button course-rank detail" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="icon__wrapper">
                                    <img src="/user/assets/images/icons/{{ $course->rank->badge_path }}" alt="Iron-rank course"
                                        style="width: 100%">
                                </div>
                                <p class="m-0">
                                    See rank detail
                                </p>
                            </button>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    </br>
                                    <div class="rank-details">
                                        <span class="rank-detail">
                                            <h6>Rank</h6>
                                            <p>{{ $course->rank->name }}</p>
                                        </span>
                                        <span class="rank-detail">
                                            <h6>Points</h6>
                                            <p>+{{ $course->rank->points }}</p>
                                        </span>
                                        @if(count($course->required_courses) > 0)
                                            <span class="rank-detail">
                                                <h6>
                                                    You'll need this course before continues to
                                                </h6>
                                                <ul>
                                                    @foreach ($course->required_courses as $required_course)
                                                        <li>
                                                            <a href="#">{{ $required_course->title }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection

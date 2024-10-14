@extends('user.pages.main')

@section('title', 'Course Detail')

@section('content')

    <div class="">
        <div class="decor-1-course">
        </div>
        <div class="course container">
            {{-- main content --}}
            <main class="">
                {{-- hero section starts --}}
                <section class="hero">
                    <div class="hero-content">
                        {{-- Breadcrumbs --}}
                        <div class="breadcrumbs">
                            <a href="{{ route('landing-page') }}">Home</a>
                            <span>></span>
                            <a href="{{ route('landing-page') . '#courses' }}">Courses</a>
                            <span>></span>
                            <span>{{ $course->title }}</span>
                        </div>
                        {{-- Thumbnail --}}
                        <div class="thumbnail">
                            <img src="@storageUrl($course->thumbnail_path)" alt="course thumbnail">
                        </div>
                        {{-- course header --}}
                        <div class="course-header">
                            <h2>{{ $course->title }}</h2>
                            <br>
                            <p>
                                {!! $course->description !!}
                            </p>
                        </div>
                    </div>
                    {{-- Course details --}}
                    <div class="course-details">
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
                                    {{ count($course->subCourses) }} vidio
                                </p>
                            </span>
                            <span class="detail">
                                <i class="fas fa-user"></i>
                                <p>
                                    {{ count($course->user_courses) }} Students
                                </p>
                            </span>
                        </div>
                        <div class="right accordion">
                            <button class="accordion-button course-rank detail" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="wrapper">
                                    <img src="/user/assets/images/icons/{{ $course->rank->badge_path }}" alt="Iron-rank course">
                                </div>
                                <p>
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
                                        <span class="rank-detail">
                                            @if(count($course->required_courses) > 0)
                                                <h6>
                                                    You'll need this course before continues to
                                                </h6>
                                                <ul>
                                                    @foreach ($course->required_courses as $required_course)
                                                        <li>
                                                            <a href="{{ route('user.course.guest.show', $required_course->id) }}">
                                                                {{ $required_course->title }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- hero section ends --}}

                {{-- Course accordion starts --}}
                <div class="course-content">
                    {{-- header --}}
                    <header>
                        <h3>Course Content</h3>
                    </header>
                    <br>
                    {{-- Course video --}}
                    <video id="my-video" controls preload="auto" class="video-js container video" data-setup="{}"
                        style="border-radius: 8px">
                        @if (count($course->subCourses) > 0)
                            <source src="@storageUrl($course->subCourses[0]->vidio_path)" type="video/mp4" />
                        @else
                            <source src="@storageUrl('public/mockVidio.mp4')" type="video/mp4" />
                        @endif
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                    </video>
                    <br>
                    <br>
                    {{-- Sub courses --}}
                    <div class="content-accordion" id="accordionPanelsStayOpenExample">
                        <div class="item">
                            <h5 class="header" id="panelsStayOpen-headingOne">
                                <button type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    <span>
                                        Learning videos
                                    </span>
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </h5>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="body">
                                    <ul class="sub-courses">
                                        @foreach ($course->subCourses as $subCourse)
                                            <li class="active">
                                                <a href="#">
                                                    <i class="fa fa-play"></i>
                                                    <p>
                                                        {{ $subCourse->title }}
                                                    </p>
                                                </a>
                                                <p class="duration">
                                                    -
                                                </p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                {{-- Course accordion ends --}}
            </main>
            {{-- Sidebar --}}
            <aside>
                <div class="course-sidebar-info">
                    <h4>This course includes</h4>
                    <ul>
                        <li>
                            <i class="fa fa-check"></i>
                            <p>Access on mobile, tab, and desktop</p>
                        </li>
                        <li>
                            <i class="fa fa-check"></i>
                            <p>Certificate of completion</p>
                        </li>
                    </ul>
                </div>
                <br>
                <div class="membership">
                    <h4>
                        Join our membership now!
                    </h4>
                    <p>
                        Get access to all courses and learn from the best instructors.
                    </p>
                    <br>
                    <a href="{{ route('user.membership.show') }}" class="membership-btn">
                        See Plans
                    </a>
                </div>
                <br>
            </aside>
        </div>
        {{-- Upcoming events --}}
        {{-- @include('user.pages.landing.event') --}}

        {{-- contact us --}}
        @include('user.pages.landing.contactus')

    </div>

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

@endsection

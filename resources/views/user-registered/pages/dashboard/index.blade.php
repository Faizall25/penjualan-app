@extends('user-registered.pages.main')

@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="/member/assets/css/dashboard.css">
@endpush

@php
use Illuminate\Support\Str;
@endphp

@section('content')
    <div class="dashboard content-fit">
        <div class="dashboard__container parent">
            <div class="parent__1">
                @if ($courseLatest)
                    {{-- On going Courses container --}}
                    <div class="db__card ongoing__course shadow-card rounded-4">
                        <p class="text-light">
                            Hey, let's continue learning and get more points!
                        </p>
                        <div class="d-flex gap-3 align-items-center justify-content-between">
                            <div class="card__1__wrapper">
                                <h4 class="mb-2 text-light">{{ $courseLatest->title }}</h4>
                                <p class="text-light">
                                    {!! Str::limit($courseLatest->description, 100) !!}
                                </p>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <a href="{{ route('user.courses.overview.show', $courseLatest->id) }}" class="btn btn-outline-light">Go to Course</a>
                            </div>
                            <a class="card__1__image" href="{{ route('user.courses.overview.show', $courseLatest->id) }}">
                                <img src="/user/assets/images/course-01.jpg" alt="Flutter" style="max-width: 250px">
                            </a>
                        </div>
                    </div>
                @endif

                {{-- Affiliate container --}}
                <div class="db__card affiliate__banner shadow-card rounded-4">
                    <h5 class="mb-2">
                        Refer your friends and get more discount!
                    </h5>
                    <div class="card__5__wrapper">
                        <div class="affiliate__container">
                            <div class="affiliate__content">
                                <p class="mb-2 fw-bold text-primary">Get 10% discount</p>
                                <p>
                                    Invite your friends to join our platform and get 10% discount for every successful
                                    referral.
                                </p>
                                <button class="btn btn-outline-primary">
                                    <i class="fa fa-copy"></i>
                                    Copy Referal
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="circle"></div>
                </div>
            </div>

            <br><br>

            {{-- Points accumulation container --}}
            <h4 class="mt-5 mb-3 font-bold">Accomplishment</h4>
            <div class="parent__2">
                <div class="db__card card__3 shadow-card rounded-4 d-flex align-items-center gap-4">
                    {{-- Completed courses distribution by ranks --}}
                    <div class="mb-4">
                        <h6 class="mb-3">
                            Completed Courses Distribution
                        </h6>
                        <div class="card__3__wrapper">
                            <div class="rank rank__type__1 iron">
                                <div class="icon__wrapper">
                                    <img src="/user/assets/images/icons/bronze-badge.png" alt="Programming">
                                </div>
                                <span class="fw-semibold text-primary">{{ $total_completed_course['iron'] }}</span>
                            </div>
                            <div class="rank rank__type__1 silver">
                                <div class="icon__wrapper">
                                    <img src="/user/assets/images/icons/silver-badge.png" alt="Programming">
                                </div>
                                <span class="fw-semibold text-primary">{{ $total_completed_course['silver'] }}</span>
                            </div>
                            <div class="rank rank__type__1 gold">
                                <div class="icon__wrapper">
                                    <img src="/user/assets/images/icons/gold-badge.png" alt="Programming">
                                </div>
                                <span class="fw-semibold text-primary">{{ $total_completed_course['gold'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Completed course container --}}
                <div class="db__card card__4 shadow-card rounded-4">
                    <h6 class="mb-3">
                        You completed <span class="fw-semibold">{{ count($completed_courses) }}</span> courses
                    </h6>
                    <div class="card__4__wrapper">
                        @foreach ($completed_courses as $index => $completed_course)
                            @if ($completed_course != null)
                                <div class="on-going-courses__container flex-wrap">
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <div class="on-going-courses__image">
                                            <img src="/user/assets/images/icons/{{ $completed_course->course->rank->badge_path }}" alt="Programming">
                                        </div>
                                        <span class="fw-semibold course__title">
                                            <div>
                                                {{ $completed_course->course->title }}
                                            </div>
                                        </span>
                                    </div>
                                    <div class="on-going-courses__content">
                                        <a href="{{ route('user.courses.overview.show', $completed_course->course->id) }}" class="btn">
                                            <i class="fas fa-arrow-right text-primary"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

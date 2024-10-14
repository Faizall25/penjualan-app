@extends('user.pages.main')

@section('title', 'Landing Page')

@section('content')
    {{-- Hero Us section Start --}}
    @include('user.pages.landing.hero')
    {{-- Hero Us section End --}}

    {{-- Rank/service Us section Start --}}
    @include('user.pages.landing.rank')
    {{-- Rank/service Us section End --}}

    {{-- Benefit Us section Start --}}
    @include('user.pages.landing.benefit')
    {{-- Benefit Us section End --}}

    {{-- Leaderboard section starts --}}
    @include('user.pages.landing.leaderboard')
    {{-- Leaderboard section end --}}

    {{-- Courses section Start --}}
    @include('user.pages.landing.course')
    {{-- Courses section End --}}

    {{-- Fun Facts section Start --}}
    {{-- @include('user.pages.landing.funfact') --}}
    {{-- Fun Facts section End --}}

    {{-- Team section Start --}}
    {{-- @include('user.pages.landing.team') --}}
    {{-- Team section End --}}

    {{-- Testimonials section Start --}}
    {{-- @include('user.pages.landing.testimonial') --}}
    {{-- Testimonials section End --}}

    {{-- Events section Start --}}
    {{-- @include('user.pages.landing.event') --}}
    {{-- Events section End --}}

    {{-- Contact Us section Start --}}
    @include('user.pages.landing.contactus')
    {{-- Contact Us section End --}}
@endsection
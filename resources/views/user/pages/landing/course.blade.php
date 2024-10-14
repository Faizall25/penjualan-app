@push('lp-styles')
<link rel="stylesheet" href="/user/assets/css/course/course.css">
@endpush

<section class="section courses" id="courses">
    <div class="container">
        {{-- Header --}}
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h6>Latest Courses</h6>
                    <h2>Latest Courses</h2>
                </div>
            </div>
        </div>
        {{-- Filter box --}}

        {{-- Item box --}}
        <div class=" courses__container">
            @if (count($courses) < 1)
                <p>Data in comming</p>
                @endif
                @foreach ($courses as $course)
                <div class="course__card event-item-parent {{ $course->category ?? '' }}" data-category=" {{ $course->category ?? '' }}">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="{{ route('user.course.guest.show', $course->id) }}" style="height: 400px; width: 400px overflow hidden;">
                                <img style="height: 100%; width: 100%; object-fit: cover" src="@storageUrl($course->thumbnail_path)" alt="">
                            </a>
                            <span class="points">
                                <span class="course__rank__icon" style="width: 64px;">
                                    <img src="/user/assets/images/icons/{{ $course->rank->badge_path }}" alt="course rank">
                                </span>
                            </span>
                        </div>
                        <div class="down-content">
                            <span class="author">Dungeon Doakbi</span>
                            <h4>{{ $course->title}}</h4>
                            <span class="mt-2">
                                <p>{!! substr($course->description, 0, 60) !!}</p>
                                <p>
                                    {{ $course->rank->points }} points
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</section>
@extends('user-registered.pages.main')

@section('title', 'Dungeon | Courses')

@push('styles')
    <link rel="stylesheet" href="/member/assets/css/courses.css">
@endpush

@section('content')
    <div class="d-flex mb-3 justify-content-center mt-3">
        <form action="{{ route('user.courses.show') }}" method="GET" class="w-50">
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
              <i class="fa fa-search"></i>
            </span>
            <input type="text" name="search" class="form-control" placeholder="Search anything ..." aria-label="Username" aria-describedby="basic-addon1" value="{{ request()->input('search') }}">
          </div>
        </form>
    </div>
    @if (count($datas) < 1)
        <div class="mt-3 text-center">
            <p>Not found</p>
        </div>
    @endif
    <div class="courses content-fit">
        <div class="courses__container">
            @foreach ($datas as $data)
                <div class="course__card">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="{{ route('user.courses.overview.show', $data->id) }}">
                                <img src="{{ env('AWS_URL') . '/' . $data->thumbnail_path }}" alt=""></a>
                            <span class="points">
                                <span class="course__rank__icon" style="width: 64px;">
                                    <img src="/user/assets/images/icons/{{ $data->rank->badge_path }}" alt="course rank">
                                </span>
                            </span>
                        </div>
                        <div class="down-content">
                            <span class="author">Dungeon Doakbi</span>
                            <h4>{{ $data->title }}</h4>
                            <span class="mt-2">
                                {!! substr($data->description, 0, 60) . ' ...' !!}
                                <p>{{ $data->rank->points }} pts!</p>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

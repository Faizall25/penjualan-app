@extends('user-registered.pages.main')

@section('title', 'Dungeon | Profile')

@push('styles')
    <link rel="stylesheet" href="/member/assets/css/profile.css">
@endpush

@section('content')
    <div class="profile content-fit d-flex gap-4">
        <div class="shadow-card rounded-3 p-4 profile__main">
            <form action="{{ route('user.profile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Profile</h1>
                    <div>
                        <button class="text-primary btn" id="edit-profile-btn">
                            <i class="fas fa-edit"></i>
                            &nbsp; Edit Profile
                        </button>
                        <button class="text-white btn btn-primary hide" id="save-changes-btn" type="submit">
                            <i class="fas fa-save"></i>
                            &nbsp; Save Changes
                        </button>
                    </div>
                </div>
                <br>
                <div>
                    <div class="profile-section">
                        <div class="profile-details">
                            {{-- profile photo & profile name --}}
                            <div class="d-flex flex-wrap gap-3 align-items-center mb-3">
                                <div class="profile-picture rounded-circle overflow-hidden profile-preview">
                                    <img src="
                                    @if(auth()->user()->profile_photo_path)
                                        {{ env('AWS_URL') . '/' . auth()->user()->profile_photo_path }}
                                    @else
                                        /user/assets/images/testimonial-author.jpg
                                    @endif
                                    " alt="profile image"
                                        class="object-fit-cover">
                                </div>

                                {{-- edit image section --}}
                                <div class="edit-profile-input hide">
                                    <div class="profile__picture__edit rounded-circle overflow-hidden mb-3">
                                        <img src="
                                        @if(auth()->user()->profile_photo_path)
                                            {{ env('AWS_URL') . '/' . auth()->user()->profile_photo_path }}
                                        @else
                                            /user/assets/images/testimonial-author.jpg
                                        @endif
                                        " alt="profile image"
                                            class="object-fit-cover" id="preview-image">
                                    </div>
                                    <input type="file" class="form-control" id="profile-image" name="profile_photo_path"
                                        onchange="previewImage()">
                                </div>

                                {{-- Name --}}
                                <div>
                                    <span>
                                        <h5 class="profile-preview">
                                            {{ auth()->user()->name }} <i class="fas fa-check-circle text-primary"></i>
                                        </h5>
                                    </span>
                                    <span class="profile-preview">
                                        <p class="mb-0">Joined at {{ auth()->user()->created_at->format('d M Y') }}</p>
                                    </span>
                                </div>
                            </div>

                            {{-- Profile name edit input --}}
                            <span class="edit-profile-input hide">
                                <label class="fs-5 fw-semibold">Name</label>
                                {{-- Could be seen when edit button is clicked --}}
                                <input style="max-width: 80%" type="text" class=" form-control" value="{{ auth()->user()->name }}" name="name">
                            </span>
                            <br>

                            {{-- email --}}
                            <span>
                                <label class="fs-5 fw-semibold">Email</label>
                                <p clas>
                                    {{ auth()->user()->email }} &nbsp;
                                    <span class="text-primary fw-bold">
                                        Verified
                                        <i class="fas fa-check text-primary"></i>
                                    </span>
                                </p>
                            </span>
                            {{-- Bio --}}
                            <span>
                                <label class="fs-5 fw-semibold">Bio</label>
                                <p style="max-width: 80%;" class="profile-preview">
                                    {{ auth()->user()->biodata ?? '-' }}
                                </p>

                                {{-- Could be seen when edit button is clicked --}}
                                <textarea style="max-width: 80%; height: 200px;" type="text" placeholder="Bio..."class="edit-profile-input form-control hide" name="biodata">{{ auth()->user()->biodata }}</textarea>
                            </span>
                        </div>
                    </div>
                    <br>
                </div>
            </form>

            <div class="active__courses">
                <h3 class="mb-2">
                    Active Courses
                </h3>
                <ul>
                    @if(count($courses) < 1)
                        <li>
                            <h6 class="course__title">No active courses</h6>
                        </li>
                    @endif
                    @foreach ($courses as $course)
                        <li>
                            <a href="{{ route('user.courses.overview.show', $course->course->id) }}">
                                <div class="active__courses__icon rounded-circle">
                                    <img src="/user/assets/images/icons/bronze-badge.png" alt="completed course">
                                </div>
                                <h6 class="course__title">{{ $course->course->title }}</h6>
                            </a>
                            <span class="text-primary fs-5 fw-semibold">
                                {{ $course->status == 'completed' ? 'Completed' : 'On-going' }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- see preview image after uploading... --}}
    <script>
        function previewImage() {
            var preview = document.getElementById('preview-image');
            var file = document.getElementById('profile-image').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "/user/assets/images/testimonial-author.jpg"; // Default image placeholder
            }
        }
    </script>

    <script>
        const editProfileBtn = document.getElementById('edit-profile-btn');
        const saveChangesBtn = document.getElementById('save-changes-btn');
        const editProfileInputs = document.querySelectorAll('.edit-profile-input');
        const profilePreview = document.querySelectorAll('.profile-preview');

        editProfileBtn.addEventListener('click', (e) => {
            e.preventDefault();

            saveChangesBtn.classList.toggle('hide');

            editProfileInputs.forEach(input => {
                input.classList.toggle('hide');
            });

            profilePreview.forEach(item => {
                item.classList.toggle('hide');
            });

            if (editProfileBtn.innerText.includes('Edit')) {
                editProfileBtn.innerHTML = `
                    <i class="fas fa-xmark"></i>
                    &nbsp; Cancel
                `;
            } else {
                editProfileBtn.innerHTML = `
                    <i class="fas fa-edit"></i>
                    &nbsp; Edit Profile
                `;
            }
        });
    </script>
@endsection

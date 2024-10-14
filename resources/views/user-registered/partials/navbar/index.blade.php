<nav class="navbar content-fit" style="border-bottom: 1px solid var(--secondary-10)">
    {{-- Search starts --}}
    <div class="navbar__search">
        {{-- <form id="search__form" action="#"
            style="display:{{ request()->routeIs('user.courses.show') ? 'block' : 'none' }}">
            @csrf
            <div class="search__input__container">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search courses..." id='searchText' name="searchKeyword" />
            </div>
        </form> --}}
        {{-- <h3 style="display:{{ request()->routeIs('user.courses.show') ? 'none' : 'block' }}">
            @yield('title')
        </h3> --}}
        @php
            // Ambil nama route saat ini
            $currentRouteName = Route::currentRouteName();
            // Pisahkan nama route menjadi bagian-bagian
            $routeParts = explode('.', $currentRouteName);
            // Route bagian pertama selalu ada (misal: admin)
            $baseRoute = array_shift($routeParts);
        @endphp

        <ul class="d-flex list-unstyled">
            <li class="me-2">
                <a href="{{ route('user.dashboard.show') }}" class="text-primary text-decoration-none">Dashboard</a>
            </li>

            @foreach ($routeParts as $index => $part)
                <li class="me-2">
                    <span class="pe-2">/</span>
                    <span>{{ ucwords(str_replace('-', ' ', $part)) }}</span>
                </li>
            @endforeach
        </ul>

    </div>
    {{-- Search ends --}}

    <div class="navbar__content">
        {{-- Logo starts --}}
        <div class="navbar__logo">
            <a href="{{ route('user.dashboard.show') }}">
                <img src="/user/assets/images/icons/t-primary.png" alt="Dongeon icon" class="img-logo">
            </a>
        </div>
        {{-- Logo ends --}}

        {{-- profile starts --}}
        <div class="navbar__profile">
            <div class="profile__detail">
                <span class="profile__name">
                    <div class="d-flex gap-2">
                        <p>{{ auth()->user()->name }}</p>
                        <span>/</span>
                        <span>{{ auth()->user()->type }}</span>
                    </div>
                    <span>{{ auth()->user()->points }} Points</span>
                </span>
                <div class="profile__photo">
                  <img src="
                        @if(auth()->user()->profile_photo_path)
                            {{ env('AWS_URL') . '/' . auth()->user()->profile_photo_path }}
                        @else
                            /user/assets/images/testimonial-author.jpg
                        @endif
                    " alt="profile image">
                </div>
            </div>
            <div class="profile__info profile__hidden">
                <div class="close__button">
                    <i class="fas fa-times"></i>
                </div>
                <ul class="profile__dropdown">
                    <li>
                        <a href="{{ route('user.profile.show') }}">
                            <i class="fas fa-user"></i> &nbsp;
                            View Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.transaction.show') }}">
                            <i class="fas fa-receipt"></i> &nbsp;
                            Transaction History
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.auth.sign-out') }}" class="btn">
                            <i class="fas fa-right-from-bracket text-danger"></i> &nbsp;
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Search ends --}}
    </div>
</nav>

<script>
    const openButton = document.querySelector('.navbar .profile__photo');
    const closeButton = document.querySelector('.navbar .close__button');


    const profile = document.querySelector('.navbar .profile__info');
    const profileDropdown = document.querySelector('.navbar .profile__dropdown');

    openButton.addEventListener('click', () => {
        profile.classList.toggle('profile__hidden');
        const navbarContent = document.querySelector('.navbar__content');
    });

    closeButton.addEventListener('click', () => {
        profile.classList.toggle('profile__hidden');
    });

    window.addEventListener('scroll', () => {
        profile.classList.add('profile__hidden');
    })

    profileDropdown.addEventListener('click', () => {
        profile.classList.toggle('profile__hidden');
    });
</script>

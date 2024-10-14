<div class="sidebar d-flex flex-column justify-content-between">
    <div>
        <div class="sidebar__header">
            <div class="sidebar__header__logo logo-wrapper">
                <a href="{{ route('user.dashboard.show') }}" class="logo">
                    <img src="/user/assets/images/icons/t-primary.png" alt="Dongeon icon" class="img-logo">
                </a>
            </div>
            <div class="sidebar__header__close">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <div class="sidebar__menu__wrapper closed">
            <div class="sidebar__menu">
                <ul>
                    <li class="{{ request()->routeIs('user.dashboard.show') ? 'active' : '' }}">
                        <a href="{{ route('user.dashboard.show') }}">
                            <span>
                                <i class="fas fa-chart-line"></i>
                            </span>
                            Dashboard
                        </a>
                    </li>
                    <li
                        class="{{ request()->routeIs('user.courses.show') || request()->routeIs('user.courses.detail.show') ? 'active' : '' }}">
                        <a href="{{ route('user.courses.show') }}">
                            <span>
                                <i class="fas fa-video"></i>
                            </span>
                            Courses
                        </a>
                    </li>
                    {{-- <li class="{{ request()->routeIs('user.affiliate.show') ? 'active' : '' }}">
                        <a href="{{ route('user.affiliate.show') }}">
                            <span>
                                <i class="fas fa-key"></i>
                            </span>
                            Affiliate
                        </a>
                    </li> --}}
                    <li
                        class="{{ request()->routeIs('user.profile.show') || request()->routeIs('user.profile.edit.show') ? 'active' : '' }}">
                        <a href="{{ route('user.profile.show') }}">
                            <span>
                                <i class="fas fa-user"></i>
                            </span>
                            Profile
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <aside class="rounded-3 p-3 mb-4">
        <div class="membership">
            <h6>
                Join our membership now!
            </h6>
            <p>
               Enchance your learning experience with our membership.
            </p>
            <br>
            <a href="{{ route('user.membership.show') }}" class="membership-btn">
                Plans
            </a>
        </div>
        <br>
    </aside>
</div>

<script>
    const sidebar = document.querySelector('.sidebar');
    const sidebarMenuWrapper = document.querySelector('.sidebar__menu__wrapper');
    const sidebarMenu = document.querySelector('.sidebar__menu');
    const sidebarHeaderClose = document.querySelector('.sidebar__header__close');

    sidebarHeaderClose.addEventListener('click', () => {
        sidebarMenuWrapper.classList.toggle('closed');
        sidebar.classList.toggle('closed');
    });

    window.addEventListener('DOMContentLoaded', () => {
        if (window.innerWidth < 992) {
            sidebarMenuWrapper.classList.add('closed');
            sidebar.classList.add('closed');
        } else {
            sidebarMenuWrapper.classList.remove('closed');
            sidebar.classList.remove('closed');
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 992) {
            sidebarMenuWrapper.classList.remove('closed');
            sidebar.classList.remove('closed');
        } else {
            sidebarMenuWrapper.classList.add('closed');
            sidebar.classList.add('closed');
        }
    });
</script>

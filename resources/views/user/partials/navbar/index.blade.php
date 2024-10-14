<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('landing-page') }}" class="logo">
                        {{-- <h1>Dongeon</h1> --}}
                        <img src="/user/assets/images/icons/t-primary.png" alt="Dongeon icon" class="img-logo">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Serach Start ***** -->
                    <div class="search-input">
                        <form id="search" action="#">
                            <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword"
                                onkeypress="handle" />
                            <i class="fa fa-search"></i>
                        </form>
                    </div>
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{ route('landing-page') }}" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="{{ route('landing-page') . "#services" }}">Services</a></li>
                        <li class="scroll-to-section"><a href="{{ route('landing-page') . "#courses" }}">Courses</a></li>
                        {{-- <li class="scroll-to-section"><a href="{{ route('landing-page') . "#team" }}">Team</a></li> --}}
                        <li><a href="{{ route('user.membership.show') }}">Plans</a></li>
                        <li class="scroll-to-section"><a href="{{ route('user.auth.sign-up.show') }}">Register
                                Now!</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

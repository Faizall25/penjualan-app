<!DOCTYPE html>
<html lang="en">

<head>
    {{-- We're using the head section from the head.blade.php file --}}
    @include('user-registered.partials.head.index')
</head>

<body>
    {{-- Preloader animation --}}
    @include('user.partials.preloader.index')
    {{-- Fired at initial load & stopped when content is rendered... --}}

    {{-- Sidebar --}}
    <div class="aside__wrapper">
        @include('user-registered.partials.sidebar.index')
    </div>
    <div class="navbar__wrapper">
        {{-- Navbar/Header --}}
        @include('user-registered.partials.navbar.index')
        {{-- We're using sticky navbar/header --}}

        {{-- Dynamic Main content --}}
        <div class="content">
            @yield('content')
        </div>
        {{--
            Any pages that extends this file (user.pages.main) and put
            content in the @section('content') will be rendered here
            --}}
    </div>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="/user/vendor/jquery/jquery.min.js"></script>
    <script src="/user/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/member/assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}', 'Success', {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                timeOut: 10000
            });
        @elseif(Session::has('error'))
            toastr.error('{{ Session::get('error') }}', 'Error', {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                timeOut: 10000
            });
        @endif
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <title>Dongeon - Online coding course</title>

    <!-- Bootstrap core CSS -->
    <link href="/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    {{-- icon tab --}}
    <link rel="icon" href="/user/assets/images/profiles/dGn.png" type="image/png">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/user/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/user/assets/css/global.css">
    <link rel="stylesheet" href="/user/assets/css/owl.css">
    <link rel="stylesheet" href="/user/assets/css/animate.css">
    <link rel="stylesheet" href="/user/assets/css/landing-page/leaderboards.css">
    <link rel="stylesheet" href="/user/assets/css/course/course-detail.css">
    <link rel="stylesheet" href="/user/assets/css/membership/membership.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('lp-styles')
</head>

<body>
    {{-- Preloader animation --}}
    @include('user.partials.preloader.index')
    {{-- Fired at initial load & stopped when content is rendered... --}}

    {{-- Navbar/Header --}}
    @include('user.partials.navbar.index')
    {{-- We're using sticky navbar/header --}}

    {{-- Dynamic Main content --}}
    <div class="content">
        @yield('content')
    </div>
    {{--
        Any pages that extends this file (user.pages.main) and put
        content in the @section('content') will be rendered here
    --}}

    {{-- Footer start --}}
    @include('user.partials.footer.index')
    {{-- Footer Ends --}}

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="/user/vendor/jquery/jquery.min.js"></script>
    <script src="/user/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/user/assets/js/isotope.min.js"></script>
    <script src="/user/assets/js/owl-carousel.js"></script>
    <script src="/user/assets/js/counter.js"></script>
    <script src="/user/assets/js/custom.js"></script>
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

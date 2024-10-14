<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
rel="stylesheet">

<title>@yield('title')</title>


{{-- GLobal files that shares accross the files --}}

{{-- icon tab --}}
<link rel="icon" href="/user/assets/images/profiles/dGn.png" type="image/png">

<!-- Bootstrap core CSS -->
<link href="/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="/user/assets/css/fontawesome.css">
<link rel="stylesheet" href="/user/assets/css/animate.css">
<link rel="stylesheet" href="/member/assets/css/global.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{-- Ends --}}

{{-- This is where we can push additional styles from the pages that extends this file --}}
@stack('styles')

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Dungeon | Sign In</title>

    <!-- Bootstrap core CSS -->
    <link href="/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/user/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/user/assets/css/global.css">
    <link rel="stylesheet" href="/user/assets/css/owl.css">
    <link rel="stylesheet" href="/user/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!--

-->
</head>

<body class="body-full">

    {{-- Fired at initial load --}}
    @include('user.partials.preloader.index')


    <div class="contact-us section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6  align-self-center">
                    <div class="section-heading">
                        <h6>Change Password</h6>
                        <h2>
                            Enter your new password to change your password!
                        </h2>
                        <p>
                            Remember password? <a href="{{ route('user.auth.sign-in.show') }}">Sign In</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-content">
                        <form id="contact-form" action="{{ route('user.auth.reset-password') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        value="{{ $email }}" placeholder="{{ $email }}" readonly>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="password" name="password" id="password"
                                            placeholder="New Password..." required minlength="6" maxlength="20">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            placeholder="Confirm New Password..." required minlength="6"
                                            maxlength="20">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="bg-light rounded-pill btn">Change
                                            Password</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        @if (Session::has('success'))
            toastr.success('{{ Session::get('success') }}', 'Success', {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                timeOut: 10000
            });
        @elseif (Session::has('error'))
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

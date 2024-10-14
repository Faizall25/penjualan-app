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
                        <h6>Sign In</h6>
                        <h2>
                            Welcome back!
                        </h2>
                        <p>
                            Don't have an account? <a href="{{ route('user.auth.sign-up.show') }}">Create account</a>
                            to get started.
                        </p>
                        {{-- <div class="special-offer">
                            <span class="offer">off<br><em>50%</em></span>
                            <h6>Valide: <em>24 April 2036</em></h6>
                            <h4>Special Offer <em>50%</em> OFF!</h4>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-content">
                        <form id="contact-form" action="{{ route('user.auth.sign-in') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                            placeholder="Email..." required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="password" name="password" id="password" placeholder="Password..."
                                            required minlength="6" maxlength="20">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="bg-light rounded-pill btn">Sign
                                            In</button>
                                        <a href="{{ route('user.auth.google.redirect') }}" id="form-submit"
                                            class="bg-light rounded-pill btn p-2" style="margin-left: 12px;">
                                            <img style="width: 28px; margin-right: 8px;"
                                                src="/user/assets/images/icons/google-icon.svg"
                                                alt="Continue with google">
                                            <span>
                                                Continue with Google
                                            </span>
                                        </a>
                                    </fieldset>
                                </div>
                                <a href="{{ route('user.auth.forgot-password.page') }}"
                                    style="display: block;text-align: left;margin: 20px 0;color: #ffffff;text-decoration: none;position: relative;transition: color 0.3s ease-in-out;">
                                    Forget Password?
                                </a>
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

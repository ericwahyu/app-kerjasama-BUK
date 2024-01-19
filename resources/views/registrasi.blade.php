<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>BUK (Badan Usaha Kerjasama)</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/Universitas Dr. Soetomo.png') }}">

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
        <!-- Start GA -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-94034622-3');
        </script>
    <!-- /END GA -->
</head>
    <body>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="login-brand" >
                                <img src="{{ asset('assets/Universitas Dr. Soetomo.png') }}" alt="logo" width="120" class="shadow-light">
                            </div>

                            <div class="card card-primary">
                                <div class="card-header"><h4>Registrasi</h4></div>
                                @if (Session::has('message'))
                                    <div class="alert alert-warning">{{ Session::get('message') }}</div>
                                @endif

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('send.registrasi') }}" class="needs-validation" novalidate="">
                                            @csrf
                                            <div class="form-group">
                                                <label for="text">Name</label>
                                                <input id="text" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="text">Username</label>
                                                <input id="text" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="text">Email</label>
                                                <input id="text" type="text" class="form-control" name="email" tabindex="1" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <div class="d-block">
                                                    <label for="password" class="control-label">Password</label>
                                                </div>
                                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                                {{-- <div class="invalid-feedback">
                                                    please fill in your password
                                                </div> --}}
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                    Registrasi
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="mt-5 text-muted text-center">
                                    You are have an account? <a href="{{ route('view.login') }}">Sign In</a>
                                </div>
                            <div class="simple-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/modules/popper.js') }}"></script>
        <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
        <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/stisla.js') }}"></script>


        <!-- JS Libraies -->

        <!-- Page Specific JS File -->

        <!-- Template JS File -->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
    </body>
</html>

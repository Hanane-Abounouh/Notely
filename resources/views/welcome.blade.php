<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Notely</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        html,
        body {
            height: 100%;
            font-family: 'Raleway', sans-serif;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            background-image: url('/storage/images/bg.jpg');
        }

        /*---------------------
          Helper CSS
        -----------------------*/
        .section-title {
            text-align: center;
            padding: 0 110px;
            margin-bottom: 110px;
        }

        .section-title h2 {
            font-size: 48px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .section-title p {
            margin-bottom: 0;
            font-weight: 500;
        }

        .text-white h2,
        .text-white p,
        .text-white span,
        .text-white li,
        .text-white a {
            color: #fff;
        }

        .rating i {
            color: #fbb710;
        }

        .rating .is-fade {
            color: #e0e3e4;
        }

        /*---------------------
          Common elements
        -----------------------*/

        /* buttons */
        .site-btn {
            display: inline-block;
            min-width: 196px;
            text-align: center;
            border: none;
            padding: 15px 10px;
            font-weight: 600;
            font-size: 16px;
            position: relative;
            color: #fff;
            cursor: pointer;
            background: #d82a4e;
        }

        .site-btn:hover {
            color: #fff;
        }

        .site-btn.btn-dark {
            background: #000;
        }

        .site-btn.btn-fade {
            background: #e4edef;
            color: #1f1f1f;
        }

        /*------------------
          Header section
        ---------------------*/
        .header-section {
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            padding-top: 60px;
        }

        .site-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .site-logo .part2{
            color: #d82a4e;
        }

        .main-menu ul {
            list-style: none;
        }

        .main-menu ul li {
            display: inline;
        }

        .main-menu ul li a {
            display: inline-block;
            font-size: 16px;
            color: #fff;
            margin-left: 45px;
            font-weight: 600;
            padding: 20px 0 5px;
        }

        .main-menu ul li a:hover {
            color: #d82a4e;
        }

        .header-btn {
            float: right;
            margin-right: 0;
        }

        .nav-switch {
            display: none;
        }

        /*------------------
          Hero Section
        ---------------------*/
        .hero-section {
            height: 948px;
        }

        .hero-text {
            text-align: center;
            padding-top: 340px;
            margin-bottom: 105px;
        }

        .hero-text h2 {
            font-size: 60px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .intro-newslatter .site-btn {
            min-width: 214px;
        }

        /* Custom CSS for spacing */
        .header-btn + .header-btn {
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <!-- Page Preloader -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="site-logo">
                        <a href="/" class="d-flex align-items-center text-decoration-none text-white">
                            <span class="h4 font-weight-bold mb-0">Note-</span>
                            <span class="h4 font-weight-bold mb-0 part2 ">ly</span>
                        </a>
                    </div>
                    <div class="nav-switch">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 text-right">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="site-btn header-btn">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="site-btn header-btn">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="site-btn header-btn">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>
    <!-- Header section end -->

    <!-- Hero section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-text text-white">
                <h2>Manage Your Notes Efficiently with Notely</h2>
                <p>Organize your thoughts, keep track of important tasks, and never miss a deadline. <br> Notely helps you stay productive and on top of your work.</p>
            </div>
            <div class="row">
             <div class="col-lg-10 offset-lg-1 text-center">
          <a href="{{ route('login') }}" class="site-btn">Sign Up Now</a>
             </div>
</div>

        </div>
    </section>
    <!-- Hero section end -->
    @include('layouts.footer') 
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

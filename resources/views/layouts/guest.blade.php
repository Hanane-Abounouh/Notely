<!-- resources/views/components/guest-layout.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Inclure Bootstrap CSS via CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-image: url('/storage/images/bg.jpg');
        }
        .form-container {
            background: linear-gradient(#E9374C, #D31128);
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .form-icon {
            color: #fff;
            text-align: center;
            padding: 30px;
        }
        .form-icon i {
            font-size: 80px;
            margin-bottom: 15px;
        }
        .form-icon .signup a {
            color: #fff;
            text-decoration: underline;
        }
        .form-horizontal {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .form-horizontal .title {
            font-size: 30px;
            font-weight: 900;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-horizontal .form-group {
            margin-bottom: 20px;
        }
        .input-group-text {
            background: transparent;
            border: none;
            font-size: 1.5em;
        }
        .form-control {
            border-radius: 20px;
            padding: 10px 20px;
        }
        .btn {
            background: #E9374C;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #D31128;
        }
        .forgot-pass a {
            color: #999;
            text-decoration: underline;
        }
        .forgot-pass a:hover {
            color: #777;
        }
        @media (max-width: 576px) {
            .form-container {
                padding-bottom: 15px;
            }
            .form-icon {
                padding: 20px;
            }
            .form-horizontal {
                padding: 20px;
            }
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

        .intro-newslatter .site-btn {
            min-width: 214px;
        }

        /* Custom CSS for spacing */
        .header-btn + .header-btn {
            margin-left: 10px;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center " style="min-height: 100vh;">
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
    <div class="container ">
        {{ $slot }}
    </div>
 
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

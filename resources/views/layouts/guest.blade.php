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
    </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
        {{ $slot }}
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

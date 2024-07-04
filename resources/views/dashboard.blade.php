<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Notely</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .welcome-section {
            text-align: center;
            padding: 50px 0;
            background-color: #f8f9fa;
        }
        .welcome-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #d82a4e;
        }
        .welcome-description {
            font-size: 1.2rem;
            margin-bottom: 40px;
            color: #6c757d;
        }
        .get-started-btn {
            background-color: #d82a4e;
            color: #fff;
            border: none;
        }
        .get-started-btn:hover {
            background-color: #c72d45;
        }
    </style>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="welcome-section">
        <h1 class="welcome-title">Welcome to Notely</h1>
        <p class="welcome-description">Your ultimate solution for managing notes efficiently and effectively. Create, edit, and organize your notes with ease.</p>
        <a href="{{ route('notes.index') }}" class="btn get-started-btn">Get Started</a>
    </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>


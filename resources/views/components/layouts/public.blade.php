<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ($title ?? config('app.name')) . ' - ' . env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/brands.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/solid.min.css') }}" />
    <style>
        .btn-primary-color{
        background-color: #111398;
        color: #f1f1f1;
        }
    </style>
</head>
<body>
    <main class="content ms-0" style="background-color: #F8F8F8">
        {{ $slot }}
    </main>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('content/img/logo.svg') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-gray-100">

@include('components.header')

<main class="">

    @yield('content')

</main>

</body>
</html>
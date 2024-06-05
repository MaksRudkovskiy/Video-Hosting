<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видео Хостинг</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body class="bg-gray-100">

    @include('components.header')

    <div id="app" class="min-h-screen flex flex-col">
        <main class="flex-grow">
            @yield('content')
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>

    @include('components.footer')
</body>
</html>
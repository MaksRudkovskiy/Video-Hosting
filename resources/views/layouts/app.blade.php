<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видео Хостинг</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    @yield('components.header')

    <div id="app" class="min-h-screen flex flex-col">
        <main class="flex-grow">
            @yield('content')
        </main>
        <footer class="bg-white shadow-md">
            <div class="container mx-auto px-6 py-4 text-center">
                &copy; 2024 Видео Хостинг
            </div>
        </footer>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
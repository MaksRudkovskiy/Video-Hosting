@section('header')


<header class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div>
            <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-800">Видео Хостинг</a>
        </div>
        <div>
            @guest
                <a href="{{ route('login') }}" class="text-gray-800">Войти</a>
                <a href="{{ route('register') }}" class="ml-4 text-gray-800">Регистрация</a>
            @else
                <a href="{{ route('logout') }}" class="text-gray-800" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</header>
@endsection
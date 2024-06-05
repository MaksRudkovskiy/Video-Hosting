
<header class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div>
            <a href="{{ url('/') }}" class="text-lg font-semibold flex text-gray-800"> <img src="{{asset('img/tf2.png')}}" class="w-8 h-8" alt=""> <p class="ml-1">МГЕТУБ</p></a>
        </div>
        <div>
            @guest
                <a href="{{ route('login') }}" class="text-gray-800">Войти</a>
                <a href="{{ route('register') }}" class="ml-4 text-gray-800">Регистрация</a>
            @else
            <nav class="flex justify-center items-center gap-8">
                <a href="{{ route('profile') }}" class="btn btn-primary">профиль</a>
                <a href="{{ route('logout') }}" class="text-gray-800" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
            </nav>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</header>
